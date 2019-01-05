<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RightsTableSeeder::class);
        $this->call(RealtyTypesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(StaticContentsTableSeeder::class);
        $this->call(NewsTableSeeder::class);
        $this->call(RealtyObjectsTableSeeder::class);
    }
}
