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
            $user_name = $request->name;
            return view('mypage/mypage', ['photos' => $photos, 'user_id' => $user_id,'user_name' => $user_name]);
        } else {
            $user_name = $request->name;
            return redirect()->route('mypage');
        }
    }
}  
