<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MstPrefecture extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function videos()
    {
        return $this->hasMany(video::class, 'prefecture_id', 'id');
    }

    public function orders()
    {
        return $this->hasMany(video::class, 'prefecture_id', 'id');
    }
}
