<?php

namespace Database\Seeders;
use App\Models\Contact as Contact;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
class ContactsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('contacts')->truncate();
        // $contacts = [];
        // $faker = Faker::create();
        // foreach (range(1, 10) as $index) {
        //     $contacts[] = [
        //         'first_name' => $faker->name(),
        //         'last_name' => $faker->name(),
        //         'email' => $faker->email(),
        //         'address' => $faker->address(),
        //         'phone' => $faker->phoneNumber(),
        //         'company_id' => $faker->numberBetween(1, 10),
        //         'created_at' => now(),
        //         'updated_at' => now()
        //     ];
        // }
        // DB::table('contacts')->insert($contacts);

            // Contact::factory(10)->create();
    }
}
