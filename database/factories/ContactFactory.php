<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Company as Company;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Contact>
 */
class ContactFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $theCompany = Company::all()->random() ; 
        return [
            //
            'first_name' => $this->faker->firstName(),
            'last_name' => $this->faker->lastName(),
            'email' => $this->faker->email(),
            'address' => $this->faker->address(),
            'phone' => $this->faker->phoneNumber(),
            //  user_id ?????
            'user_id' => $theCompany->user_id  , 
            'company_id' => $theCompany->id,
            // We Commented this Because we will generate the Company_id using the RELATIONAL factory !! [ If we could describe it like that ]
            'created_at' => now(),
            'updated_at' => now()

        ];
    }
}
