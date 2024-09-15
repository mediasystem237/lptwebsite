<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Officer;
use Illuminate\Http\Request;

class OfficerController extends Controller
{
    public function index()
    {
        $officers = Officer::all();
        return view('admin.officers.index', compact('officers'));
    }

    public function create()
    {
        return view('admin.officers.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'role' => 'required|max:255',
            'description' => 'nullable',
            'image' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('officers', 'public');
            $validatedData['image'] = $imagePath;
        }

        Officer::create($validatedData);

        return redirect()->route('admin.officers.index')->with('success', 'Officier créé avec succès.');
    }

    public function edit(Officer $officer)
    {
        return view('admin.officers.edit', compact('officer'));
    }

    public function update(Request $request, Officer $officer)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'role' => 'required|max:255',
            'description' => 'nullable',
            'image' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('officers', 'public');
            $validatedData['image'] = $imagePath;
        }

        $officer->update($validatedData);

        return redirect()->route('admin.officers.index')->with('success', 'Officier mis à jour avec succès.');
    }

    public function destroy(Officer $officer)
    {
        $officer->delete();
        return redirect()->route('admin.officers.index')->with('success', 'Officier supprimé avec succès.');
    }
}