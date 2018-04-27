<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            ['guard_name' => 'admin', 'name' => "superadmin",'created_at'=>Carbon::now(),'updated_at'=>Carbon::now()],
            ['guard_name' => 'admin', 'name' => "manager",'created_at'=>Carbon::now(),'updated_at'=>Carbon::now()],
            ['guard_name' => 'admin', 'name' => "receptionist",'created_at'=>Carbon::now(),'updated_at'=>Carbon::now()],
            ]);
            
    }
}
