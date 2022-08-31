<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\builder;

class Video extends Model
{
    use HasFactory;

    protected $fillable = [
        'movie',
        'title',
        'description',
        'genre_id',
        'prefecture_id',
        'price',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function orders()
    {
        return $this->hasMany('App\Models\Order');
    }
    
    /**
     * 投稿の都道府県の取得(MstPrefectureモデルとのリレーション)
     */
    public function prefecture()
    {
        return $this->belongsTo(MstPrefecture::class);
    }

    public function genre()
    {
        return $this->belongsTo(MstGenre::class);
    }
}
