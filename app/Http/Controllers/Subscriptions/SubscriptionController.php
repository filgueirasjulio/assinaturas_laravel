<?php

namespace App\Http\Controllers\Subscriptions;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class SubscriptionController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function checkout()
    {
        return view('subscriptions.checkout', [
            'intent' => auth()->user()->createSetupIntent(),
        ]);
    }

    public function store(Request $request)
    { 
        $request->user()
        ->newSubscription('default', 'price_1IwxzsGAqeFLkvdLrNgsh5Us')
        ->create($request->token);

        return redirect()->route('subscriptions.premium');
    }

    public function premium()
    {
        return view('subscriptions.premium');
    }

    public function account()
    {
        $invoices = auth()->user()->invoices();

        return view('subscriptions.account', compact('invoices'));
    }

    public function invoiceDownload($invoiceId)
    {
        return Auth::user()
                ->downloadInvoice($invoiceId, [
                    'vendor' => config('app.name'),
                    'product' => 'Assinatura VIP'
                ]);
    }

    public function cancel()
    {
        auth()->user()->subscription('default')->cancel();

        return redirect()->route('subscriptions.account');
    }

    public function resume()
    {
        auth()->user()->subscription('default')->resume();

        return redirect()->route('subscriptions.account');
    }
}
