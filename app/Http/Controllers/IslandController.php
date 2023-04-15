<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Photo;

class IslandController extends Controller
{
    //島個別ページ
    public function index(Request $request)
    {
        $island_name = $request->name;
        $island_img = $request->name . ".jpg";
        $photos = Photo::where("island_name", $island_name)->get();
        
        return view('island.top', ['island_name'=> $island_name, 'island_img'=> $island_img, 'photos'=> $photos]);
    }
}

