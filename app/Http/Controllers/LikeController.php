<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Photo;
use App\Models\Island;
use App\Models\User;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class LikeController extends Controller
{
    //
    public function store($photo_id)
    {
        Auth::user()->like($photo_id);
        return 'good!';
    }
    
    public function destroy($photo_id)
    {
        Auth::user()->unlike($photo_id);
        return 'ok!';
    }
}
