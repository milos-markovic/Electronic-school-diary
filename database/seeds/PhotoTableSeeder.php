<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class PhotoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('photos')->insert([
            'name' => 'Milos.jpg',
            'created_at' => Carbon::now()
        ]);
        DB::table('photos')->insert([
            'name' => 'Branka.jpg',
            'created_at' => Carbon::now()
        ]);
        DB::table('photos')->insert([
            'name' => 'Dusica.jpg',
            'created_at' => Carbon::now()
        ]);
    }
}
