<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Photo;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class PhotoController extends Controller
{
    // 写真一覧を表示
    public function index(Request $request,$id)
    {
      $photos = Photo::all(); //写真データを取得
        foreach($photos as $photo){   //取得した写真を$photos配列に代入
            $photo->url =Storage::url($photo->filename);  //それぞれの写真にurlを生成。生成したurlをurl属性にセット
        }
        
        return view('island.top', compact('photos'));  //ビューに$photos変数を使用して渡す
    }
    
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
        
        return redirect()->route('island.top');
    }
    
    public function show(Request $request,$id)
    {
        $user = Auth::user();  //ログインユーザーを取得
        $photos = Photo::where('islnad_name', $id)->get(); //ユーザーが投稿した写真を取得する
        
        return view('island.top', compact('photos'));  //ビューに写真を投稿する
    }
}