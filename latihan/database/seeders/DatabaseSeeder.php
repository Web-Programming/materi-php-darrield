<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use DB;
use Hash;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
     
        //menggunakan query builder
        // DB::table("users")->insert([
        //     'name' => 'rachmat2',
        //     'email' => 'rachmat2@gmail.com',
        //     'password' => Hash::make("password")
        // ]);

        DB::table("users")
            ->where("id", 1)
            ->update([
                'password' => Hash::make("123456")
            ]);

        //DB::table("users")->where("id", ">", 1)->delete();    
    }
}
