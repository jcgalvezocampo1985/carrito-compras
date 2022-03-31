<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

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
            'name' => 'Juan Carlos',
            'email' => 'jcgalvezocampo@gmail.com',
            'password' => bcrypt('123'),
            'role_id' => 1
        ]);

        User::create([
            'name' => 'Cliente',
            'email' => 'cliente@gmail.com',
            'password' => bcrypt('123'),
            'role_id' => 2
        ]);
    }
}
