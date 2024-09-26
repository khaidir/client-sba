<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roleAdmin = Role::updateOrCreate(
            ['name'=> 'admin'],
            ['name'=> 'admin']
        );

        $roleUser = Role::updateOrCreate(
            ['name'=> 'user'],
            ['name'=> 'user']
        );

        $user = User::updateOrCreate([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('udahlupa'),
        ]);

        $user->markEmailAsVerified();
        $user->assignRole('admin');

    }
}
