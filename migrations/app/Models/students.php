<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\course;
use App\Models\grades;

class students extends Model
{
    use HasFactory;
    protected $fillable=[
        'name',
        'email',
        'cid',
        'gid'
    ];
    public function hasgrades(){
        return $this->hasOne(grades::class);
    }
    public function hascourse(){
        return $this->hasOne(course::class);
    }
}
