<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Response;

class MainController extends Controller
{
    public function index() :View
    {
        return view('main');
    }


    /**
     * Refresh transactions info
     *
     * @return void
     */
    public function refresh(): Response
    {   
        return new Response(view('components.transactions', ['transactions' => Auth::user()->lastTransactions()])->render());
    }
}
