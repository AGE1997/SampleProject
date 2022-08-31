<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\builder;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'prefecture_id',
        'user_id',
        'video_id',
    ];


    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function video()
    {
        return $this->belongsTo('App\Models\Video');
    }

    public function prefecture()
    {
        return $this->belongsTo(MstPrefecture::class);
    }
}
