@extends('layouts.app')
@section('content')
<div class="container">
<div class="row justify-content-center">
<div class="col-md-8"><div class="card">
 <div class="card-header">{{ __('Админ панель') }}</div>
<div class="card-body"> @if (session('status'))<div class="alert alert-success" role="alert">{{ session('status') }}</div>@endif {{ __('Вы вошли в систему!') }}</div>
<a href="{{route('homeAdmin')}}" class="nav-link"><p>в Админ панель</p></a></div></div></div></div>
@endsection
