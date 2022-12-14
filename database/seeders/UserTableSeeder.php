<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                "name" => "Admin",
                "email" => "admin@admin.com",
                "password" => \Hash::make("password"),
                "role" => "admin"
            ],
            [
                "name" => "Manager",
                "email" => "manager@manager.com",
                "password" => \Hash::make("password"),
                "role" => "manager"
            ],
            [
                "name" => "Staff",
                "email" => "staff@staff.com",
                "password" => \Hash::make("password"),
                "role" => "staff"
            ]
        ];
        User::insert($users);
    }
}
