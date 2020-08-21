@extends('layouts.account')

@section('account')

<div class="card">
    <div class="card-header">{{ __('Subscription') }}</div>

    <div class="card-body">
        <div>Subscription</div>

        <div>
            <a href="{{auth()->user()->billingPortalUrl(route('account.subscriptions'))}}"> Biling portal</a>
        </div>
    </div>
</div>

@endsection
