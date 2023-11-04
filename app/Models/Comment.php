<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $table = 'comments';
    
    protected $fillable = [
        'user_id',
        'photo_id',
        'comment',
        ];
    
    public static $rules = array(
        'comment' => 'required|max:255',
    );
        
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
    
    public function photo()
    {
        return $this->belongsTo('App\Models\Photo');
    }
}
