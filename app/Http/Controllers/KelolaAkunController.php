<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class KelolaAkunController extends Controller
{
    public function index()
    {
        $users = User::all(); // Atau bisa diganti dengan ->paginate(10)
        return view('admin.kelolaakun.index', compact('users'));
    }

    // Tambahan metode jika diperlukan
    public function create()
    {
        return view('admin.kelolaakun.create');
    }

    public function store(Request $request)
    {
        // Validasi & simpan data
    }

    public function edit(User $user)
    {
        return view('admin.kelolaakun.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        // Validasi & update data
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('kelolaakun.index')->with('success', 'Data pengguna berhasil dihapus.');
    }
}
