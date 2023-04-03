<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PhotoController extends Controller
{
    //写真一覧を表示
    public function index()
    {
        return view('island.photo.detail');
    }
    
    public function add()
    {
        return view('island.photo.create');
    }
    
    //写真投稿
    public function create(Request $request)
    {
        // $post = new create;
        // $post -> usre_id = Auth::id();
        
        // $img = $request ->file('img');
        // $path = $img ->create('public/img');
        // $post ->img = str_replace('public/', '', $path);
        
        // $post ->save();
        
        return view('island.photo.create');
    }
}

