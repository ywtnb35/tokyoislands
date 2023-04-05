<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Photo;

class PhotoController extends Controller
{
    //写真一覧を表示
    public function index(Request $request)
    {
        $photos = Photo::all();
        return view('island.photo.top', ['photos' => $photos]);
    }
    
    public function add()
    {
        return view('island.photo.create');
    }
    
    //写真投稿
    public function create(Request $request)
    {
        return view('island/photo.create');
    }
    
    public function store(Request $request)
    {
        $user = Auth::user();
        $photo = new Photo;
        $photo->user_id = $user->id;
        $photo->url = $request->file('image')->store('public/image');
        $path = $request->file('image')->store('public/image');
        $photo->image_path = basename($path);
        $photo->text = $request->textarea('text');
        $photo->fill($request->all());
        $photo->save();
        
        return redirect() -> route('photo.index');
    }
}

