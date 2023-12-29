<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Photo;
use App\Models\Island;
use Intervention\Image\Facades\Image;

class IslandController extends Controller
{
    //島個別ページ
    public function index(Request $request)
    {
        $island_name = $request->name; //リクエストからnameを取得し$island_nameに代入
        $genre = $request->genre; //リクエストからgenreを取得し$genreに代入
        $island_img = $request->name . ".jpg"; //島の名前に.jpgをつけてファイルを生成
        
        
        $island = Island::where('island_name',$island_name)->first(); //Islandモデルからisland_nameカラムと$island_nameが一致するデータを取得
        
        if($genre == null){ //ジャンルが指定されていない場合
            $photos = Photo::where('island_name', $island_name)->get(); // island_nameすべての写真をget
        }else{ //ジャンルがしてされている場合
            $photos = Photo::where('island_name', $island_name)->where('genre',$genre)->get(); // ジャンルに一致する写真を取得
        }
        
        return view('island.top', ['island_img'=> $island_img, 'photos'=> $photos,'island'=>$island]);
    }
}
    

