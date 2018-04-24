<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Hotel System</title>
    </head>
    <body>
        <form action="/reservations/payment" method="POST">
            @csrf
            <script
                    src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                    data-key="{{ env('STRIPE_PUB_KEY') }}"
                    data-amount="1999"
                    data-name="Hotel System"
                    data-description="Hotel Reservation Payment"
                    data-image="{{ asset('images/payment.png') }}"
                    data-locale="auto"
                    data-currency="usd">
            </script>
        </form>
    </body>
</html>