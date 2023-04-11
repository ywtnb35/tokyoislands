<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $table = 'photos';
    
    protected $fillable = [
        'island_name',
        'island_image',
        'user_id',
        'genre',
        'text'
    ];
    
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
    
    use HasFactory;
}
