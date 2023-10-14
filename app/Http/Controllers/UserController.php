<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Photo;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class UserController extends Controller
{
    //ユーザーマイページ表示
    public function index(Request $request)
    {
        $user_id = $request->id;
       
        if ($user_id){
            $photos = Photo::where('user_id',$user_id)->get();
            $user_name = $request->user_name;
            $user = User::find($user_id);
            return view('mypage/mypage',['photos'=>$photos,'user_id'=>$user_id,'user_name'=>$user_name,'user'=>$user]);
        } else {
            $user_id = Auth::id();
            $user = User::find($user_id);
            $user_name = Auth::user() ? Auth::user()->name : null;
            
                if($user_name === null) {
                    return view('auth.login');
                }
        
            $photos = Photo::where('user_id',$user_id)->get();
        
            return view('mypage/mypage',['photos'=>$photos,'user_id'=>$user_id,'user_name'=>$user_name,'user'=>$user]);
        }
        
    }
    
    //プロフィール画像の変更画面を表示
    public function change(Request $request)
    {
        $user_id = Auth::id();
    
        if($user_id != $request->user_id){
            $user = User::find($request->user_id);
            $user_name = $user ? $user->name : null;
            return redirect()->route('mypage.index',['id'=>$request->user_id,'user_name'=>$user_name]);
        }
    
        $user = User::find($user_id);
        $user_name = Auth::user() ? Auth::user()->name : null;
        
        return view('mypage.change',['user'=>$user,'user_name'=>$user_name,'user_id'=>$user_id]);
        
    }
    
    //プロフィール写真を変更
    public function upload(Request $request)
    {
        $user = Auth::user(); 
    
        if ($request->hasFil('profile_img')) { 
            $path = $request->file('profile_img')->store('public/img');
            $user->profile_img = basename($path);
        }else{
            if(!$user->profile_img){
            $user->profile_img = null;
            }
        }
        
        $user->save();
        return redirect()->route('mypage.index');
    }
    
    //プロフィール画像削除
    public function delete(Request $request)
    {
        $user = Auth::user();
        if(!$user){
            abort(404);
        }
        
        if($user->profile_img !== 'default.jpeg'){
            Storage::delete('public/img/'.$user->profile_img);
    }
    $user->profile_img = null;
    $user->save();

    return redirect()->route('mypage.index');
    }
    
}
