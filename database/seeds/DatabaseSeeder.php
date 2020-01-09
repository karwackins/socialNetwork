<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $faker = Faker::create('pl_PL');

        //------------------------------------------------
        $number_of_users = 20;
        $pass = 'pass';
        //------------------------------------------------

        for($i=1; $i <= $number_of_users; $i++)
        {
            if($i === 1)
            {
                DB::table('users')->insert([
                    'name' => 'Damian Karwacki',
                    'email' => 'damian@damian.pl',
                    'sex' => 'm',
                    'password' => Hash::make('damian'),
                ]);
            } else
            {
                $sex = $faker->randomElement(['m', 'f']);

                switch ($sex){
                    case 'm':
                        $name = $faker->firstNameMale.' '.$faker->lastName;
                        $avatar = json_decode(file_get_contents('https://randomuser.me/api/?gender=male'))->results[0]->picture->large;
                        break;

                    case 'f':
                        $name = $faker->firstNameFemale.' '.$faker->lastName;
                        $avatar = json_decode(file_get_contents('https://randomuser.me/api/?gender=female'))->results[0]->picture->large;
                }
                DB::table('users')->insert([
                    'name' => $name,
                    'email' => str_replace('-','',str_slug($name).'@'.$faker->safeEmailDomain),
                    'sex' => $sex,
                    'avatar' => $avatar,
                    'password' => Hash::make($pass),
                ]);
            }



        }

    }
}
