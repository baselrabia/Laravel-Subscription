@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Checkout') }}</div>

                <div class="card-body ">
                    <form action="{{ route('subscriptions.store') }}" method="POST" id="card-form">
                        @csrf
                        <div class="form-group">
                            <label for="card-holder-name">Name Of Card </label>
                            <input type="text" name="name" id="card-holder-name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="card-element">Card details </label>
                            <div id="card-element"> </div>
                        </div>

                        <input type="hidden" name="plan" value="{{ request('plan') }}"

                        <div class="text-center">
                            <button type="submit" class="btn btn-primary " id="card-button" data-secret="{{ $intent->client_secret }}"> Pay </button>
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

    const form = document.getElementById('card-form')
    const cardButton = document.getElementById('card-button')
    const cardHolderName = document.getElementById('card-holder-name')

    form.addEventListener('submit', async (e) => {
        e.preventDefault()

        cardButton.disable = true

        const {
            setupIntent,
            error
        } = await stripe.confirmCardSetup(
            cardButton.dataset.secret, {
                payment_method: {
                    card: cardElement,
                    billing_details: {
                        name: cardHolderName.value
                    }
                }
            }
        )

        if (error) {
            cardButton.disable = false
        } else {
            let token = document.createElement('input')

            token.setAttribute('type', 'hidden')
            token.setAttribute('name', 'token')
            token.setAttribute('value', setupIntent.payment_method)

            form.appendChild(token)

            form.submit()
        }

    })
</script>
@endsection
