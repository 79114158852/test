@extends('layout', ['title' => 'История'])
@section('content')
<div class="container">
    <x-transactions :transactions="Auth::user()->lastTransactions()"/>
</div>
@endsection