<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    protected $fillable = [
        'user_id',
        'shop_id',
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
