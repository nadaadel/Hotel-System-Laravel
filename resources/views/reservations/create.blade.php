<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Hotel System</title>
    </head>
    <body>
        <h1 style="color:purple">Confirm Your Reservation with online Payment</h1>
        <form action="/client/store/{{$room->id}}t" method="POST">
            @csrf
            <label>Enter your Accompany Number</label>
            <input type="number" name="accompany_number" max="{{$room->capacity}}"/>
            <input type="hidden" name="price" value="{{$room->price}}" /> </br>
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
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    </body>
</html>










