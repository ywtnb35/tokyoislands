<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Photo;
use Intervention\Image\Facades\Image;

class TopController extends Controller
{
    public function index(Request $request) //島一覧表示
    {
        return view('top');
    }
}