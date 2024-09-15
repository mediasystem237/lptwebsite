<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        $settings = Setting::all()->pluck('value', 'key');
        return view('admin.settings.index', compact('settings'));
    }

    public function update(Request $request)
{
    $validatedData = $request->validate([
        'church_name' => 'required|max:255',
        'church_description' => 'nullable',
        'contact_email' => 'required|email',
        'contact_phone' => 'nullable|max:20',
        'address' => 'nullable',
    ]);

    foreach ($validatedData as $key => $value) {
        Setting::updateOrCreate(
            ['key' => $key],
            ['value' => $value]
        );
    }

    return redirect()->route('admin.settings.index')->with('success', 'Paramètres mis à jour avec succès.');
}
    
}