<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
//        DB::table('users')->insert([
//            'fullname' => 'dat',
//            'email' => 'datnt1112@gmail.com',
//            'password' => Hash::make('123456'),
//        ]);
        $this -> call([
            UserSeeder::class
        ]);
    }
}
