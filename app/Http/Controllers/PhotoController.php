<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Photo;
use App\Models\Island;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;


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
        $this->validate($request, Photo::$rules);
        
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
        
        return redirect()->route('island.top', ['name' => $photo->island_name]);
    }
    
    //写真を表示（島個別ページ）
    public function index(Request $request,$id)
    {
        $photos = Photo::where('island_name',$id)->get();
        
        return view('island.top', ['photos'=>$photos]);  //island/topに写真を表示する
    }
    
    //写真詳細ページ
    public function show(Request $request)
    {
        $photo = Photo::find($request->id);
        if (empty($photo)) {
            abort(404);
        }
        $user_name = $photo->user_name;
        return view('island.photo.detail',['photo'=>$photo,'user_name'=>$user_name]);
    }
    
    //マイページの写真詳細ページ
    public function detail(Request $request)
    { 
        $photo = Photo::find($request->id);
        if (empty($photo)) {
            abort(404);
        }
        $id = $photo->id;
        $user_name = $photo->user_name;

        return view('mypage.mypagedetail',['user_name'=>$user_name,'photo'=>$photo]);
    }
    
    //検索画面表示
    public function showSearch(Request $request){
        return view('island.photo.search');
    }
    
    //検索
    public function search(Request $request)
    {
        $island_name = $request->input('island_name');
        $genre = $request->input('genre');
        
        if($island_name == 'すべての島' && $genre != 'すべてのジャンル'){
            $photos = Photo::where('genre',$genre)->get();
        }else if ($island_name != 'すべての島' && $genre == 'すべてのジャンル'){
            $photos = Photo::where('island_name',$island_name)->get();
        }else if($island_name != 'すべての島' && $genre != 'すべてのジャンル'){
            $photos = Photo::where("island_name", $island_name)->where("genre",$genre)->get();
        }else{
            $photos = Photo::get();
        }
        
        
        $island = Island::where('island_name',$island_name)->first();
        return view('island.top', ['island_name' => $island_name, 'genre' => $genre, 'photos' => $photos, 'island' => $island]);
    }


    //削除
    public function delete(Request $request)
    {
        $photo = Photo::find($request -> id);
        if (empty($photo)) {
            abort(404);
        }
        $photo->delete();
        
        return redirect()->route('island.top', ['name' => $photo->island_name]);
    }
}