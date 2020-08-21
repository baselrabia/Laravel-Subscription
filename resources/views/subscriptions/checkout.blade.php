@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Checkout') }}</div>

                <div class="card-body ">

                    <x:card-form :action="route('subscriptions.store')">
                        <input type="hidden" name="plan" value="{{ request('plan') }}" <div class="text-center">

                        <div class="form-group">
                            <label for="coupon">Coupon</label>
                            <input type="text" name="coupan" id="coupon" class="form-control">
                        </div>
                        
                        <button type="submit" class="btn btn-primary " id="card-button" data-secret="{{ $intent->client_secret }}"> Pay </button>
                    </x:card-form>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
