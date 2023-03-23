<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\User;
use App\Models\BalanceTransactions;
use Illuminate\Support\Str;

class AddTransaction implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected string $type;
    protected string $login;
    protected float $amount;
    protected string $desc;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(string $type, string $login, float $amount, string $desc = '')
    {
        $this->type = $type;
        $this->login = $login;
        $this->amount = $amount;
        $this->desc = $desc;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        try{
            $transaction = new BalanceTransactions();
            $transaction->description = (string)$this->desc ?? '';
            if ($this->type == 'debit'){
                $this->amount = $this->amount * -1;
            } 
            $transaction->amount = $this->amount;
            $transaction->uuid = Str::orderedUuid();
            $user = User::where('login','=',$this->login)->first();
            $transaction->balance_id = $user->balance->id;
            $transaction->save();
            $user->balance->balance += $this->amount;
            $user->balance->save();
            return 1;
        }catch (\Throwable $e) {
            return -1;
        }
    }
}
