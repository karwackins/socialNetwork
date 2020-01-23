<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Hash;
use App\Friend;

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
        $number_of_posts = 20;
        $number_of_comments = 5;
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

            for ($user_id = 1; $user_id <= $faker->numberBetween($min = 0, $max = $number_of_users - 1); $user_id++) {

                $friend_id = $faker->numberBetween($min = 0, $max = $number_of_users);

                $friendship = Friend::where(function ($query) use( $user_id, $friend_id) {
                    $query->where('user_id', $friend_id);
                    $query->where('friend_id', $user_id);
                })->orWhere(function ($query) use( $user_id, $friend_id){
                    $query->where('user_id', $user_id);
                    $query->where('friend_id', $friend_id);
                })->exists();

                if(!$friendship)
                {
                    DB::table('friends')->insert([
                       'user_id' => $user_id,
                       'friend_id' => $friend_id,
                       'accept' => $faker->numberBetween(0,1),
                       'created_at' => $faker->dateTimeThisYear(now())
                    ]);
                }
            }

            for($post=1; $post<=$number_of_posts; $post++)
            {
                DB::table('posts')->insert([
                    'content' => $faker->paragraph(2,true),
                    'user_id' => $faker->numberBetween(1, $number_of_users),
                    'created_at' => $faker->dateTime(now())
                ]);
            }

            for($comment=1; $comment<=$number_of_comments; $comment++)
            {
                DB::table('comments')->insert([
                    'content' => $faker->paragraph(2,true),
                    'user_id' => $faker->numberBetween(1, $number_of_users),
                    'post_id' => $faker->numberBetween(1, $number_of_posts),
                    'created_at' => $faker->dateTime(now())
                ]);
            }



        }

    }
}
