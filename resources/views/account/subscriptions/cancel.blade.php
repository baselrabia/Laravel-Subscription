@extends('layouts.account')

@section('account')

<div class="card">
    <div class="card-header">{{ __('Cancel') }}</div>

    <div class="card-body">
        <form action="{{ route('account.subscriptions.cancel') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-primary " id="card-button"> Cancel </button>

        </form>
    </div>
</div>

@endsection
