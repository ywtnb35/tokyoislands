<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Photo;
use Intervention\Image\Facades\Image;

class IslandController extends Controller
{
    //島個別ページ
    public function index(Request $request)
    {
        $photos = Photo::all();
        
        foreach($photos as $photo){
        $image_path = 'public/img/'.$photo->island_img;
        $image = Image::make($image_path);
        $width = 422;
        $height = 500;
        $image->resize($width, $height);
        $savePath = 'public/img/resized_' . $photo->island_img;
        $image->save(storage_path('app/' . $savePath));
        $photo->resized_img = $savePath;
        $photo->save();
        
        $island_name = $request->name;
        $genre = $request->genre;
        $island_img = $request->name . ".jpg";
        
        if($genre == null){
            $photos = Photo::where("island_name", $island_name)->get(); // island_nameすべての写真をget
        }else{
            $photos = Photo::where("island_name", $island_name)->where("genre",$genre)->get(); // nullでなければgenreの写真をget
        }
        
        return view('island.top', ['island_name'=> $island_name, 'island_img'=> $island_img, 'photos'=> $photos]);
        }
    
    }
    
    // public function create(Request $request)
    // {
    //     if(!auth()->check()){
    //         return redirect()->route('register');
    //     }
    //     return view('islnadphoto.create');
    // }
}
