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
        /*settings*/
        $usersCount = 2;
        $commentsFirstLevelCount = 5;

        /*users*/
        for ($i=1; $i <= $usersCount; $i++) {            
            $objUser = User::create([
                'email' => 'userEmail_' . $i . '@gmail.com',
            ]);

            /*comments*/
            for ($j=1; $j <= $commentsFirstLevelCount; $j++) {
                $comment1 = $objUser->comments()->create([
                    //'parent_id' => null,
                    'user_name' => Str::random(10) . " (" . $objUser->email . ")",
                    'home_page' => Str::random(10) . '@gmail.com',
                    'text' => "$j/1",
                ]);

                $comment11 = $comment1->children()->create([
                    "user_id" => $comment1->user_id,
                    'user_name' => Str::random(10) . " (" . $objUser->email . ")",
                    'home_page' => Str::random(10) . '@gmail.com',
                    'text' => "$j/1/1",
                ]);

                $comment12 = $comment1->children()->create([
                    "user_id" => $comment1->user_id,
                    'user_name' => Str::random(10) . " (" . $objUser->email . ")",
                    'home_page' => Str::random(10) . '@gmail.com',
                    'text' => "$j/1/2",
                ]);

                $comment121 = $comment12->children()->create([
                    "user_id" => $comment12->user_id,
                    'user_name' => Str::random(10) . " (" . $objUser->email . ")",
                    'home_page' => Str::random(10) . '@gmail.com',
                    'text' => "$j/1/2/1",
                ]);
            }
        }
    }
}
