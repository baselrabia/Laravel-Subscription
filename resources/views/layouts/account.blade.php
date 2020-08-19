@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-3">
            <ul class="nav flex-column mb-4">
                <li class="nav-item">
                    <a href="{{ route('account') }}" class="nav-link"> Account </a>
                </li>

            </ul>

            <ul class="nav flex-column mb-4">
                <li class="nav-item">
                    <a href="{{ route('account.subscriptions') }}" class="nav-link"> Subscriptions </a>
                </li>

            </ul>
        </div>
        <div class=" col-md-9">
            @yield('account')
        </div>
    </div>
</div>
@endsection
