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
            return redirect('island.top');
        }
    }
}  
    // public function detail(Request $request)
    // { 
    //     $user = $request->user();
    //     $user_id = $user->id;
    //     $photo = Photo::where('user_id',$user_id)->get();
    //     $user_name = $user->name;
        
    //     // $photo = Photo::find($request->id);
    //     // $user_name = $request->user()->name;
        
    //     return view('mypage/mypagedetail',['photo'=>$photo,'user_name'=>$user_name]);
    // }

