<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

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
    
    public function likes()
    {
        return $this->hasMany('App\Models\Like');
    }
    
    // public function likes()
    // {
    //     return $this->belongsToMany('App\Models\User','likes','photo_id','user_id')->withTimestamps();
    // }
    
    
    public function is_liked_by_auth_user()
    {
        $user = Auth::user();

        if (!$user) {
            return false;
        }
        
        return $this->likes->contains('user_id', $user->id);
    }
}
