<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\View\View;
use App\Models\User;

class HistoryController extends Controller
{
    public function index(Request $request): View
    {
        return view('history', ['transactions' => Auth::user()->listTransactions(false, $request->get('order') ?? 'asc', $request->get('search') ?? '')]);
    }
}
