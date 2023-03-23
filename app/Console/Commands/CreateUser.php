<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\UserBalance;
use Illuminate\Support\Facades\Hash;
use Throwable;

class CreateUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:create {login} {password}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create user with {login} and {password}';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(): int
    {   
        try{
            DB::transaction(function() {
                $user = new User();
                $user->login = $this->argument('login');
                $user->password = Hash::make($this->argument('password')); 
                $user->save();
                $balance = new UserBalance();
                $balance->user_id = $user->id;
                $balance->save();
            });
            $this->info('User created');
            return Command::SUCCESS;
        } catch (\Throwable $e) {
            $this->error($e->getMessage());
            return Command::FAILURE;
        }
        
    }
}
