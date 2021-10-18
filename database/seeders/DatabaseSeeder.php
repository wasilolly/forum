<?php

namespace Database\Seeders;

use App\Models\Channel;
use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
       User::create([
            'name' => 'admin',
            'password' => bcrypt('admin'),
            'email' => 'admin@example.com',
            'admin' => 1,
            'avatar' => asset('avatars/avatar.png')
        ]);

        Channel::factory(10)->create();
    }
}
