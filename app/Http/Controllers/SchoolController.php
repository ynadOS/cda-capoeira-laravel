<?php

namespace App\Http\Controllers;
use App\Models\School;


use Illuminate\Http\Request;

class SchoolController extends Controller
{
    public function index(School $school)
    {
        $data = json_decode($school, true);
        foreach ($data as $item) {
            echo $item['name'];
            var_dump($item);
        }
        // Récupérer la valeur de 'name'
        return School::all();
    }

    public function show($id)
    {
        // Récupère la school avec l'ID passé en paramètre
        $school = School::find($id);
    
        // Retourne la school en JSON
        return response()->json($school);
    }
    

    public function store(Request $request)
    {
        // Validation des données entrantes
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'location.address.street' => 'required|string|max:255',
            'location.address.city' => 'required|string|max:255',
            'location.address.zipcode' => 'required|string|max:10',
            'location.geo.type' => 'required|string|in:point',
            'location.geo.coordinates' => 'required|array|min:2|max:2',
            'location.geo.coordinates.*' => 'required|numeric',
        ]);
    
        // Création de l'école
        $school = new School();
        $school->name = $validatedData['name'];
        $school->location = json_encode($validatedData['location']); // Si "location" est stocké comme JSON
        $school->save();
    
        // Retourne la réponse en JSON
        return response()->json(['message' => 'School created successfully', 'school' => $school], 201);
    }
    

    public function destroy($id)
{
    // Récupérer la school avec l'ID
    $school = School::find($id);

    // Supprimer la school
    $school->delete();

    // Retourner une réponse indiquant que la suppression a réussi
    return response()->json(['message' => 'school supprimée avec succès'], 200);
}

public function update(Request $request, $id)
{
    //
    $school = School::find($id);
    $school->update($request->all());
    return response()->json($school);

}
}
