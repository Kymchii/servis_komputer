<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customers;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class CustomersController extends Controller
{
    public function index(): View {
        $customers = Customers::latest()->paginate(10);
        return view('customers.index',compact('customers'));
     }

     public function create(): View {
        return view('customers.create');
    }

    public function store(Request $request): RedirectResponse {
        $request->validate([
            'id_customer' => 'required|unique:customers,id_customer',
            'nama_customer' => 'required',
            'alamat_customer' => 'required',
            'jenis_kelamin' => 'required',
        ]);

        Customers::create([
            'id_customer' => $request->id_customer,
            'nama_customer' => $request->nama_customer,
            'alamat_customer' => $request->alamat_customer,
            'jenis_kelamin' => $request->jenis_kelamin,
        ]);
        return redirect()->route('customers.index')->with(['success' => 'Data Berhasil Ditambahkan']);
    }

    public function show(string $id): View {
        $customers = Customers::findOrFail($id);
        return view('customers.detail', compact('customers'));
    }

    public function edit(string $id): View {
        $customers = Customers::findOrFail($id);
        return view('customers.edit', compact('customers'));
    }

    public function update(Request $request, $id): RedirectResponse {
        $request->validate([
            'nama_customer' => 'required',
            'alamat_customer' => 'required',
            'jenis_kelamin' => 'required'
        ]);

        $customers = Customers::findOrFail($id);
        $customers->update([
            'nama_customer' => $request->nama_customer,
            'alamat_customer' => $request->alamat_customer,
            'jenis_kelamin' => $request->jenis_kelamin,
        ]);
        return redirect()->route('customers.index')->with(['success' => 'Data berhasil diubah']);
    }

    public function destroy($id): RedirectResponse {
        $customers = Customers::findOrFail($id);
        $customers->delete();
        return redirect()->route('customers.index')->with(['success' => 'Data berhasil dihapus']);
    }
}
