@extends('layout', ['title' => 'История'])
@section('content')
<div class="container">
    <form method="GET" action="/history">
        <div class="form-outline mb-4">
            <label class="form-label" for="search">Поиск</label>
            <input type="text" id="search" name="search" value="{{ Request::get('search') ?? '' }}" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary w-100 mb-4">Найти</button>
        <div class="form-outline mb-4">
            <label class="form-label" for="search">Сортировка</label>
            <select name="order" class="form-select" onChange="$(this).closest('form').submit()">
                <option value="asc"{{ Request::get('order') && Request::get('order') == 'asc' ? ' selected' : '' }}>По возрастанию</option>
                <option value="desc"{{ Request::get('order') && Request::get('order') == 'desc' ? ' selected' : '' }}>По убыванию</option>
            </select>
        </div>
    </form>
</div>
<div class="container">
    <x-transactions :transactions="$transactions"/>
</div>
@endsection