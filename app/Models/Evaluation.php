<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evaluation extends Model
{
    protected $fillable = [
        'user_id',
        'shop_id',
        'comment',
        'score',
    ];

    public function shops()
    {
        return $this->belongsTo('App\Models\Shop');
    }

    public function users()
    {
        return $this->belongsTo('App\Models\User');
    }
}
