<?php

namespace App\Models;
use App\Models\students;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class grades extends Model
{
    use HasFactory;
    protected $fillable=[
        'grades'
    ];
}
