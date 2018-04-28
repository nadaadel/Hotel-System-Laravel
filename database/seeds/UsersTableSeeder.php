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
            ['email' => 'client1@mail.com', 'name' => "client1",
            'avatar'=>'default.png','registered_by'=>'1',
            'password'=>Hash::make('123456'),'created_at'=>Carbon::now(),'updated_at'=>Carbon::now(),
            'phone'=>'013025405','country'=>'Egypt','gender'=>'female'],
            ['email' => 'client2@mail.com', 'name' => "client1",
            'avatar'=>'default.png','registered_by'=>'2',
            'password'=>Hash::make('123456'),'created_at'=>Carbon::now(),'updated_at'=>Carbon::now(),
            'phone'=>'0g30254f5','country'=>'Kuwait','gender'=>'female'],
            ['email' => 'client3@mail.com', 'name' => "client3",
            'avatar'=>'default.png','registered_by'=>'3',
            'password'=>Hash::make('123456'),'created_at'=>Carbon::now(),'updated_at'=>Carbon::now(),
            'phone'=>'0130fe5405','country'=>'Canda','gender'=>'male'],

            ]);
    }
}
