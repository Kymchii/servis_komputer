<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function adminDashboard()
    {
        return view('levelAdmin.dashboard');
    }

    public function customersDashboard()
    {
        return view('levelCustomers.dashboard');
    }

    public function pegawaiDashboard()
    {
        return view('levelPegawai.dashboard');
    }
}
