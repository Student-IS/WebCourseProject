<?php

use Illuminate\Database\Seeder;
use App\Right;

class RightsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $basic = new Right();
        $basic->name = 'basic';
        $basic->save();

        $viewBookings = new Right();
        $viewBookings->name = 'view_bookings';
        $viewBookings->save();

        $edit = new Right();
        $edit->name = 'edit_content';
        $edit->save();

        $admin = new Right();
        $admin->name = 'add_admins';
        $admin->save();
    }
}
