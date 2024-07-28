<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customers;
use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;

class CustomersController extends Controller
{
    public function index(): View {
        $customers = DB::table('customers')
        ->join('users', 'users.id', '=', 'customers.id_user')
        ->select('users.email', 'customers.id_customer', 'customers.nama_customer', 'customers.alamat_customer', 'customers.jenis_kelamin')
        ->get();
        return view('levelAdmin.customers.index',compact('customers'));
     }

     public function create(): View {
        $user = User::where('level', 'customer')->get();
        return view('levelAdmin.customers.create', compact('user'));
    }

    public function store(Request $request): RedirectResponse {
        $request->validate([
            'nama_customer' => 'required',
            'alamat_customer' => 'required',
            'jenis_kelamin' => 'required',
        ]);

        Customers::create([
            'id_user' => $request->id_user,
            'nama_customer' => $request->nama_customer,
            'alamat_customer' => $request->alamat_customer,
            'jenis_kelamin' => $request->jenis_kelamin,
        ]);
        return redirect()->route('admin.customers.index')->with(['success' => 'Data Berhasil Ditambahkan']);
    }

    public function show(string $id): View {
        $customers = Customers::findOrFail($id);
        return view('levelAdmin.customers.detail', compact('customers'));
    }

    public function edit(string $id): View {
        $customers = Customers::findOrFail($id);
        return view('levelAdmin.customers.edit', compact('customers'));
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
        return redirect()->route('admin.customers.index')->with(['success' => 'Data berhasil diubah']);
    }

    public function destroy($id): RedirectResponse {
        $customers = Customers::findOrFail($id);
        $customers->delete();
        return redirect()->route('admin.customers.index')->with(['success' => 'Data berhasil dihapus']);
    }
}
