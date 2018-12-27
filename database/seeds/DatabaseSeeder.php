<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Right;
use App\RealtyType;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        DB::transaction(function () {
            // Make users
            $admin = new User();
            $admin->name = 'Максим Петров';
            $admin->password = Hash::make('qwerty');
            $admin->email = 'example@yandex.ru';
            $admin->save();

            $user1 = new User();
            $user1->name = 'Анатолий Шилов';
            $user1->password = Hash::make('user1');
            $user1->email = 'user1@gmail.com';
            $user1->save();

            $user2 = new User();
            $user2->name = 'Александр Прибытков';
            $user2->password = Hash::make('user2');
            $user2->email = 'user2@gmail.com';
            $user2->save();

            $user3 = new User();
            $user3->name = 'Мария Качусова';
            $user3->password = Hash::make('user3');
            $user3->email = 'user3@gmail.com';
            $user3->save();

            //
        });
    }
}
