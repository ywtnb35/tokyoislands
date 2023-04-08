<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IslandController extends Controller
{
    //島個別ページ
    public function index(Request $request)
    {
        $island_id = $request->input('id');
        $island_names = ['大島','利島','新島','式根島','神津島','三宅島','御蔵島','八丈島','青ヶ島'];
        $island_img = "";
        
        switch($island_id){
            case '1':
                $island_name = "大島";
                $island_img = "大島.jpg";
                break;
            case '2':
                $island_name = "利島";
                $island_img = "利島.jpg";
                break;
            case '3':
                $island_name = "新島";
                $island_img = "新島.jpg";
                break;
            case '4':
                $island_name = "式根島";
                $island_img = "式根島.jpg";
                break;
            case '5':
                $island_name = "神津島";
                $island_img = "神津島.jpg";
                break;
            case '6':
                $island_name = "三宅島";
                $island_img = "三宅島.jpg";
                break;
            case '7':
                $island_name = "御蔵島";
                $island_img = "御蔵島.jpg";
                break;
            case '8':
                $island_name = "八丈島";
                $island_img = "八丈.jpg";
                break;
            case '9':
                $island_name = "青ヶ島";
                $island_img = "青ヶ島.jpg";
                break;
            default:
                $island_name = "ヒットしませんでした";
                $island_img = "noimg.jpg";
                break;
                
        }
        return view('island.top', ['island_name'=> $island_name, 'island_img'=> $island_img]);
    }
}

