<?php

namespace App\Http\Controllers;

use App\Models\Pilota;
use Illuminate\Http\Request;

class PilotaController extends Controller
{
    public function index()
    {
        $pilotak = Pilota::all();
        return view('crud.index', compact('pilotak'));
    }

    public function create()
    {
        return view('crud.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nev' => 'required|string|max:255',
            'nem' => 'required|in:F,N',
            'szuletett' => 'required|date',
            'nemzetiseg' => 'required|string|max:255'
        ]);

        Pilota::create($request->all());
        return redirect()->route('crud.index')->with('success', 'Pilóta sikeresen hozzáadva!');
    }

    public function edit($id)
    {
        $pilota = Pilota::findOrFail($id);
        return view('crud.edit', compact('pilota'));
    }

    public function update(Request $request, $id)
    {
        $pilota = Pilota::findOrFail($id);

        $request->validate([
            'nev' => 'required|string|max:255',
            'nem' => 'required|in:F,N',
            'szuletett' => 'required|date',
            'nemzetiseg' => 'required|string|max:255'
        ]);

        $pilota->update($request->all());
        return redirect()->route('crud.index')->with('success', 'Pilóta adatai módosítva.');
    }

    public function destroy($id)
    {
        $pilota = Pilota::findOrFail($id);
        $pilota->delete();

        return redirect()->route('crud.index')->with('success', 'Pilóta törölve.');
    }
}
