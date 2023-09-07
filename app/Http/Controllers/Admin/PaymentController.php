<?php

namespace App\Http\Controllers\Admin;

use App\Models\Payment;
use App\Http\Requests\StorePaymentRequest;
use App\Http\Requests\UpdatePaymentRequest;
use App\Http\Controllers\Controller;
use App\Models\Apartment;
use App\Models\Sponsorship;
use Braintree\Gateway;
use Braintree\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;



class PaymentController extends Controller
{

    public function processPayment(Request $request)
    {

        // Definisci le regole di validazione
        $rules = [
            'sponsorship_id' => 'required|exists:sponsorships,id',
            'apartment_id' => 'required|exists:apartments,id|user_owns_apartment',
        ];

        // Personalizza i messaggi di errore, se necessario
        $messages = [
            'sponsorship_id.required' => 'Ricordati di selezionare un pacchetto',
            'sponsorship_id.exists' => 'Il pacchetto con ID :input non esiste.',

            'apartment_id.required' => 'Ricordati di selezionare un appartamento',
            'apartment_id.exists' => "L'appartamento con ID :input non esiste o non sei il proprietario.",
            'apartment_id.user_owns_apartment' => "L'appartamento selezionato non appartiene a te.",
        ];

        Validator::extend('user_owns_apartment', function ($attribute, $value, $parameters, $validator) {
            // $value è l'ID dell'appartamento da validare
            // Puoi ottenere l'utente autenticato attuale tramite Auth::user()
            $user = Auth::user();
        
            // Verifica se l'ID dell'appartamento è uno degli appartamenti dell'utente
            return $user->apartments()->where('id', $value)->exists();
        });
        

        // Esegui la validazione
        $validator = Validator::make($request->all(), $rules, $messages);

        // Verifica se la validazione ha avuto successo
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        dd($request);
        $paymentMethod = "creditCard";
        $sponsorshipId = $request->input('sponsorship_id');
        $sponsorship = Sponsorship::find($sponsorshipId);

        $sponsorshipId = $request->input('sponsorship_id');
        $apartmentId = $request->input('apartment_id');
        $apartment = Apartment::find($apartmentId);
        $nonce = $request->payment_method_nonce;
        $price = $sponsorship->price;


        // Effettua il pagamento utilizzando Braintree
        $gateway = new Gateway([
            'environment' => config('services.braintree.environment'),
            'merchantId' => config('services.braintree.merchant_id'),
            'publicKey' => config('services.braintree.public_key'),
            'privateKey' => config('services.braintree.private_key'),
        ]);
        
        // Gestisci il pagamento in base al metodo selezionato
        if ($paymentMethod === 'creditCard') {
            // Elabora la transazione con carta di credito
            $result = $gateway->transaction()->sale([
                'amount' => $price,
                'paymentMethodNonce' => $nonce,
                'options' => [
                    'submitForSettlement' => true,
                ],
            ]);
        } elseif ($paymentMethod === 'paypal') {
            // Elabora la transazione con PayPal
            // Implementa la logica per il pagamento PayPal
        }

        // Gestisci la risposta di Braintree e restituisci una vista appropriata
        if ($result->success) {

            $durationInHours = $sponsorship->duration;
            $endTime = now()->addHours($durationInHours);

            $apartment->sponsorships()->attach($sponsorshipId, ['end_time' => $endTime, 'start_time' => now()]);


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
