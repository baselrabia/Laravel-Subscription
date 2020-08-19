@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Plans') }}</div>

                <div class="card-body">
                    @foreach ($plans as $plan)
                        <div>
                                <a href="{{ route('subscriptions',['plan' => $plan->slug]) }}" >  {{$plan->title}} </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
