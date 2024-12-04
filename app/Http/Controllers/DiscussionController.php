<?php

namespace App\Http\Controllers;

use App\Models\Discussion;
use Illuminate\Http\Request;

class DiscussionController extends Controller
{
    public function index(Discussion $discussion)
    {
        return Discussion::all();
    }

    public function show($id)
    {
        // Récupère la discussion avec l'ID passé en paramètre
        $discussion = Discussion::find($id);
    
        // Retourne la discussion en JSON
        return response()->json($discussion);
    }
    

    public function store(Request $request) {
        $discussion = new Discussion;
        $discussion->subject = $request->subject;
        $discussion->description = $request->description;
        $discussion->author_id = $request->author_id;
        $discussion->createdAt = $request->createdAt;

        $discussion->save();
        return response()->json(["result" => "Discussion créée"],201);
    }

    public function destroy($id)
{
    // Récupérer la discussion avec l'ID
    $discussion = Discussion::find($id);

    // Supprimer la discussion
    $discussion->delete();

    // Retourner une réponse indiquant que la suppression a réussi
    return response()->json(['message' => 'discussion supprimée avec succès'], 200);
}

public function update(Request $request, $id)
{
    //
    $discussion = Discussion::find($id);
    $discussion->update($request->all());
    return response()->json($discussion);

}
}
