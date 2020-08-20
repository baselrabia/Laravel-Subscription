@extends('layouts.account')

@section('account')

<div class="card">
    <div class="card-header">{{ __('Invoices') }}</div>

    <div class="card-body">
        @foreach ($invoices as $invoice)
        <div>
            {{ $invoice->date()->toFormattedDateString() }}
            {{ $invoice->total() }}
            <a href="{{ route('account.subscriptions.invoice', $invoice->id) }}">Download</a>
        </div>
        @endforeach

    </div>
</div>

@endsection
