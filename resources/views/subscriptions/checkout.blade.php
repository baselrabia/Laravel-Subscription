@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Checkout') }}</div>

                <div class="card-body ">
                    <form action="" method="POST">
                        <div class="form-group">
                            <label for="name">Name Of Card </label>
                            <input type="text" name="name" id="name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="name">Card details </label>
                            <div id="card-element"> </div>
                        </div>

                        <div class="text-center">
                             <button type="submit" class="btn btn-primary " id="card-button"> Pay </button>
                        </div>


                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    const stripe = Stripe("{{ config('cashier.key') }}")

    const elements = stripe.elements()
    const cardElement = elements.create('card')

    cardElement.mount('#card-element')
</script>
@endsection
