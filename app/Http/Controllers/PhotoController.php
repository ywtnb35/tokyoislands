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
    
    //写真投稿
    public function create()
    {
        return view('island.photo.create');
    }
}

