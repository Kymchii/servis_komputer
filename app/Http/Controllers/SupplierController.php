<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;
use App\Models\Supplier;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class SupplierController extends Controller
{
    public function index(): View {
        $supplier = DB::table('supplier')
        ->join('barang' , 'barang.id_barang', '=', 'supplier.id_barang')
        ->select('barang.merk_barang', 'barang.stok', 'barang.satuan', 'supplier.nama_supplier', 'supplier.telepon', 'supplier.id_supplier', 'supplier.alamat_supplier')
        ->get();
        return view('levelAdmin.supplier.index',compact('supplier'));
     }

    public function create(): View {
        $barang = Barang::all();
        return view('levelAdmin.supplier.create', compact('barang'));
    }

    public function store(Request $request): RedirectResponse {
        $request->validate([
            'nama_supplier'      => 'required',
            'alamat_supplier'      => 'required',
            'telepon'         => 'required|min:12',
        ]);

        supplier::create([
            'id_barang' => $request->id_barang,
            'nama_supplier' => $request->nama_supplier,
            'alamat_supplier' => $request->alamat_supplier,
            'telepon' => $request->telepon,
        ]);
        return redirect()->route('admin.supplier.index')->with(['success' => 'Data Berhasil Ditambahkan']);
    }

    public function show(string $id): View {
        $supplier = Supplier::findOrFail($id);
        $barang = Barang::all();
        return view('levelAdmin.supplier.detail', compact('supplier'), compact('barang'));
    }

    public function edit(string $id): View {
        $supplier = Supplier::findOrFail($id);
        $barang = Barang::all();
        return view('levelAdmin.supplier.edit', compact('supplier'), compact('barang'));
    }

    public function update(Request $request, $id): RedirectResponse {
        $request->validate([
            'nama_supplier'      => 'required',
            'alamat_supplier'      => 'required',
            'telepon'         => 'required|min:12',
        ]);

        $supplier = Supplier::findOrFail($id);
        $supplier->update([
            'id_barang' => $request->id_barang,
            'nama_supplier' => $request->nama_supplier,
            'alamat_supplier' => $request->nama_supplier,
            'telepon' => $request->telepon,
        ]);
        return redirect()->route('admin.supplier.index')->with(['success' => 'Data berhasil diubah']);
    }

    public function destroy($id): RedirectResponse {
        $supplier = Supplier::findOrFail($id);
        $supplier->delete();
        return redirect()->route('admin.supplier.index')->with(['success' => 'Data berhasil dihapus']);
    }
}
