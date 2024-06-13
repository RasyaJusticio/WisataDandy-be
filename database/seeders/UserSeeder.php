<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $seeds = $this->get_seed();

        foreach ($seeds as $seed) {
            $seed["password"] = bcrypt($seed['password']);

            User::create($seed);
        }
    }

    public function get_seed()
    {
        return [
            [
                'name' => 'Rasya Justicio',
                'email' => 'rasyajusticio@gmail.com',
                'password' => 'rasya123'
            ],
            [
                'name' => 'Ocktara Dandy',
                'email' => 'ocktaradandy@gmail.com',
                'password' => 'dandy123'
            ],
        ];
    }
}
