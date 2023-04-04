<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Photo;

class PhotoController extends Controller
{
    //写真一覧を表示
    public function index(Request $request)
    {
        return view('island.photo.top');
    }
    
    public function add()
    {
        return view('island.photo.create');
    }
    
    //写真投稿
    public function create(Request $request)
    {
        $photo = new Photo;
        $form = $request->all();
        
        $path = $request->file('image')->store('public/image');
        $photo->image_path = basename($path);
        
        
        $photo ->save();
        
        $photo->fill($form);
        $photo->save();
        
        return redirect('island/top');
    }
    
    public function store(Request $request)
    {
        $request->hasFile('photo');
        
        return redirect() -> route('photo.index');
    }
}

