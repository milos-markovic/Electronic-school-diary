<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;


class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'first_name' => 'Miloš',
            'last_name' => 'Marković',
            'email' => 'milos@gmail.com',
            'password' => bcrypt(1),
            'created_at' => Carbon::now(),
            'role_id' => 1,
            'photo_id' => 1
        ]);
        DB::table('users')->insert([
            'first_name' => 'Nataša',
            'last_name' => 'Savić',
            'email' => 'natasa@gmail.com',
            'password' => bcrypt(1),
            'created_at' => Carbon::now(),
            'role_id' => 2,
            'photo_id' => 2
        ]);
        DB::table('users')->insert([
            'first_name' => 'Olivera',
            'last_name' => 'Marković',
            'email' => 'olivera@gmail.com',
            'password' => bcrypt(1),
            'created_at' => Carbon::now(),
            'role_id' => 3,
            'photo_id' => 3
        ]);
    }
}
