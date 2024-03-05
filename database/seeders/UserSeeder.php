<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
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
                'id' => 1,
                'name' => 'Moana',
                'email' => 'moana@example.com',
                'password' => '$2y$10$9Alxvq6B4HwfvpdZz6bsMusB4t8ACV4sXCFWKhYw89eFtyV3Qf7Eq', // Same password hash
            ],
            [
                'id' => 2,
                'name' => 'Raya',
                'email' => 'raya@example.com',
                'password' => '$2y$10$9Alxvq6B4HwfvpdZz6bsMusB4t8ACV4sXCFWKhYw89eFtyV3Qf7Eq', // Same password hash
            ],
            [
                'id' => 3,
                'name' => 'Vanellope',
                'email' => 'wanda@example.com',
                'password' => '$2y$10$9Alxvq6B4HwfvpdZz6bsMusB4t8ACV4sXCFWKhYw89eFtyV3Qf7Eq', // Same password hash
            ],
            [
                'id' => 4,
                'name' => 'Ralph',
                'email' => 'ralpha@example.com',
                'password' => '$2y$10$9Alxvq6B4HwfvpdZz6bsMusB4t8ACV4sXCFWKhYw89eFtyV3Qf7Eq', // Same password hash
            ],
            [
                'id' => 5,
                'name' => 'Tanjiro',
                'email' => 'tanjiro@example.com',
                'password' => '$2y$10$9Alxvq6B4HwfvpdZz6bsMusB4t8ACV4sXCFWKhYw89eFtyV3Qf7Eq', // Same password hash
            ],
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
