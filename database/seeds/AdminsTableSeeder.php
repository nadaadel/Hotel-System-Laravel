<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert([
            ['email' => 'superadmin1@mail.com', 'name' => "superadmin1",
            'avatar'=>'RBqr9vZQDs0HJC0wGEm9PUFiRMzAJyg8JEFzSf8b.jpeg',
            'password'=>Hash::make('123456'),'created_at'=>Carbon::now(),'updated_at'=>Carbon::now(),
            'national_id'=>'8013025405','created_by'=>null],
            ['email' => 'manager1@mail.com', 'name' => "manager1",
            'avatar'=>'RBqr9vZQDs0HJC0wGEm9PUFiRMzAJyg8JEFzSf8b.jpeg',
            'password'=>Hash::make('123456'),'created_at'=>Carbon::now(),'updated_at'=>Carbon::now(),
            'national_id'=>'7030254f5','created_by'=>1],
            ['email' => 'receptionist1@mail.com', 'name' => "receptionist1",
            'avatar'=>'RBqr9vZQDs0HJC0wGEm9PUFiRMzAJyg8JEFzSf8b.jpeg',
            'password'=>Hash::make('123456'),'created_at'=>Carbon::now(),'updated_at'=>Carbon::now(),
            'national_id'=>'90130fe5405','created_by'=>'2'],

            ]);
    }
}
