<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Duy Khoa',
            'email' => 'duykhoa@gmail.com',
            'password' => bcrypt('123456'),
            'remember_token' => str_random(10),
        ]);
        factory(User::class, 50)->create();
    }
}
