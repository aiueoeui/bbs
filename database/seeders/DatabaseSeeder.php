<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call(UserSeeder::class);
        // $this->call(ExerciseSeeder::class);
        $this->call(PostSeeder::class);
    }
}

class UserSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
    \DB::table('users')->insert([
        [
            'user_division' => '1',
            'name' => 'admin',
            'age' => '30',
            'grade' => '5',
            'class' => '1',
            'number' => '0',
            'email' => 'admin@example.com',
            'email_verified_at' => now(),
            'password' => \Hash::make('admin'),
            'user_division' => true,
            'created_at' => now(),
            'updated_at' => now()
        ],[
            'name' => '児童1',
            'age' => '10',
            'grade' => '2',
            'class' => '1',
            'number' => '1',
            'email' => 'test@example.com',
            'email_verified_at' => now(),
            'password' => \Hash::make('test'),
            'user_division' => false,
            'created_at' => now(),
            'updated_at' => now()
        ],[
            'name' => '児童2',
            'age' => '10',
            'grade' => '4',
            'class' => '1',
            'number' => '1',
            'email' => 'test2@example.com',
            'email_verified_at' => now(),
            'password' => \Hash::make('test'),
            'user_division' => false,
            'created_at' => now(),
            'updated_at' => now()
        ]
    ]);

    }
}

class ExerciseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
    \DB::table('exercises')->insert([
        [
            'exrcise_name' => 'squat',
        ],
        [
            'exrcise_name' => 'stepup',
        ],
    ]);

    }
}

class PostSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
    \DB::table('posts')->insert([
        [
            'user_id' => '2',
            // 'exercise_id' => '1',
            'name' => '児童1',
            'exercise_name' => 'squat',
            'count' => '30',
            'created_at' => now(),
        ],
        [
            'user_id' => '2',
            // 'exercise_id' => '1',
            'name' => '児童1',
            'exercise_name' => 'squat',
            'count' => '30',
            'created_at' => now(),
        ],
    ]);

    }
}
