<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = [
        'shop_id',
        'course_name',
        'price',
    ];

    public function shops()
    {
        return $this->belongsTo('App\Models\Shop');
    }
}
