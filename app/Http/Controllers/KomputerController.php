<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Komputer;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class KomputerController extends Controller
{
    public function index(): View {
        $komputer = Komputer::latest()->paginate(10);
        return view('levelAdmin.komputer.index',compact('komputer'));
     }

    public function create(): View {
        return view('levelAdmin.komputer.create');
    }

    public function store(Request $request): RedirectResponse {
        $request->validate([
            'merk' => 'required',
            'kelengkapan' => 'required',
        ]);

        Komputer::create([
            'merk' => $request->merk,
            'kelengkapan' => $request->kelengkapan,
        ]);
        return redirect()->route('admin.komputer.index')->with(['success' => 'Data Berhasil Ditambahkan']);
    }

    public function show(string $id): View {
        $komputer = Komputer::findOrFail($id);
        return view('levelAdmin.komputer.detail', compact('komputer'));
    }

    public function edit(string $id): View {
        $komputer = Komputer::findOrFail($id);
        return view('levelAdmin.komputer.edit', compact('komputer'));
    }

    public function update(Request $request, $id): RedirectResponse {
        $request->validate([
            'merk' => 'required',
            'kelengkapan' => 'required'
        ]);

        $komputer = Komputer::findOrFail($id);
        $komputer->update([
            'merk' => $request->merk,
            'kelengkapan' => $request->kelengkapan,
        ]);
        return redirect()->route('admin.komputer.index')->with(['success' => 'Data berhasil diubah']);
    }

    public function destroy($id): RedirectResponse {
        $komputer = Komputer::findOrFail($id);
        $komputer->delete();
        return redirect()->route('admin.komputer.index')->with(['success' => 'Data berhasil dihapus']);
    }
}
