<?php

namespace App\Http\Controllers;

use App\Exports\ExportDataPenyakit;
use App\Imports\ImportDataPenyakit;
use Illuminate\Http\Request;
use App\Models\DataPenyakit;
use Maatwebsite\Excel\Facades\Excel;
use Spatie\SimpleExcel\SimpleExcelWriter;
use Symfony\Component\HttpFoundation\StreamedResponse;

class DataPenyakitController extends Controller
{
    public function index(Request $request)
    {
        $query = DataPenyakit::query();

        if ($request->has('bulan') && $request->bulan != '') {
            $bulan = $request->bulan; // Format: YYYY-MM
            $query->whereYear('tanggal', date('Y', strtotime($bulan)))
                ->whereMonth('tanggal', date('m', strtotime($bulan)));
        }

        $dataPenyakit = $query->orderBy('tanggal', 'desc')->get();

        return view('petugaskesehatan.datapenyakit.datapenyakit', compact('dataPenyakit'));
    }

    public function create()
    {
        return view('petugaskesehatan.datapenyakit.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'tanggal'         => 'required|date',
            'nama_penyakit'   => 'required|string|max:255',
            'jumlah'          => 'required|integer|min:0',
            'laki_laki'       => 'nullable|integer|min:0',
            'perempuan'       => 'nullable|integer|min:0',
            'bayi'            => 'nullable|integer|min:0',
            'balita'            => 'nullable|integer|min:0',
            'anak'            => 'nullable|integer|min:0',
            'remaja'            => 'nullable|integer|min:0',
            'dewasa'          => 'nullable|integer|min:0',
            'lansia'          => 'nullable|integer|min:0',
            'nama_puskesmas'  => 'required|string|max:255',
            'kecamatan'       => 'nullable|string|max:255',
        ]);

        DataPenyakit::create($validated);

        return redirect()->route('datapenyakit.index')->with('success', 'Data penyakit berhasil ditambahkan');
    }

    public function edit($id)
    {
        $dataPenyakit = DataPenyakit::findOrFail($id);
        return view('petugaskesehatan.datapenyakit.update', compact('dataPenyakit'));
    }

    public function update(Request $request, $id)
    {
        $dataPenyakit = DataPenyakit::findOrFail($id);

        $validated = $request->validate([
            'tanggal'         => 'required|date',
            'nama_penyakit'   => 'required|string|max:255',
            'jumlah'          => 'required|integer|min:0',
            'laki_laki'       => 'nullable|integer|min:0',
            'perempuan'       => 'nullable|integer|min:0',
            'bayi'            => 'nullable|integer|min:0',
            'balita'            => 'nullable|integer|min:0',
            'anak'            => 'nullable|integer|min:0',
            'remaja'            => 'nullable|integer|min:0',
            'dewasa'          => 'nullable|integer|min:0',
            'lansia'          => 'nullable|integer|min:0',
            'nama_puskesmas'  => 'required|string|max:255',
            'kecamatan'       => 'nullable|string|max:255',
        ]);

        $dataPenyakit->update($validated);

        return redirect()->route('datapenyakit.index')->with('success', 'Data penyakit berhasil diperbarui');
    }

    public function destroy($id)
    {
        $dataPenyakit = DataPenyakit::findOrFail($id);
        $dataPenyakit->delete();

        return redirect()->route('datapenyakit.index')->with('success', 'Data penyakit berhasil dihapus');
    }

    public function exportDataPenyakitToExcel()
    {
        return Excel::download(new ExportDataPenyakit, 'dataPenyakit.xlsx');
    }

    public function import(Request $request)
{
    $request->validate([
        'file' => 'required|mimes:xlsx,xls,csv'
    ], [
        'file.required' => 'File tidak boleh kosong.',
        'file.mimes' => 'Format file harus berupa .xlsx, .xls, atau .csv.',
    ]);

    try {
        Excel::import(new ImportDataPenyakit, $request->file('file'));

        return redirect()->route('datapenyakit.index')->with('success', 'Data berhasil diimport.');
    } catch (\Maatwebsite\Excel\Validators\ValidationException $e) {
        $failures = $e->failures();
        $errorMessages = collect($failures)->map(function ($failure) {
            return 'Baris ' . $failure->row() . ': ' . implode(', ', $failure->errors());
        })->implode(' | ');

        return redirect()->back()->with('error', 'Gagal import data: ' . $errorMessages);
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Terjadi kesalahan saat import: ' . $e->getMessage());
    }
}

    public function searchPenyakit(Request $request)
    {
        $query = $request->input('q');
        $dataPenyakit = DataPenyakit::where('nama_penyakit', 'like', '%' . $query . '%')->get();
        return response()->json($dataPenyakit->map(function ($item) {
            return [
                'id' => $item->id,
                'tanggal' => $item->tanggal,
                'nama_penyakit' => $item->nama_penyakit,
                'jumlah' => $item->jumlah,
                'laki_laki' => $item->laki_laki,
                'perempuan' => $item->perempuan,
                'bayi' => $item->bayi,
                'balita' => $item->balita,
                'anak' => $item->anak,
                'remaja' => $item->remaja,
                'dewasa' => $item->dewasa,
                'lansia' => $item->lansia,
                'nama_puskesmas' => $item->nama_puskesmas,
                'kecamatan' => $item->kecamatan,
            ];
        }));
    }
}

//     public function export(Request $request): StreamedResponse
//     {
//     //     $fileName = 'data_penyakit_' . date('Ymd_His') . '.csv';

//     //     $data = DataPenyakit::select(
//     //         'tanggal',
//     //         'nama_penyakit',
//     //         'jumlah',
//     //         'laki_laki',
//     //         'perempuan',
//     //         'anak',
//     //         'dewasa',
//     //         'lansia',
//     //         'nama_puskesmas',
//     //         'kecamatan'
//     //     )->get();

//     //     $formatted = $data->map(function ($item) {
//     //         return [
//     //             'Tanggal'        => $item->tanggal,
//     //             'Nama Penyakit'  => $item->nama_penyakit,
//     //             'Jumlah'         => $item->jumlah,
//     //             'Laki-laki'      => $item->laki_laki,
//     //             'Perempuan'      => $item->perempuan,
//     //             'Anak'           => $item->anak,
//     //             'Dewasa'         => $item->dewasa,
//     //             'Lansia'         => $item->lansia,
//     //             'Puskesmas'      => $item->nama_puskesmas,
//     //             'Kecamatan'      => $item->kecamatan,
//     //         ];
//     //     });

//     //     return SimpleExcelWriter::streamDownload($fileName)
//     //         ->addRows($formatted->toArray())
//     //         ->toResponse($request);
//     // }
// }