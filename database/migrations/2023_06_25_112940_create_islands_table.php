<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Island;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('islands', function (Blueprint $table) {
            $table->id();
            $table->string('island_name')->default('');
            $table->string('official_site');
            $table->timestamps();
        });
        
        if (Schema::hasColumn('islands', 'island_name') && Schema::hasColumn('islands', 'official_site')) {
            
        }
        
            Island::create(['island_name'=>'大島','official_site' => 'http://www.izu-oshima.or.jp/']);
            Island::create(['island_name'=>'利島','official_site' => 'https://www.toshimamura.org/']);
            Island::create(['island_name'=>'新島','official_site'=> 'https://niijima-info.jp/']);
            Island::create(['island_name'=>'式根島','official_site'=>'https://shikinejima.tokyo/']);
            Island::create(['island_name'=>'神津島','official_site'=> 'https://kozushima.com/']);
            Island::create(['island_name'=>'三宅島','official_site'=>'https://www.miyakejima.gr.jp/#']);
            Island::create(['island_name'=>'御蔵島','official_site'=>'https://mikura-isle.com/']);
            Island::create(['island_name'=>'八丈島','official_site'=> 'https://www.hachijo.gr.jp/']);
            Island::create(['island_name'=>'青ヶ島','official_site'=> 'https://www.vill.aogashima.tokyo.jp/top.html']);
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('islands');
    }
};
