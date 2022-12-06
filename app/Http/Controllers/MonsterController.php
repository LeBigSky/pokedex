<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Monster;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MonsterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types= Type::all();
        return view ('pages.pokemons.create', compact('types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            "nom" =>['required', 'min:3', 'max:15'],
            "type_id" =>['required'],
            "level" =>['required'],
            "src" =>['required']
        ]);

        $store = new Monster();
        $store->nom = $request->nom;
        $store->type_id = $request->type_id;
        $store->level = $request->level;
        $store->save();
        $image= new Image();
        $image->src = $request->file('src')->hashName();
        Storage::put('public/', $request->file('src'));
        $image->monster_id = $store->id;
        $image->save();
        return redirect('/')->with('success', 'Bravo jeune dresseur, ton nouveau pocket monster a été crée');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Monster  $monster
     * @return \Illuminate\Http\Response
     */
    public function show(Monster $monster)
    {
        return view('pages.pokemons.show', compact('monster'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Monster  $monster
     * @return \Illuminate\Http\Response
     */
    public function edit(Monster $monster, Request $request)
    {
        $types= Type::all();
        return view('pages.pokemons.edit', compact('monster', 'types'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Monster  $monster
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Monster $monster, Image $image )
    {
 if($request->type_id != $monster->type->id){
            $monster->type_id = $request->type_id;
            $image->src = $monster->image->src; 
            $monster->nom = $request->nom;
            $monster->level= $request->level;
            $monster->save();
        }
        else{
            $monster->nom = $request->nom;
            $monster->type_id= $request->type_id;
            $image->src = $monster->image->src; 
            $monster->level= $request->level;
            $monster->save();
        }

        $request->validate([
            "nom" =>['required', 'min:3', 'max:15'],
            "type_id" =>['required'],
            "level" =>['required'],
            
        ]);
       

        if($request->src != null){
        $image= Image::find( $monster->id);
        if($monster->id > 4){
          Storage::delete('public/'.$monster->image->src);  
        }
        
        $image->src = $request->file('src')->hashName();
        Storage::put('public/', $request->file('src'));
        
        }
        else{
        $image->src = $monster->image->src;    
        }
        $image->monster_id = $monster->id;
        $image->save();
        $monster->nom = $request->nom;
        $monster->type_id= $request->type_id;
        $monster->level= $request->level;
        $monster->save();
        return redirect()->route('home')->with('success', $monster->nom.' a bien été modifié');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Monster  $monster
     * @return \Illuminate\Http\Response
     */
    public function destroy(Monster $monster)
    {
        if($monster->id > 4){
         Storage::delete('public/'.$monster->image->src);   
        }
        $monster->image->delete();
        $monster->delete();
        return redirect()->route('home');
    }
}
