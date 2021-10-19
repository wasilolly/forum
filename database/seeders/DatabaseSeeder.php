<?php

namespace Database\Seeders;

use App\Models\Channel;
use App\Models\Discussion;
use App\Models\Reply;
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
       $user1= User::create([
            'name' => 'admin',
            'password' => bcrypt('admin'),
            'email' => 'admin@example.com',
            'admin' => 1,
            'avatar' => asset('avatars/avatar.png')
        ]);

        Channel::factory(10)->create();

        $user2 = User::create([
            'name' => 'Jane Doe',
            'password' => bcrypt('user'),
            'email' => 'janedoe@example.com',
            'admin' => 0,
            'avatar' => asset('avatars/avatar.png')
        ]);

    
    }
}
