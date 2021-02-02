<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'name' , 'desc' , 'image','category_id'
    ];

    public function Category()
    {
        return $this->belongsTo('App\Models\Category');
    }
}
