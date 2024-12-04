<?php

namespace App\Http\Controllers;

use App\Models\Ressource;
use Illuminate\Http\Request;

class RessourceController extends Controller
{
    public function index(Ressource $ressource)
    {
        return Ressource::all();
    }

    public function show($id)
    {
        // Récupère la ressource avec l'ID passé en paramètre
        $ressource = Ressource::find($id);
    
        // Retourne la ressource en JSON
        return response()->json($ressource);
    }
    

    public function store(Request $request) {
        $ressource = new Ressource;
        $ressource->title = $request->title;
        $ressource->url = $request->url;
        $ressource->type = $request->type;
        $ressource->save();
        return response()->json(["result" => "ok"],201);
    }

    public function destroy($id)
{
    // Récupérer la ressource avec l'ID
    $ressource = Ressource::find($id);

    // Supprimer la ressource
    $ressource->delete();

    // Retourner une réponse indiquant que la suppression a réussi
    return response()->json(['message' => 'Ressource supprimée avec succès'], 200);
}

public function update(Request $request, $id)
{
    //
    $ressource = Ressource::find($id);
    $ressource->update($request->all());
    return response()->json($ressource);

}

}
