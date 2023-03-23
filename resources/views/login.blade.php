@extends('layout', ['title' => 'Авторизация'])
@section('content')
<div class="container d-flex justify-content-center">
    <form method="POST" action="{{ route('login_check') }}">
        @csrf
        <div class="form-outline mb-4">
            <label class="form-label" for="login">Логин</label>
            <input type="text" id="login" name="login" class="form-control" required/>
        </div>
        <div class="form-outline mb-4">
            <label class="form-label" for="password">Пароль</label>
            <input type="password" id="passwrod" name="password" class="form-control" required/>
        </div>
        <div class="row mb-4">
            <div class="col d-flex justify-content-center">
            <div class="form-check">
                <input class="form-check-input" name="remember"type="checkbox" value="" id="remember" checked />
                <label class="form-check-label" for="remember"> Запомнить меня </label>
            </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary w-100 mb-4">Войти</button>
    </form>
</div>
@endsection