<?php

namespace App\Http\Controllers;

use App\Services\BraintreeService as BraintreeService;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Apartment;
use App\Models\Sponsorship;
use Illuminate\Support\Facades\Log;

class PaymentController extends Controller
{
    protected $braintree;

    public function __construct(BraintreeService $braintreeService)
    {
        $this->braintree = $braintreeService;
    }

    // Go to the payment page
    public function getPaymentPage(Apartment $apartment)
    {
        $sponsorships = Sponsorship::all();
        $clientToken = $this->braintree->clientToken();
        return view('payments.checkout', compact('clientToken','apartment','sponsorships'));
    }

    // process the payment
    public function processPayment(Request $request)
    {

        $apartmentId = $request->input('apartment_id');
        $apartment = Apartment::findOrFail($apartmentId);
        $sponsorshipId = $request->input('sponsorship_id');
        // find the sponsor and update the amount
        $sponsorship = Sponsorship::findOrFail($sponsorshipId);
        $amount = $sponsorship->price;

        $nonce = $request->payment_method_nonce;

        $result = $this->braintree->processPayment($amount, $nonce);

        if ($result->success) {
            // when the payment is done

            $transaction = new Transaction();
            $transaction->braintree_id = $result->transaction->id;
            $transaction->status = 'success';
            $transaction->amount = $amount;
            $transaction->save();

            // control if a existing sponsor is active
            $start_date = now('Europe/Rome');
            $end_date = $start_date->addHours($sponsorship->period);

            // update the pivot table
            DB::table('apartment_sponsorship_transaction')->insert([
                'apartment_id' => $apartmentId,
                'sponsorship_id' => $sponsorshipId,
                'transaction_id' => $transaction->id,
                'start_date' => $start_date,
                'end_date' => $end_date,
                'created_at' => now('Europe/Rome'),
                'updated_at' => now('Europe/Rome'),
            ]);

            return redirect()->route('apartments.show', compact('apartment'));
        } else {
            return redirect()->back()->with('error', 'Errore nel pagamento: ' . $result->message);
        }
    }
}
