@extends('layouts.admin')

@section('content')

    <section class="p-4">
        <div class="row">
            <h2 class="my-3">Sponsorizza i tuoi appartamenti</h2>
            <hr>
        </div>
        {{-- informazioni --}}
        <div class="row">
            <div class="col-12 col-lg-6">
                <div class="d-flex h-100">
                    <div class="card flex-fill mb-3" style="background-color: #f0f0f0; box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);">
                        <div class="card-body">
                            <h3 class="card-title">Informazioni sulle sponsorizzazioni</h3>
                            <p class="card-text" style="list-style-type: none; padding-left: 20px;">
                                &bull; Le sponsorizzazioni sono un modo per far risaltare il tuo appartamento rispetto agli altri. <br>
                                &bull; Scegliendo una sponsorizzazione, il tuo appartamento sarà in cima alla lista per un certo periodo di tempo. <br>
                                &bull; In questo modo, sarà più facile per gli utenti trovare il tuo appartamento e contattarti. <br>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-6">
                <div class="d-flex h-100">
                    <div class="card flex-fill mb-3" style="background-color: #e5f5e5; box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);">
                        <div class="card-body">
                            <h3 class="card-title">Informazioni sul pagamento</h3>
                            <p class="card-text" style="list-style-type: none; padding-left: 20px;">
                                &bull; Il pagamento avviene tramite carta di credito. <br>
                                &bull; Il pagamento è sicuro e avviene tramite Braintree. <br>
                                &bull; Non ci sono costi aggiuntivi per il pagamento. <br>
                                &bull; Il pagamento è unico e non ricorrente. <br>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- cards sponsorizzazioni e form pagamento --}}
        <div class="row">
            <form id="payment-form" action="{{ route('admin.process_payment') }}" method="post" class="col-12 col-lg-6 mx-auto">
                @csrf
                <div class="card mb-3" style="box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);">
                    <div class="card-body">
                        <h2 class="card-title">Aquista una sponsorizzazione</h2>
                        <div class="form-group">
                            <label for="sponsorship_id">Scegli un pacchetto:</label><br>
                            @foreach ($sponsorships as $sponsorship)
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="sponsorship_id" id="sponsorship_{{ $sponsorship->id }}" value="{{ $sponsorship->id }}">
                                <label class="form-check-label" for="sponsorship_{{ $sponsorship->id }}">
                                    {{ $sponsorship->name_sponsorship }} (Prezzo: {{ $sponsorship->price }}€, Durata: {{ $sponsorship->duration }} ore)
                                </label>
                            </div>
                            @endforeach
                        </div>

                        <div class="form-group mt-3">
                            <label for="apartment_id">Scegli un appartamento:</label>
                            <select name="apartment_id" id="apartment_id" class="form-control">
                                <option value="">Scegli un appartamento</option>
                                @foreach ($userApartments as $apartment)
                                <option value="{{ $apartment->id }}">
                                    {{ $apartment->title }}
                                </option>
                                @endforeach
                            </select>
                        </div>

                        <div id="dropin-wrapper" class="mt-3">
                            <div id="checkout-message"></div>
                            <div id="dropin-container"></div>
                            <input id="nonce" name="payment_method_nonce" type="hidden" required/>
                            <button id="submit-button" class="btn btn-primary btn-block">Paga</button>
                        </div>
                    </div>
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
