<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CreateUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = [
            [
               'name'=>'Admin',
               'email'=>'admin@ebizz.com',
                'user_type'=>'1',
               'password'=> bcrypt('admin@ebizz.com'),
            ]
        ];
  
        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}