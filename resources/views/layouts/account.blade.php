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
                @if(auth()->user()->subscribed())

                @can('cancel',auth()->user()->subscription('default'))
                <li class="nav-item">
                    <a href="{{ route('account.subscriptions.cancel') }}" class="nav-link"> Cancel Subscriptions </a>
                </li>
                @endcan
                @can('resume',auth()->user()->subscription('default'))
                <li class="nav-item">
                    <a href="{{ route('account.subscriptions.resume') }}" class="nav-link"> Resume Subscriptions </a>
                </li>
                @endcan
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('account.subscriptions.swap') }}"> Swap Plan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('account.subscriptions.card') }}">
                        Update Plan</a>
                </li>
                @endif

                <li class="nav-item">
                    <a href="{{ route('account.subscriptions.invoices') }}" class="nav-link"> Invoices </a>
                </li>

            </ul>
        </div>
        <div class=" col-md-9">
            @yield('account')
        </div>
    </div>
</div>
@endsection
