<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Str;
use Illuminate\Support\integer;
use Illuminate\Support\Facades\DB;
use App\Models\students;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Students>
 */
class StudentsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
                'name'=>Str::random(20),
                'email'=>Str::random(15).'@gmail.com',
                'cid'=>rand(1, 4),
                'gid'=>rand(1, 4)
        ];
    }
}
