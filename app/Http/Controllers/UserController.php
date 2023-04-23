<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Photo;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class UserController extends Controller
{
    public function index(Request $request)
    {
        $user_id = $request->user()->id;
        $photos = Photo::where('user_id',$user_id)->get();
        return view('mypage/mypage',['photos'=>$photos, 'user_id'=>$user_id]);
    }
}
