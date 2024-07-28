<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(): View {
        $user = User::latest()->paginate(10);
        return view('levelAdmin.user.index',compact('user'));
     }

    public function create(): View {
        return view('levelAdmin.user.create');
    }

    public function store(Request $request): RedirectResponse {
        $request->validate([
            'username'      => 'required',
            'email'         => 'required',
            'password'      => 'required|min:5',
            'level'         => 'required'
        ]);

        User::create([
            'username'          => $request->username,
            'email'             => $request->email,
            'password'          => Hash::make($request['password']), 
            'level'             => $request->level,
        ]);
        return redirect()->route('admin.user.index')->with(['success' => 'Data Berhasil Ditambahkan']);
    }

    public function show(string $id): View {
        $user = User::findOrFail($id);
        return view('levelAdmin.user.detail', compact('user'));
    }

    public function edit(string $id): View {
        $user = User::findOrFail($id);
        return view('levelAdmin.user.edit', compact('user'));
    }

    public function update(Request $request, $id): RedirectResponse {
        $request->validate([
            'username' => 'required',
            'level' => 'required',
        ]);

        $user = User::findOrFail($id);
        $user->update([
            'username'          => $request->username,
            'level'             => $request->level,
        ]);
        return redirect()->route('admin.user.index')->with(['success' => 'Data berhasil diubah']);
    }

    public function destroy($id): RedirectResponse {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('admin.user.index')->with(['success' => 'Data berhasil dihapus']);
    }
}
