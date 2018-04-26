<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\User;
use App\Notifications\SendMissYouMail;
use Carbon\Carbon;

class checkLastLogin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'check:last-login';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send miss you mail to clients than not log in month ago';

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
        $now = Carbon::createFromDate(2016, 3, 1);
        $valid_date = $now->subMonth(1);
        $users=User::where('last_logged','<',$valid_date)->get();
        foreach ($users as $user)
        {
                $user->notify(new SendMissYouMail($user));
        }

    }
}
