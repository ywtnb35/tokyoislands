<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Island extends Model
{
    use HasFactory;
    protected $fillable = ['island_name', 'official_site'];
}

    
    Island::create([
        ['island_name'=> '大島','official_site' => 'http://www.izu-oshima.or.jp/'],
        ['island_name' => '利島','official_site' => 'https://www.toshimamura.org/'],
        ['island_name'=> '新島','official_site'=> 'https://niijima-info.jp/'],
        ['island_name'=> '式根島','official_site'=>'https://shikinejima.tokyo/'],
        ['island_name'=>'神津島','official_site'=> 'https://kozushima.com/'],
        ['island_name' => '三宅島','official_site'=>'https://www.miyakejima.gr.jp/#'],
        ['island_name'=> '御蔵島','official_site'=>'https://mikura-isle.com/'],
        ['island_name'=> '八丈島','official_site'=> 'https://www.hachijo.gr.jp/'],
        ['island_name' => '青ヶ島','official_site'=> 'https://www.vill.aogashima.tokyo.jp/top.html']
    ]);