<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class yarane extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'linda:ok';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // $transactions = User::get();
        // foreach ($transactions as $transaction) {
        //     $name = $transaction->name;
        //     $this->info('name')
            
        // }
        // $users=User::all();
        // foreach ($users as $user) {
        // $user->name;
        // }
        // $this->info('done');
        $users=User::all()->pluck('name');
        $this->info($users);
        $this->info('done');

        
    }
    
}
