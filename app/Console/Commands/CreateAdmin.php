<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Admin;
use Illuminate\Support\Facades\Hash;

class CreateAdmin extends Command
{
    protected $name;
    protected $password;
    
    public function fire(){
        $this->line('Hello Nada will Create Command');
    }
    /**
     * The name and signature of the console command.
     *
     * @var string
     */

    protected $signature = 'create:admin {--email=} {--password=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'create new admin';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();

    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {

        
        Admin::create([
            'name' => 'Admin' ,
            'national_id' => 'null',
            'password' => Hash::make($this->option('password')),
            'email' => $this->option('email'),
            'avatar' => 'public/images/12.jpg',
        ]);
    }
}
