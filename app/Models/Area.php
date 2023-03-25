<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    protected $table = 'areas';

    protected $fillable =[
        'area_name'
    ];

    public $timestamps = false;

    public function shops()
    {
        return $this->hasMany('App\Models\Shop');
    }
}
