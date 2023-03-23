@extends('layout', ['title' => 'Главная'])
@section('content')
<div class="container">
    <h3>Текущий баланс: {{ Auth::user()->balance->balance }}</h3>
    <div id="trans" data="{{ config('transactions.interval') }}">
        <x-transactions :transactions="Auth::user()->listTransactions()"/>
    </div>
</div>
@endsection