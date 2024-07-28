<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class BarangController extends Controller
{
    public function index(): View {
        $barang = Barang::latest()->paginate(10);
        return view('levelAdmin.barang.index',compact('barang'));
     }

    public function create(): View {
        return view('levelAdmin.barang.create');
    }

    public function store(Request $request): RedirectResponse {
        $request->validate([
            'nama_barang' => 'required',
            'merk_barang' => 'required',
            'harga' => 'required',
            'stok' => 'required',
            'satuan' => 'required',
        ]);

        Barang::create([
            'nama_barang' => $request->nama_barang,
            'merk_barang' => $request->merk_barang,
            'harga' => $request->harga,
            'stok' => $request->stok,
            'satuan' => $request->satuan,
        ]);
        return redirect()->route('admin.barang.index')->with(['success' => 'Data Berhasil Ditambahkan']);
    }

    public function show(string $id): View {
        $barang = Barang::findOrFail($id);
        return view('levelAdmin.barang.detail', compact('barang'));
    }

    public function edit(string $id): View {
        $barang = Barang::findOrFail($id);
        return view('levelAdmin.barang.edit', compact('barang'));
    }

    public function update(Request $request, $id): RedirectResponse {
        $request->validate([
            'nama_barang' => 'required',
            'merk_barang' => 'required',
            'harga' => 'required',
            'stok' => 'required',
            'satuan' => 'required',
        ]);

        $barang = Barang::findOrFail($id);
        $barang->update([
            'nama_barang' => $request->nama_barang,
            'merk_barang' => $request->merk_barang,
            'harga' => $request->harga,
            'stok' => $request->stok,
            'satuan' => $request->satuan,
        ]);
        return redirect()->route('admin.barang.index')->with(['success' => 'Data berhasil diubah']);
    }

    public function destroy($id): RedirectResponse {
        $barang = Barang::findOrFail($id);
        $barang->delete();
        return redirect()->route('admin.barang.index')->with(['success' => 'Data berhasil dihapus']);
    }
}
