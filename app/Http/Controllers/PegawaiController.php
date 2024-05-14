<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pegawai;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class PegawaiController extends Controller
{
    public function index(): View {
        $pegawai = Pegawai::latest()->paginate(10);
        return view('pegawai.index',compact('pegawai'));
     }

    public function create(): View {
        return view('pegawai.create');
    }

    public function store(Request $request): RedirectResponse {
        $request->validate([
            'id_pegawai' => 'required|unique:pegawai,id_pegawai',
            'nama_pegawai' => 'required',
            'alamat_pegawai' => 'required',
            'jenis_kelamin' => 'required',
            'status' => 'required'
        ]);

        Pegawai::create([
            'id_pegawai' => $request->id_pegawai,
            'nama_pegawai' => $request->nama_pegawai,
            'alamat_pegawai' => $request->alamat_pegawai,
            'jenis_kelamin' => $request->jenis_kelamin,
            'status' => $request->status
        ]);
        return redirect()->route('pegawai.index')->with(['success' => 'Data Berhasil Ditambahkan']);
    }

    public function show(string $id): View {
        $pegawai = Pegawai::findOrFail($id);
        return view('pegawai.detail', compact('pegawai'));
    }

    public function edit(string $id): View {
        $pegawai = Pegawai::findOrFail($id);
        return view('pegawai.edit', compact('pegawai'));
    }

    public function update(Request $request, $id): RedirectResponse {
        $request->validate([
            'nama_pegawai' => 'required',
            'alamat_pegawai' => 'required', 
            'status' => 'required',
        ]);

        $pegawai = Pegawai::findOrFail($id);
        $pegawai->update([
            'nama_pegawai' => $request->nama_pegawai,
            'alamat_pegawai' => $request->alamat_pegawai,
            'status' => $request->status,
        ]);
        return redirect()->route('pegawai.index')->with(['success' => 'Data berhasil diubah']);
    }

    public function destroy($id): RedirectResponse {
        $pegawai = Pegawai::findOrFail($id);
        $pegawai->delete();
        return redirect()->route('pegawai.index')->with(['success' => 'Data berhasil dihapus']);
    }
}
