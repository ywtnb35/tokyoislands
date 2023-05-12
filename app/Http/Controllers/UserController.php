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
        $user = $request->user();
        if ($user) {
            $user_id = $user->id;
            $photos = Photo::where('user_id', $user_id)->get();
            $user_name = $user->name;
            return view('mypage/mypage', ['photos' => $photos, 'user_id' => $user_id,'user_name' => $user_name]);
        } else {
            return redirect('island.top');
        }
    }

}
