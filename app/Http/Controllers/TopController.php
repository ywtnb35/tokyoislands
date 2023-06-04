<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Photo;
use Intervention\Image\Facades\Image;

class TopController extends Controller
{
    public function index(Request $request) //島一覧表示
    {
        // $photos = Photo::all();
        
        // foreach($photos as $photo){
        // $imgPath = storage_path('app/public/img/'.$photo->island_img);
        // $image = Image::make($imgPath);
        // $width = 422;
        // $height = 500;
        // $image->resize($width, $height);
        // $savePath = 'public/img/resized_' . $photo->island_img;
        // $image->save(storage_path('app/' . $savePath));
        // $photo->resized_img = $savePath;
        // $photo->save();
        // }
        
        return view('top');
    }
}