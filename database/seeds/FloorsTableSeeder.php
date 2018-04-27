<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class FloorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('floors')->insert([
            ['number' => '1234', 'name' => "hola",'admin_id'=>1,
            'created_at'=>Carbon::now(),'updated_at'=>Carbon::now()],
            ['number' => '9423', 'name' => "floor2",'admin_id'=>2,
            'created_at'=>Carbon::now(),'updated_at'=>Carbon::now()],
            ['number' => '6548', 'name' => "superadmin",'admin_id'=>1,
            'created_at'=>Carbon::now(),'updated_at'=>Carbon::now()],
            ]);
            
    }
}
