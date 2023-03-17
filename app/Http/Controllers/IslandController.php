<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IslandController extends Controller
{
    //島個別ページ
    public function index()
    {
        return view('island.top');
    }
}
