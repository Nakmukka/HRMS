<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
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
        //
        User::create([
            'username' => 'admin',
            'password' => Hash::make('admin123'), // Hash the password
            'role' => 'admin',
        ]);

        User::create([
            'username' => 'employee1',
            'password' => Hash::make('password1'),
            'role' => 'employee',
        ]);

        User::create([
            'username' => 'employee2',
            'password' => Hash::make('password2'),
            'role' => 'employee',
        ]);
    }
}
