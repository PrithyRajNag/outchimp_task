<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users=[
            [
                "name" => 'Prithy RAj Nag',
                "email"=>'prithyrajnag07@gmail.com',
                'password' => '12345'
            ],
        ];
        foreach ($users as $user){
            User::create($user);
        }
    }
}
