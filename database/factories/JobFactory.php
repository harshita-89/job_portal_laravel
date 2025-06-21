<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Job>
 */
class JobFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->jobTitle,
            'user_id' => rand(1,5),
            'job_type_id' => rand(1, 5),
            'category_id' => rand(1, 5),
            'vacancy' => rand(1, 10),
            'salary' => $this->faker->numberBetween(30000, 100000),
            'location' => $this->faker->city,
            'description' => $this->faker->paragraph,
            'benefits' => $this->faker->sentence,
            'responsibility' => $this->faker->sentence,
            'qualifications' => $this->faker->sentence,
            'experience' => rand(0, 10),
            'keyword' => implode(', ', $this->faker->words(3)),
            'company_name' => $this->faker->company,
            'company_location' => $this->faker->address,
            'company_website' => $this->faker->url,
        ];
    }
}
