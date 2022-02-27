<?php

use Illuminate\Database\Seeder;

use App\Admin;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        if (Admin::count() > 0) {
            return;
        }

        $admin = \App\Admin::create([
            'name'     => 'SonelfTheKing',
            'email'    => 'admin@edusec.biz',
            'password' => Hash::make('password'),
            'super_admin' => true
        ]);
    }
}
