<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Photo;
use Illuminate\Support\Facades\Auth;


class PhotoController extends Controller
{
    // 写真一覧を表示
    public function index(Request $request)
    {
        $photos = Photo::all();
        return view('island.top', ['photos' => $photos]);
    }
    
    public function add()
    {
        return view('island/photo.create');
    }
    
    // 写真投稿
    public function create(Request $request)
    {
            
        $photo = new Photo;
        
        $user = Auth::user(); // ログインユーザーを取得
        
        if ($user !== null) {
            $photo->user_id = $user->id;
        }
        
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('public/image');
            $photo->image_path = basename($path);
        }
        
        $photo->text = $request->input('text');
        
        $photo->save(); 
        
        return redirect()->route('photo.create');
    }
    
    public function show(Request $request,$id)
    {
        $photos = photo::where('user_id', $id)->get();
        
        return view('island.top', ['photos' => $photos]);
    }
}