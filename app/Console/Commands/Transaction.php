<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Jobs\AddTransaction;
use Throwable;

class Transaction extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:transaction {type} {login} {amount} {desc?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Credit/debit transaction {debit/credit} {login} {amount} {desc?}';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(): int
    {   
        try{
            AddTransaction::dispatch($this->argument('type'), $this->argument('login'), $this->argument('amount'), $this->argument('desc') ?? '');
            $this->info('Job sended to queue');
            return Command::SUCCESS;
        } catch (Throwable $e){
            $this->error($e->getMessage());
            return Command::SUCCESS;
        }
    }
}
