<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable=[
        'title',
        'description',
        'price',
        'cat_id',
        'image',

    ];
    public function catagories(){
        return $this->belongsTo(Category::class);
    }

}
