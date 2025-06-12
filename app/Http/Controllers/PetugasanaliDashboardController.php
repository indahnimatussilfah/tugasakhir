<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PetugasanaliDashboardController extends Controller
{
    public function index(){
        return view ('petugasanalis.dashboard');
    }
}
