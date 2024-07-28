<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class PegawaiKeluhanController extends Controller
{
    public function index(): View {
        $id = auth()->user()->id;
        $keluhan = DB::table('keluhan')
        ->join('komputer' , 'komputer.id_komputer', '=', 'keluhan.id_komputer')
        ->join('customers' , 'customers.id_customer', '=', 'keluhan.id_customer')
        ->join('pegawai' , 'pegawai.id_pegawai', '=', 'keluhan.id_pegawai')
        ->join('users' , 'id', '=', 'pegawai.id_user')
        ->select('komputer.merk', 'customers.nama_customer', 'pegawai.nama_pegawai', 'keluhan.id_keluhan', 'keluhan.nama_keluhan', 'keluhan.id_keluhan', 'keluhan.ongkos', 'users.id')
        ->where('users.id', '=', $id)
        ->get();
        return view('levelPegawai.keluhan.index',compact('keluhan'));
     }

     public function show(string $id): View {
        $keluhan = DB::table('keluhan')
        ->join('komputer' , 'komputer.id_komputer', '=', 'keluhan.id_komputer')
        ->join('customers' , 'customers.id_customer', '=', 'keluhan.id_customer')
        ->join('pegawai' , 'pegawai.id_pegawai', '=', 'keluhan.id_pegawai')
        ->select('komputer.merk', 'customers.nama_customer', 'pegawai.nama_pegawai', 'keluhan.*')
        ->where('keluhan.id_keluhan', $id)
        ->first();
        return view('levelPegawai.keluhan.detail', compact('keluhan'));
    }
}
