<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Books extends Model
{


    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function books()
{
    return $this->hasMany(Books::class, 'category_id');
}
}
