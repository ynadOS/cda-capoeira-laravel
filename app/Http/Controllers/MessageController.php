<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index(Message $message)
    {
        return Message::all();
    }

    public function show($id)
    {
        // Récupère la message avec l'ID passé en paramètre
        $message = Message::find($id);
    
        // Retourne la message en JSON
        return response()->json($message);
    }
    

    public function store(Request $request) {
        $message = new Message;
        $message->user_id = $request->user_id;
        $message->discussion_id = $request->discussion_id;
        $message->text = $request->text;
        $message->date = $request->date;

        $message->save();
        return response()->json(["result" => "ok"],201);
    }

    public function destroy($id)
{
    // Récupérer la message avec l'ID
    $message = Message::find($id);

    // Supprimer la message
    $message->delete();

    // Retourner une réponse indiquant que la suppression a réussi
    return response()->json(['message' => 'message supprimée avec succès'], 200);
}

public function update(Request $request, $id)
{
    //
    $message = Message::find($id);
    $message->update($request->all());
    return response()->json($message);

}
}
