<?php

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
        DB::table('users')->insert([
            'name' => 'Alexandre KACZOR',
            'email' => 'kaczoralexandre@gmail.com',
            'password' => bcrypt('my_blog_pass'),
            'photo' => 'photo_alex_kaczor.png',
            'is_admin' => true
        ]);

        DB::table('categories')->insert(['name' => 'High Tech']);
        DB::table('categories')->insert(['name' => 'Smartphone']);
        DB::table('categories')->insert(['name' => 'Desktop']);
    }
}
