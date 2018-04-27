<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class RoomsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('rooms')->insert([
        ['number' => '1234', 'price' => 350,'capacity'=>3,'admin_id'=>1,'floor_id'=>1,
        'created_at'=>Carbon::now(),'updated_at'=>Carbon::now()],
        ['number' => '4545', 'price' => 95,'capacity'=>4,'admin_id'=>3,'floor_id'=>1
        ,'created_at'=>Carbon::now(),'updated_at'=>Carbon::now()],
        ['number' => '6565', 'price' => 800,'capacity'=>3,'admin_id'=>1,'floor_id'=>3
        ,'created_at'=>Carbon::now(),'updated_at'=>Carbon::now()],
        ['number' => '5264', 'price' => 350,'capacity'=>5,'admin_id'=>2,'floor_id'=>2
        ,'created_at'=>Carbon::now(),'updated_at'=>Carbon::now()],
        ]);
        
    }
}