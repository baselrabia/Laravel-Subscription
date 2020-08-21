@extends('layouts.account')

@section('account')

<div class="card">
    <div class="card-header">{{ __('Subscription') }}</div>

    <div class="card-body">
        @if(auth()->user()->subscribed())
        @if($subscription)
        <ul>
            <li>
                plan : {{ auth()->user()->plan->title }} ({{$subscription->amount()}} / {{$subscription->interval() }})

                @if(auth()->user()->subscription('default')->cancelled())
                Ends {{$subscription->cancelAt()}}. <a href=" {{ route('account.subscriptions.resume') }} "> Resume </a>
                @endif
            </li>
            @if($invoice)
            <li>
                Next Payment : {{$invoice->amount()}} in {{$invoice->nextPaymentAttempt()}}
            </li>
            @endif
            @if($customer)
            <li>
                Balance : {{$customer->balance()}}
            </li>
            @endif
        </ul>
        @endif
        @else
        <p> Tou don't have a subscription</p>
        @endif

        <div>
            <a href="{{auth()->user()->billingPortalUrl(route('account.subscriptions'))}}"> Biling portal</a>
        </div>
    </div>
</div>

@endsection
