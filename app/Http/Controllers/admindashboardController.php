<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Dalakes;
use App\Models\DataArtikel;


class admindashboardController extends Controller
{
    // public function index() {
    //     return view('admin.dashboard');
    // }

    public function index() {
    $totalAkun = User::count();
    $totalLayanan = Dalakes::count();
    $totalLaporan = DataArtikel::count();

    return view('admin.dashboard', compact('totalAkun', 'totalLayanan', 'totalLaporan'));
}


}
