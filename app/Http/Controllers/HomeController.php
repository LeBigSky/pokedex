<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Monster;
use App\Models\Type;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home (){
        $pokemons= Monster::all();
        $images= Image::all();
        $types= Type::all();

        return view ('home', compact('pokemons', 'images', 'types'));
    }
}
