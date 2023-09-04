<?php

namespace App\Http\Controllers\Admin;

use App\Models\Payment;
use App\Http\Requests\StorePaymentRequest;
use App\Http\Requests\UpdatePaymentRequest;
use App\Http\Controllers\Controller;
use App\Models\Apartment;
use App\Models\Sponsorship;
use Braintree\Transaction;
use Illuminate\Http\Request;

class PaymentController extends Controller
{

    public function processPayment(Request $request)
    {
        $paymentMethod = "creditCard";
        $sponsorshipId = $request->input('sponsorship_id');
        $sponsorship = Sponsorship::find($sponsorshipId);

        $gateway = new \Braintree\Gateway([
            'environment' => config('services.braintree.environment'),
            'merchantId' => config('services.braintree.merchant_id'),
            'publicKey' => config('services.braintree.public_key'),
            'privateKey' => config('services.braintree.private_key'),
        ]);
        
        // Gestisci il pagamento in base al metodo selezionato
        if ($paymentMethod === 'creditCard') {
            // Elabora la transazione con carta di credito
            $result = $gateway->transaction()->sale([
                'amount' => $sponsorship->price,
                'paymentMethodNonce' => $request->input('paymentMethodNonce'),  // Ottieni il nonce di pagamento dal client
                // Altre informazioni necessarie
            ]);
        } elseif ($paymentMethod === 'paypal') {
            // Elabora la transazione con PayPal
            // Implementa la logica per il pagamento PayPal
        }

        // Gestisci la risposta di Braintree e restituisci una vista appropriata
        if ($result->success) {
            // Pagamento riuscito, mostra una vista di conferma
            return view('admin.payment.success');
        } else {
            // Pagamento fallito, mostra una vista di errore
            return view('admin.payment.error', ['errorMessage' => $result->message]);
        }
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePaymentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePaymentRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function show(Payment $payment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function edit(Payment $payment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePaymentRequest  $request
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePaymentRequest $request, Payment $payment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Payment $payment)
    {
        //
    }
}
