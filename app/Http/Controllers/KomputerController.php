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
        return view('komputer.index',compact('komputer'));
     }

    public function create(): View {
        return view('komputer.create');
    }

    public function store(Request $request): RedirectResponse {
        $request->validate([
            'id_komputer' => 'required|unique:komputer,id_komputer',
            'merk' => 'required',
            'kelengkapan' => 'required',
        ]);

        Komputer::create([
            'id_komputer' => $request->id_komputer,
            'merk' => $request->merk,
            'kelengkapan' => $request->kelengkapan,
        ]);
        return redirect()->route('komputer.index')->with(['success' => 'Data Berhasil Ditambahkan']);
    }

    public function show(string $id): View {
        $komputer = Komputer::findOrFail($id);
        return view('komputer.detail', compact('komputer'));
    }

    public function edit(string $id): View {
        $komputer = Komputer::findOrFail($id);
        return view('komputer.edit', compact('komputer'));
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
        return redirect()->route('komputer.index')->with(['success' => 'Data berhasil diubah']);
    }

    public function destroy($id): RedirectResponse {
        $komputer = Komputer::findOrFail($id);
        $komputer->delete();
        return redirect()->route('komputer.index')->with(['success' => 'Data berhasil dihapus']);
    }
}
