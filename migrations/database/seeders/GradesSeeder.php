<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\students;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class GradesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
            DB::table('grades')->insert([
                'grades' => Str::random(1),
                'created_at'=>now(),
                'updated_at'=>now()
            ]);
            
    }
}

