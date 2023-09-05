@extends('layouts.admin')

@section('content')


    <section>
        <h1>Sponsorizza il tuoi appartamenti, per esseri primo nei risultati degli utenti</h1>
    </section>

    <section>
        <h2>Lista Sponsorizzazioni</h2>
        <div class="row">
            <form id="payment-form" action="{{ route('admin.process_payment') }}" method="post">
                @csrf
                <div class="form-group">
                    <label>Scegli un pacchetto:</label><br>
                    @foreach ($sponsorships as $sponsorship)
                        <label>
                            <div class="card mx-auto">
                                <input type="radio" name="sponsorship_id" value="{{ $sponsorship->id }}">
                                <h5 class="card-title">{{ $sponsorship->name_sponsorship }}</h5>
                                <div class="card-body">
                                    <p>Prezzo: {{ $sponsorship->price }}€</p>
                                    <p>Durata: {{ $sponsorship->duration }} ore</p>
                                </div>
                            </div>
                        </label>
                    @endforeach
                </div>
            
                <div class="form-group">
                    <label>Scegli un appartamento:</label>
                    <select name="apartment_id" id="apartment_id" class="form-control">
                        <option value="">Seleziona un appartamento</option>
                        @foreach ($userApartments as $apartment)
                            <option value="{{ $apartment->id }}">
                                {{ $apartment->title }}
                            </option>
                        @endforeach
                    </select>
                        
                </div>
                <div id="dropin-wrapper">
                    <div id="checkout-message"></div>
                    <div id="dropin-container"></div>
                    <input id="nonce" name="payment_method_nonce" type="hidden" required/>
                    <button id="submit-button" class="btn btn-primary">Submit payment</button>
                </div>
            </form>

        </div>
    </section>


    <script src="https://js.braintreegateway.com/web/dropin/1.13.0/js/dropin.min.js"></script>

    <script>

        var button = document.getElementById('submit-button');
        var form = document.querySelector('#payment-form');
        var client_token = "{{ $token }}";
        var paymentInstance;
    
        braintree.dropin.create({
            authorization: client_token,
            container: '#dropin-container'
        }, function (createErr, instance) {
            if (createErr) {
                console.error(createErr);
                return;
            }
    
        form.addEventListener('submit', function (event) {
            event.preventDefault();

            instance.requestPaymentMethod(function (err, payload) {
                if (err) {
                    console.error(err);
                    return;
                }

                console.log(payload.nonce)
                document.querySelector('#nonce').value = payload.nonce;
                form.submit();
            });
        });
    
            //paymentInstance = instance;
        });
    </script>

@endsection
