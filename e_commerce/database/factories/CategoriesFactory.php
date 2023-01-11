<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\categories>
 */
class categoriesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $name=fake()->sentence();
        $slug=Str::slug($name,'-');
        return [
            'cname' => $name,
            'slug' => $slug,
            'description' => Str::random(50)
        ];
    }
}
