<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Str;

class UsersCommentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //settings
        $usersCount = 200;
        $commentsTopLevelCount = 5;

        //properties
        $emailSerial = 'bb';

        //create users
        for ($i=1; $i <= $usersCount; $i++) {
            $objUser = User::create([
                'email' => $emailSerial . '@example.com',
            ]);
            $emailSerial++;

            //create comments
            for ($j=1; $j <= $commentsTopLevelCount; $j++) {

                //top-level
                $comment1 = $objUser->comments()->create([
                    //'parent_id' => null,
                    'user_name' => Str::random(5),
                    'home_page' => Str::random(5) . '.example.com',
                    'text' => "Top-level test message",
                ]);
                sleep(1);

                //sub-level
                $comment11 = $comment1->children()->create([
                    "user_id" => $comment1->user_id,
                    'user_name' => Str::random(5),
                    'home_page' => Str::random(5) . '.example.com',
                    'text' => "Sub-level test message",
                ]);
                sleep(1);
                $comment12 = $comment1->children()->create([
                    "user_id" => $comment1->user_id,
                    'user_name' => Str::random(5),
                    'home_page' => Str::random(5) . '.example.com',
                    'text' => "Sub-level test message",
                ]);
                sleep(1);

                //sub-sub-level
                $comment121 = $comment12->children()->create([
                    "user_id" => $comment12->user_id,
                    'user_name' => Str::random(5),
                    'home_page' => Str::random(5) . '.example.com',
                    'text' => "Sub-sub-level test message",
                ]);
                sleep(1);
            }
        }
    }
}
