<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $categorie=Categorie::all();
            return response() ->json($categorie);
            
        } catch (\Exception $e){
        return response()->json(["erreur recupération des données"]);}
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
            $categorie = new Categorie([
                "nomcategorie" => $request->input("nomcategorie"),
                "imagecategorie" => $request->input("imagecategorie")
            ]);
            $categorie->save();
            return response() ->json($categorie);
        }catch (\Exception $e){
            return response()->json(["Erreur d'insertion {$e-> getMessage()}"]);
        //
    }
}
    /**
     * Display the specified resource.
     */
    public function show(Categorie $categorie)
    {
        try{
            $categorie=Categorie::findOrFail($categorie->id);
            return response()->json($categorie,200);

        }catch (\Exception $e){
            return response()->json(["erreur de consultation"]);
        //
    }}

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try{
            $categorie = Categorie::findOrFail($id);  
            $categorie->update($request->all());
            return response() ->json($categorie);

        }catch (\Exception $e){
            return response()->json("Erreur de modification");
        }
        
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Categorie $categorie)
    {
        try{
            $categorie=Categorie::findOrFail($categorie->id);
            $categorie->delete();
            return response()->json("catégorie supprimée avec succées,200");

        }catch (\Exception $e){
            return response()->json(["erreur de suppression"]);
        //
    }}
}
