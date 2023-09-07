<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Photo;
use App\Models\User;
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
            $user_name = Auth::user() ? Auth::user()->name : null;
            $user_id = Auth::id();
            if(Auth::user() === null){
                return view('auth.login');
            }
            return view('mypage/mypage',['photos' => $photos,'user'=>$user_id,'user_name' => $user_name,]);
        }
    }
    
    //プロフィール画像の変更画面を表示
    public function change(Request $request)
    {
        $user_id = $request->user_id;
        $user = User::find($user_id);
        $user_name = Auth::user() ? Auth::user()->name : null;
        
        return view('mypage.change',['user'=>$user,'user_name'=>$user_name]);
    }
    
    //プロフィール写真を変更
    public function upload(Request $request)
    {
        $user = Auth::user(); 
    
        if ($request->hasFile('profile_img')) { 
            $path = $request->file('profile_img')->store('public/img');
            $user->profile_img = basename($path);
                
            $user->save(); 
        }
        
        return redirect()->route('mypage.index');
    }
    
    //プロフィール画像削除
    public function delete(Request $request)
    {
        $user = Auth::user();
        if(!$user){
            abort(404);
        }
        
        if($user->profile_img){
            Storage::delete('public/img/'.$user->profile_img);
    }
    
    return redirect()->route('mypage.index');
    }
    
}
