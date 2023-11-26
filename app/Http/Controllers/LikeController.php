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

class LikeController extends Controller
{
    public function store($photo_id)
    {
        $user = Auth::user();
        $photo = Photo::find($photo_id);
        if(!$user || $photo){
            return response()->json(['error'=> 'User or Photo not found'], 404);
        }
        $user->like($photo_id);
        $likes_count = $photo->likes()->count();
        return response()->json(['likes_count'=>$likes_count]);
    }
    
    public function destroy($photo_id)
    {
        $user = Auth::user();
        $photo = Photo::find($photo_id);
        if(!$user || $photo){
            return response()->json(['error'=>'User or Photo not found'], 404);
        }
        $user->unlike($photo_id);
         $likes_count = $photo->likes()->count();
        return response()->json(['likes_count'=>$likes_count]); 
    }
}
