<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        $users = [
            [
                'name' => 'dono',
                'email' => 'dono@gmail.com',
                'password' => Hash::make('password'),
                'roles' => [
                    'Dono'
                ]
            ],
            [
                'name' => 'funcionario',
                'email' => 'funcionario@gmail.com',
                'password' => Hash::make('password'),
                'roles' => [
                    'Funcionario'
                ]
            ],
            // Add more users as needed
        ];

        foreach ($users as $userToCreate) {
            $user = User::firstOrCreate([
                'email' => $userToCreate['email']
            ], [
                'name' => $userToCreate['name'],
                'email' => $userToCreate['email'],
                'password' => $userToCreate['password'],
               
            ]);

            $user->syncRoles($userToCreate['roles']);
        }
    }
}