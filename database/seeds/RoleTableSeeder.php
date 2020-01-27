<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'name' => 'Administrator',
            'created_at' => Carbon::now()
        ]);
        DB::table('roles')->insert([
            'name' => 'Professor',
            'created_at' => Carbon::now()
        ]);
        DB::table('roles')->insert([
            'name' => 'Parent',
            'created_at' => Carbon::now()
        ]);
    }
}
