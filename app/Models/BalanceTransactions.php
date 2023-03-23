<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;

class BalanceTransactions extends Model
{
    use HasFactory;

    protected $table = 'balance_transactions';

    public $timestamps = false;


    /**
     * Get last $limit transactions of current user with builder for example
     *
     * @param integer $limit
     * @return void
     */
    public static function getTransactions(int $limit = 5): Collection
    {   
        return DB::table('balance_transactions as bt')
        ->select(['bt.uuid', 'bt.date', 'bt.value', 'bt.description'])
        ->join('user_balance as ub', 'bt.balance_id', '=', 'ub.id')
        ->join('users as u', 'ub.id', '=', 'u.id')
        ->where('u.id', Auth::user()?->id ?? 0)
        ->latest('bt.date')
        ->take($limit)
        ->get();
    }


}
