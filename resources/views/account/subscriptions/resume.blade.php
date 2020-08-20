@extends('layouts.account')

@section('account')

<div class="card">
    <div class="card-header">{{ __('Resume') }}</div>

    <div class="card-body">
        <form action="{{ route('account.subscriptions.resume') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-primary " id="card-button"> Resume </button>

        </form>
    </div>
</div>

@endsection
