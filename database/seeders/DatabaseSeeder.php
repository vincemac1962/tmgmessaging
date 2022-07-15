<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\Listing;
use App\Models\Slide;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //\App\Models\User::factory(5)->create();
        /*Company::truncate();
        User::truncate();
        Listing::truncate();
        Slide::truncate(); */

        $company = Company::factory()->create();

        $user = User::factory()->create([
            /*'name' => 'John Doe',
            'email' => 'john@gmail.com',*/
            'company_id' => $company->id
        ]);


        Slide::factory(6)->create([
            'company_id' => $company->id,
            'user_id' => $user->id
        ]);


    }
}
