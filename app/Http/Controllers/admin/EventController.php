<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::orderBy('date', 'desc')->get();
        return view('admin.events.index', compact('events'));
    }

    public function show()
    {
        $now = Carbon::now();

        // Récupérer les événements à venir
        $upcomingEvents = Event::where('date', '>=', $now->toDateString())
                                ->orderBy('date', 'asc')
                                ->orderBy('time', 'asc')
                                ->get();

        // Récupérer les événements passés
        $pastEvents = Event::where('date', '<', $now->toDateString())
                            ->orderBy('date', 'desc')
                            ->orderBy('time', 'desc')
                            ->get();

        return view('events.index', compact('upcomingEvents', 'pastEvents'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'date' => 'required|date',
            'time' => 'required|date_format:H:i',
            'location' => 'required|max:255',
            'image' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('events', 'public');
            $validatedData['image'] = $imagePath;
        }

        Event::create($validatedData);

        return redirect()->route('admin.events.index')->with('success', 'Événement créé avec succès.');
    }

    public function edit(Event $event)
    {
        return view('admin.events.edit', compact('event'));
    }

    public function update(Request $request, Event $event)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'date' => 'required|date',
            'time' => 'required|date_format:H:i',
            'location' => 'required|max:255',
            'image' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('events', 'public');
            $validatedData['image'] = $imagePath;
        }

        $event->update($validatedData);

        return redirect()->route('admin.events.index')->with('success', 'Événement mis à jour avec succès.');
    }

    public function destroy(Event $event)
    {
        $event->delete();
        return redirect()->route('admin.events.index')->with('success', 'Événement supprimé avec succès.');
    }
}
