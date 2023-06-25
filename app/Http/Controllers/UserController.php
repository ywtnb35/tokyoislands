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
        $user_id = $request->id;
        if ($user_id) {
            $photos = Photo::where('user_id', $user_id)->get();
            $user_name = $request->user_name;
            return view('mypage/mypage', ['photos' => $photos, 'user_id' => $user_id,'user_name' => $user_name]);
        } else {
            $photos = Photo::where('user_id', Auth::id())->get();
            $user_name = Auth::user() ? AUth::user()->name : null;
            
            if(Auth::user() === null){
                return view('auth.login');
            }
            return view('mypage/mypage',['photos' => $photos,'user_name' => $user_name]);
        }
    }
}  
