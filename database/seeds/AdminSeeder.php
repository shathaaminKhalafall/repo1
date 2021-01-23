<?php

use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = new \App\Models\Admin;
        $admin->name = 'Administrator';
        $admin->email = 'admin@admin.com';
        $admin->email = 'admin@admin.com';
        $admin->phone = '+950 999999999';
        $admin->address = 'Admin address';
        $admin->is_active = 1;
        $admin->password = bcrypt('123456');
        $admin->save();
    }
}
