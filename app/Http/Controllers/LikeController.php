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
    //
    public function store($photo_id)
    {
        $photo = Photo::find('photo_id');
        if($photo){
            Auth::user()->like($photo_id);
            $likes_count = $photo->likes->count();
            return response()->json(['likes_count'=>$likes_count]);
        }
    }
    
    public function destroy($photo_id)
    {
        $photo = Photo::find($photo_id);
        if($photo){
            Auth::user()->unlike($photo->id);
            $likes_count = $photo_id->likes->count();
            return response()->json(['likes_count'=>$likes_count]);
        }
    }
}
