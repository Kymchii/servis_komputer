<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(): View
    {
        if (auth()->user()->level != 'Admin') {
            abort(404);
        }
        return view('levelAdmin.dashboard');
    }

    public function pegawaiHome(): View
    {
        if (auth()->user()->level != 'Pegawai') {
            abort(404);
        }
        $id = auth()->user()->id;
        $count = DB::table('keluhan')
        ->join('komputer' , 'komputer.id_komputer', '=', 'keluhan.id_komputer')
        ->join('customers' , 'customers.id_customer', '=', 'keluhan.id_customer')
        ->join('pegawai' , 'pegawai.id_pegawai', '=', 'keluhan.id_pegawai')
        ->join('users' , 'id', '=', 'pegawai.id_user')
        ->select('komputer.merk', 'customers.nama_customer', 'pegawai.nama_pegawai', 'keluhan.id_keluhan', 'keluhan.nama_keluhan', 'keluhan.id_keluhan', 'keluhan.ongkos', 'users.id')
        ->where('users.id', '=', $id)
        ->count();
        return view('levelPegawai.dashboard', compact('count'));
    }
  
    public function customersHome(): View
    {
        if (auth()->user()->level != 'Customer') {
            abort(404);
        }
        $id = auth()->user()->id;
        $count = DB::table('keluhan')
        ->join('komputer' , 'komputer.id_komputer', '=', 'keluhan.id_komputer')
        ->join('customers' , 'customers.id_customer', '=', 'keluhan.id_customer')
        ->join('pegawai' , 'pegawai.id_pegawai', '=', 'keluhan.id_pegawai')
        ->join('users' , 'id', '=', 'customers.id_user')
        ->select('komputer.merk', 'customers.nama_customer', 'pegawai.nama_pegawai', 'keluhan.id_keluhan', 'keluhan.nama_keluhan', 'keluhan.id_keluhan', 'keluhan.ongkos', 'users.id')
        ->where('users.id', '=', $id)
        ->count();
        return view('levelCustomers.dashboard', compact('count'));
    }
}
