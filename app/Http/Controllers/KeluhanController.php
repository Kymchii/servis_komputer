<?php

namespace App\Http\Controllers;

use App\Models\Customers;
use Illuminate\Http\Request;
use App\Models\Keluhan;
use App\Models\Komputer;
use App\Models\Pegawai;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;

class KeluhanController extends Controller
{
    public function index(): View {
        $keluhan = DB::table('keluhan')
        ->join('komputer' , 'komputer.id_komputer', '=', 'keluhan.id_komputer')
        ->join('customers' , 'customers.id_customer', '=', 'keluhan.id_customer')
        ->join('pegawai' , 'pegawai.id_pegawai', '=', 'keluhan.id_pegawai')
        ->select('komputer.merk', 'customers.nama_customer', 'pegawai.nama_pegawai', 'keluhan.id_keluhan', 'keluhan.nama_keluhan', 'keluhan.id_keluhan', 'keluhan.ongkos',)
        ->get();
        return view('levelAdmin.keluhan.index',compact('keluhan'));
     }

    public function create(): View {
        $keluhan = Keluhan::all();
        $komputer = Komputer::all();
        $customers = Customers::all();
        $pegawai = Pegawai::all();
        return view('levelAdmin.keluhan.create', compact('keluhan', 'komputer', 'customers', 'pegawai'));
    }

    public function store(Request $request): RedirectResponse {
        $request->validate([
            'nama_keluhan' => 'required',
            'ongkos' => 'required',
        ]);

        Keluhan::create([
            'nama_keluhan' => $request->nama_keluhan,
            'ongkos' => $request->ongkos,
            'id_komputer' => $request->id_komputer,
            'id_customer' => $request->id_customer,
            'id_pegawai' => $request->id_pegawai,
        ]);
        return redirect()->route('admin.keluhan.index')->with(['success' => 'Data Berhasil Ditambahkan']);
    }

    public function show(string $id): View {
        $keluhan = DB::table('keluhan')
        ->join('komputer' , 'komputer.id_komputer', '=', 'keluhan.id_komputer')
        ->join('customers' , 'customers.id_customer', '=', 'keluhan.id_customer')
        ->join('pegawai' , 'pegawai.id_pegawai', '=', 'keluhan.id_pegawai')
        ->select('komputer.merk', 'customers.nama_customer', 'pegawai.nama_pegawai', 'keluhan.*')
        ->where('keluhan.id_keluhan', $id)
        ->first();
        return view('levelAdmin.keluhan.detail', compact('keluhan'));
    }

    public function edit(string $id): View {
        $keluhan = Keluhan::findOrFail($id);
        $komputer = Komputer::all();
        $customers = Customers::all();
        $pegawai = Pegawai::all();
        return view('levelAdmin.keluhan.edit', compact('keluhan', 'customers', 'pegawai', 'komputer'));
    }

    public function update(Request $request, $id): RedirectResponse {
        $request->validate([
            'nama_keluhan' => 'required',
            'ongkos' => 'required',
        ]);

        $keluhan = Keluhan::findOrFail($id);
        $keluhan->update([
            'nama_keluhan' => $request->nama_keluhan,
            'ongkos' => $request->ongkos,
            'id_komputer' => $request->id_komputer,
            'id_customer' => $request->id_customer,
            'id_pegawai' => $request->id_pegawai,
        ]);
        return redirect()->route('admin.keluhan.index')->with(['success' => 'Data berhasil diubah']);
    }

    public function destroy($id): RedirectResponse {
        $keluhan = Keluhan::findOrFail($id);
        $keluhan->delete();
        return redirect()->route('admin.keluhan.index')->with(['success' => 'Data berhasil dihapus']);
    }
}
