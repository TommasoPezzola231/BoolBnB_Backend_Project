@extends('layouts.admin')

@section('content')
<script src="https://js.braintreegateway.com/web/dropin/1.8.1/js/dropin.min.js"></script>


    <section>
        <h1>Sponsorizza il tuoi appartamenti, per esseri primo nei risultati degli utenti</h1>
    </section>

    <section>
        <h2>Lista Sponsorizzazioni</h2>
        <div class="row">
            @foreach ($sponsorships as $sponsorship)
                <div class="card col-3 p-2 mx-auto">
                    <div class="card title">
                        <h3>{{ $sponsorship->name_sponsorship }}</h3>
                    </div>
                    <form action="{{ route('admin.process_payment') }}" method="post">
                        @csrf
                            <div class="card-body">
                                <p>Prezzo: {{ $sponsorship->price }}€</p>
                                <p>{{ $sponsorship->duration }} ore</p>
                                <input type="hidden" name="sponsorship_id" value="{{ $sponsorship->id }}">
                                <select name="apartment_id" id="apartment_id" class="col-12">
                                    <option value="">All Apartments</option>
                                    @foreach ($userApartments as $apartment)
                                        <option value="{{ $apartment->id }}">
                                            {{ $apartment->title }}
                                        </option>
                                    @endforeach
                                </select>

                                
                            </div>
                    </form>
                </div>
            @endforeach

            <div id="dropin-wrapper">
                <div id="checkout-message"></div>
                <div id="dropin-container"></div>
                <button id="submit-button" class="btn btn-primary">Submit payment</button>
            </div>
        </div>
    </section>

    <script>
        
        document.addEventListener("DOMContentLoaded", function () {
            var paymentMethodSelect = document.getElementById("payment_method");
            var creditCardFields = document.getElementById("creditCardFields");
            var paypalFields = document.getElementById("paypalFields");

            // Inizializza selectedPaymentMethod utilizzando l'attributo data
            var selectedPaymentMethod = paymentMethodSelect.getAttribute('data-selected-method');
            paymentMethodSelect.addEventListener("change", function () {
                var selectedPaymentMethod = paymentMethodSelect.value;

                if (selectedPaymentMethod === "creditCard") {
                    console.log("primo")
                    creditCardFields.style.display = "block";
                    paypalFields.style.display = "none";
                } else if (selectedPaymentMethod === "paypal") {
                    console.log("secondo")
                    creditCardFields.style.display = "none";
                    paypalFields.style.display = "block";
                } else {
                    console.log("terzo")
                    creditCardFields.style.display = "none";
                    paypalFields.style.display = "none";
                }
            });
        });


        var button = document.getElementById('submit-button');
        var form = document.querySelector('form');
        var nonceInput = document.getElementById('payment-method-nonce');
    
        var paymentInstance;
    
        braintree.dropin.create({
            authorization: "sandbox_24c38sx8_vzk2mfzf6fpvk97n",
            container: '#dropin-container'
        }, function (createErr, instance) {
            if (createErr) {
                console.error(createErr);
                return;
            }
    
            button.addEventListener('click', function () {
                instance.requestPaymentMethod(function (err, payload) {
                    if (err) {
                        console.error(err);
                        return;
                    }
    
                    // Inserisci il nonce nel campo nascosto
                    nonceInput.value = payload.nonce;
    
                    // Invia il modulo
                    form.submit();
                });
            });
    
            paymentInstance = instance;
        });
    </script>

@endsection
