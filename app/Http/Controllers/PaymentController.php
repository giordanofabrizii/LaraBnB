<?php

namespace App\Http\Controllers;

use App\Services\BraintreeService as BraintreeService;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    protected $braintree;

    public function __construct(BraintreeService $braintreeService)
    {
        $this->braintree = $braintreeService;
    }

    // Go to the payment page
    public function getPaymentPage()
    {
        $clientToken = $this->braintree->clientToken();
        return view('payments.checkout', compact('clientToken'));
    }

    // process the payment
    public function processPayment(Request $request)
    {
        $nonce = $request->payment_method_nonce;
        $amount = $request->amount; 

        $result = $this->braintree->processPayment($amount, $nonce);

        if ($result->success) {
            return redirect()->back()->with('success', 'Pagamento effettuato con successo!');
        } else {
            return redirect()->back()->with('error', 'Errore nel pagamento: ' . $result->message);
        }
    }
}
