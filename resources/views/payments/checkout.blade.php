<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagamento con Braintree</title>
    <script src="https://js.braintreegateway.com/web/dropin/1.33.4/js/dropin.min.js"></script>
    @vite(['resources/js/checkout.js', 'resources/sass/checkout.scss', 'resources/sass/app.scss'])
</head>
<body>
    <h1>Checkout</h1>

    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @elseif(session('error'))
        <p style="color: red;">{{ session('error') }}</p>
    @endif

    <form action="{{ route('payment.process') }}" method="POST" id="payment-form">
        @csrf

        <input type="hidden" name="apartment_id" id="apartment_id" value="{{$apartment->id}}">

        <select name="sponsorship_id" id="sponsorship_id">
            @foreach ($sponsorships as $sponsor)
            <option value="{{ $sponsor->id }}" data-price="{{ $sponsor->price }}">{{ $sponsor->name }}</option>
            @endforeach
        </select>

        <p>Importo: <span id="amount-display">{{ $sponsorships->first()->price }}</span>&euro;</p>

        <div id="dropin-container"></div>

        <button class="custom-btn custom-btn-green" type="submit" >Paga</button>
    </form>

    <script>
        var form = document.querySelector('#payment-form');
        var clientToken = "{{ $clientToken }}";

        braintree.dropin.create({
            authorization: clientToken,
            container: '#dropin-container'
        }, function (createErr, instance) {
            if (createErr) {
                console.log('Errore nella creazione del Dropin:', createErr);
                return;
            }

            form.addEventListener('submit', function (event) {
                event.preventDefault();

                instance.requestPaymentMethod(function (err, payload) {
                    if (err) {
                        console.log('Errore nella richiesta del metodo di pagamento:', err);
                        return;
                    }

                    var paymentNonce = document.createElement('input');
                    paymentNonce.setAttribute('type', 'hidden');
                    paymentNonce.setAttribute('name', 'payment_method_nonce');
                    paymentNonce.setAttribute('value', payload.nonce);
                    form.appendChild(paymentNonce);

                    form.submit();
                });
            });
        });
    </script>
</body>
</html>
