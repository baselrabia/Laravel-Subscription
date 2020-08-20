@extends('layouts.account')

@section('account')
<div class="card">
    <div class="card-header">{{ __('Update Card') }}</div>

    <div class="card-body">
        <x:card-form :action="route('account.subscriptions.card') ">
            <button type="submit" class="btn btn-primary" id="card-button" data-secret="{{ $intent->client_secret }}">
                Update
            </button>
        </x:card-form>

    </div>
</div>

@endsection
