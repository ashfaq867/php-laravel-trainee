<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\students;

class course extends Model
{
    use HasFactory;
    protected $fillable=[
        'cname'
    ];
    public function stdcourse(){
        return $this->belongto(students::class);
    }
}