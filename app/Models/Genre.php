<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    protected $table = 'genres';

    protected $fillable =[
        'genre_name'
    ];

    public $timestamps = false;

    public function shops()
    {
        return $this->hasMany('App\Models\Shop');
    }
}
