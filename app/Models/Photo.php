<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    use HasFactory;
    protected $table = 'photos';
    
    protected $fillable = [
        'island_name',
        'island_image',
        'user_id',
        'genre',
        'text'
    ];
    
    public static $rules = array(
        'text' => 'required|max:255',
        'img'=>'required'
    );
    
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
    
    public function comments()
    {
        return $this->hasMany('App\Models\Comment');
    }
}
