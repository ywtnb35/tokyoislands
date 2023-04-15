<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Photo;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class PhotoController extends Controller
{
    //写真投稿画面を表示
    public function add()
    {
        return view('island.photo.create');
    }
    
    // 写真投稿
    public function create(Request $request)
    {
            
        $photo = new Photo;
        

       
        
        $user = Auth::user(); // ログインユーザーを取得
        
        if ($user !== null) {   // ログインしているユーザーのidをphotoテーブルに保存
            $photo->user_id = $user->id;
        }
        
        if ($request->hasFile('img')) {  //画像ファイルがアップロードされていればファイルを保存しpathをphotoテーブルに保存
            $path = $request->file('img')->store('public/img');
            $photo->island_image = basename($path);
        }
        $photo->island_name = $request->input('islands_name');
        $photo->genre = $request->input('genre');
        $photo->text = $request->input('text');  //フォームから入力されたテキストをphotoテーブルに保存
      
        $photo->save(); //データベースに保存
        
        return redirect()->route('island.top', ['id' => $photo->island_name]);
    }
    
    //写真を表示
    public function index(Request $request,$id)
    {
        $photos = Photo::where('islnad_name', $id)->get(); 
        dd($photos);
        return view('island.top', ['photos'=>$photos]);  //island/topに写真を表示する
    }
}