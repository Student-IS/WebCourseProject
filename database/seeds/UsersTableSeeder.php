<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
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
        $admin = new User();
        $admin->name = 'Максим Петров';
        $admin->password = Hash::make('qwerty');
        $admin->email = 'qwerty@yandex.ru';
        $admin->email_verified_at = now();
        $admin->remember_token = str_random(10);
        $admin->save();
        $admin->rights()->attach(1);
        $admin->rights()->attach(2);
        $admin->rights()->attach(3);
        $admin->rights()->attach(4);

        $user1 = new User();
        $user1->name = 'Анатолий Шилов';
        $user1->password = Hash::make('user1');
        $user1->email = 'user1@gmail.com';
        $user1->email_verified_at = now();
        $user1->remember_token = str_random(10);
        $user1->save();
        $user1->rights()->attach(1);
        $user1->rights()->attach(2);
        $user1->rights()->attach(3);

        $user2 = new User();
        $user2->name = 'Александр Прибытков';
        $user2->password = Hash::make('user2');
        $user2->email = 'user2@mail.ru';
        $user2->email_verified_at = now();
        $user2->remember_token = str_random(10);
        $user2->save();
        $user2->rights()->attach(1);
        $user2->rights()->attach(2);

        $user3 = new User();
        $user3->name = 'Мария Качусова';
        $user3->password = Hash::make('user3');
        $user3->email = 'user3@gmail.com';
        $user3->email_verified_at = now();
        $user3->remember_token = str_random(10);
        $user3->save();
        $user3->rights()->attach(1);
        $user3->rights()->attach(2);

        factory(User::class, 30)->create()->each(function ($user) {
            $user->rights()->attach(1);
        }) ;
    }
}
