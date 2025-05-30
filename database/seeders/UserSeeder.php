<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\User;
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
        User::create([
            'name'=>'Admin',
            'email'=>'adilsonsousaas82@gmail.com',
            'email_verified_at'=> now(),
            'password'=> Hash::make(12345678),// password
            'remember_token'=> Str::random(10),
        ]);
    }
}
