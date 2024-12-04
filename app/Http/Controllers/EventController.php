<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;


class EventController extends Controller
{
    public function index(Event $event)
    {
        return Event::all();
    }

    public function show($id)
    {
        // Récupère la event avec l'ID passé en paramètre
        $event = Event::find($id);
    
        // Retourne la event en JSON
        return response()->json($event);
    }
    

    public function store(Request $request) {
        $event = new Event;
        $event->title = $request->title;
        $event->description = $request->description;
        $event->category = $request->category;
        $event->public = $request->public;
        $event->city = $request->city;
        $event->school_id = $request->category;
        $event->start_date = $request->start_date;
        $event->end_date = $request->end_date;

        $event->save();
        return response()->json(["result" => "ok"],201);
    }

    public function destroy($id)
{
    // Récupérer la event avec l'ID
    $event = Event::find($id);

    // Supprimer la event
    $event->delete();

    // Retourner une réponse indiquant que la suppression a réussi
    return response()->json(['message' => 'event supprimée avec succès'], 200);
}

public function update(Request $request, $id)
{
    //
    $event = Event::find($id);
    $event->update($request->all());
    return response()->json($event);

}

}
