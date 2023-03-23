<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Relations\HasOne;
use App\Models\BalanceTransactions;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Support\Collection;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'login',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];


    /**
     * Current user balance
     *
     * @return HasOne
     */
    public function balance(): HasOne
    {
        return $this->hasOne(UserBalance::class, 'user_id', 'id');
    }


    /**
     * Current user transactions
     */
    public function transactions(): HasManyThrough
    {
        return $this->hasManyThrough(BalanceTransactions::class, UserBalance::class, 'user_id', 'balance_id');
    }

        /**
     * Current user transactions
     */
    public function listTransactions(int|false $limit = 5, string $order = 'desc', string $search = ''): Collection
    {   
        $collection = $this->transactions()->orderBy('date', $order);

        if ($search) {

            $collection->where('description', 'LIKE', '%'.$search.'%');

        }

        if ($limit !== false) {
            $collection->take($limit);
        }

        return $collection->get();
    }

}
