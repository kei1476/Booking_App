<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    protected $fillable = [
        'name',
        'genre_id',
        'area_id',
        'about',
        'path'
    ];

    public function books()
    {
        return $this->hasMany('App\Models\Book');
    }

    public function likes()
    {
        return $this->hasMany('App\Models\Like');
    }

    public function evaluations()
    {
        return $this->hasMany('App\Models\Evaluation');
    }

    public function genres()
    {
        return $this->belongsTo('App\Models\Genre');
    }

    public function areas()
    {
        return $this->belongsTo('App\Models\Area');
    }

    public function managers()
    {
        return $this->hasOne('App\Models\ShopManager');
    }

    public function courses()
    {
        return $this->hasMany('App\Models\Course');
    }
}
