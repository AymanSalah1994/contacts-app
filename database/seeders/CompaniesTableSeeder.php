<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\Contact ; 
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use PhpParser\Node\Expr\AssignOp\Concat;

class CompaniesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return  void
     */
    public function run()
    {
        // DB::table('companies')->delete();
        // DB::table('companies')->truncate();
        // There is a Difference between truncate and delete specially 
        // when you have foreign key constraints.
        // $companies = [];
        // $faker = Faker::create();
        // foreach (range(1, 10) as $index) {
        //     $companies[] = [
        //         'name' => $faker->company,
        //         'email' => $faker->email,
        //         'address' => $faker->address,
        //         'website' => $faker->domainName,
        //         'created_at' => now(),
        //         'updated_at' => now()
        //     ];
        // }
        // DB::table('companies')->insert($companies);
        // Below 2 Stupid Lines By the ASisan 
        // User::factory(5)->create();
        // Company::factory(5)->hasContacts(5)->create();

            User::factory(5)->hasCompanies(3)->create() ; 
            Contact::factory(30)->create() ; 
    }
}
//  BELOW IS WORKING BUT COMMENTED AS A SPARE 
// Company::factory(5)->hasContacts(5)->create();
// 