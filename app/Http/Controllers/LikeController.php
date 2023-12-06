<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Photo;
use App\Models\Island;
use App\Models\User;
use App\Models\Comment;
use App\Models\Like;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Log;



class LikeController extends Controller
    {
    public function store($photo_id) 
    {
        $user_id = auth()->user()->id;
        $like = Like::where('photo_id', $photo_id)->where('user_id', $user_id)->first();
    
        if ($like) {
            // 既に「いいね」されていれば、それを削除
            $like->delete();
        } else {
            // まだ「いいね」されていなければ、新しく追加
            $like = new Like();
            $like->photo_id = $photo_id;
            $like->user_id = $user_id;
            $like->save();
        }
        
        return response()->json(['likesCount' => Like::where('photo_id', $photo_id)->count()]);
    }

    
    public function destroy($photo_id)
    {
        $like = Like::where('photo_id',$photo_id)->whre('user_id',auth()->user()->id)->first();
        if ($like){
            $like->delete();
        }
        
        return response()->json(['likesCount' =>Like::where('photo_id',$photo_id)->count()]);
    }
        
        
    //     $user = Auth::user(); //ログインしているユーザーを取得
    //     $photo = Photo::find($photo_id); //指定されたidを写真のデータベースから取得
    //     if(!$user || !$photo){ //ユーザーまたは写真が見つからなかったらerrorを返す
    //         return response()->json(['error'=> 'User or Photo not found'], 404);
    //     }
    //     $user->like($photo_id); //likeメソッドを呼び出し写真へのいいねを追加
    //     $likes_count = $photo->likes()->count(); //いいねされた数を取得
    //     return response()->json(['likes_count'=>$likes_count]); //いいねの数を含めて返す
    // }
    
    // public function destroy($photo_id) //いいねを削除
    // {
    //     $user = Auth::user(); //ログインユーザーを取得
    //     $photo = Photo::find($photo_id); //指定されたidを写真のデータベースから取得
    //     if(!$user || !$photo){
    //         return response()->json(['error'=>'User or Photo not found'], 404);
    //     }
    //     $user->unlike($photo_id); //いいねの削除
    //     $likes_count = $photo->likes()->count(); //いいねの数を取得
    //         return response()->json(['likes_count'=>$likes_count]); //いいねの数を含めて返す
    // }
}
