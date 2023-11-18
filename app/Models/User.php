<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'profile_img'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    public function photos()
    {
        return $this->hasMany('App\Models\Photo');
    }
    
    public function comments()
    
    {
        return $this->hasMany('App\Models\Comment');
    }
    
    public function likes()
    {
        return $this->belongsToMany('App\Models\Photo','likes','user_id','photo_id')->withTimestamps();
    }
    
    ////この投稿に対して既にlikeしたかどうかを判別する
    public function isLike($photo_id)
    {
        return $this->likes()->where('photo_id',$photo_id)->exists();
    }
    
    //isLikeを使って、既にlikeしたか確認したあと、いいねする（重複させない）
    public function like($photo_id)
    {
        if(!$this->isLike($photo_id)){
            //もし既にいいねしていたら何もしない
        }else{
            $this->likes()->attach($photo_id);
        }
    }
    
    //isLikeを使って、既にlikeしたか確認して、もししていたら解除する
    public function unlike($photo_id)
    {
        if($this->isLike($photo_id)){
            //もし既に「いいね」していたら消す
            $this->likes()->detach($photo_id);
        }
    }
}
