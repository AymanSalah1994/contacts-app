<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Company>
 */
class CompanyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->company(),
            'email' => $this->faker->email(),
            'address' => $this->faker->address(),
            'website' => $this->faker->domainName(),
            'created_at' => now(),
            'updated_at' => now() , 
            'user_id' => User::pluck('id')->random()
        ];
    }
}
