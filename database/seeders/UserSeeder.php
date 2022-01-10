<?php

namespace Database\Seeders;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        \App\Models\User::create([
            "name" => "Hello Clafiya",
            "password" => Hash::make('password'), //password
            "email" => "hello@clafiya.com",
            "phone_number" => "08031234567"
        ]);
    }
}
