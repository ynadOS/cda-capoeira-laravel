<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(User $user)
    {
        return User::all();
    }

    public function show($id)
    {
        // Récupère la user avec l'ID passé en paramètre
        $user = User::find($id);
    
        // Retourne la user en JSON
        return response()->json($user);
    }
    

    public function store(Request $request) {
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->school_id = $request->school_id;
        $user->refNum = $request->refNum;

        $user->save();
        return response()->json(["result" => "ok"],201);
    }

    public function destroy($id)
{
    // Récupérer la user avec l'ID
    $user = User::find($id);

    // Supprimer la user
    $user->delete();

    // Retourner une réponse indiquant que la suppression a réussi
    return response()->json(['message' => 'user supprimée avec succès'], 200);
}

public function update(Request $request, $id)
{
    //
    $user = User::find($id);
    $user->update($request->all());
    return response()->json($user);

}
}
