<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pegawai;
use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;

class PegawaiController extends Controller
{
    public function index(): View {
        $pegawai = DB::table('pegawai')
        ->join('users', 'users.id', '=', 'pegawai.id_user')
        ->select('users.email', 'pegawai.id_pegawai', 'pegawai.nama_pegawai', 'pegawai.alamat_pegawai', 'pegawai.jenis_kelamin', 'pegawai.status')
        ->get();
        return view('levelAdmin.pegawai.index',compact('pegawai'));
     }

    public function create(): View {
        $user = User::where('level', 'Pegawai')->get();
        return view('levelAdmin.pegawai.create', compact('user'));
    }

    public function store(Request $request): RedirectResponse {
        $request->validate([
            'nama_pegawai' => 'required',
            'alamat_pegawai' => 'required',
            'jenis_kelamin' => 'required',
            'status' => 'required'
        ]);

        Pegawai::create([
            'id_user' => $request->id_user,
            'nama_pegawai' => $request->nama_pegawai,
            'alamat_pegawai' => $request->alamat_pegawai,
            'jenis_kelamin' => $request->jenis_kelamin,
            'status' => $request->status
        ]);
        return redirect()->route('admin.pegawai.index')->with(['success' => 'Data Berhasil Ditambahkan']);
    }

    public function show(string $id): View {
        $pegawai = Pegawai::findOrFail($id);
        return view('levelAdmin.pegawai.detail', compact('pegawai'));
    }

    public function edit(string $id): View {
        $pegawai = Pegawai::findOrFail($id);
        return view('levelAdmin.pegawai.edit', compact('pegawai'));
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
        return redirect()->route('admin.pegawai.index')->with(['success' => 'Data berhasil diubah']);
    }

    public function destroy($id): RedirectResponse {
        $pegawai = Pegawai::findOrFail($id);
        $pegawai->delete();
        return redirect()->route('admin.pegawai.index')->with(['success' => 'Data berhasil dihapus']);
    }
}
