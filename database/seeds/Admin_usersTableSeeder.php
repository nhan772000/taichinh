<?php

use Illuminate\Database\Seeder;

class Admin_usersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(
            [
                'user_email' => 'admin@gmail.com',
                'user_username' => 'admin',
                'password' => bcrypt('admin@123'),
                'user_password_pay' => md5('admin@123'),
                'user_name' => 'admin',
                'user_phone' => '0342909557',
                'user_introduction' => '0'
            ]
        );
    }
}
