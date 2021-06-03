<?php

namespace App\Http\Controllers\Subscriptions;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function Checkout()
    {
        return view('subscriptions.checkout', [
            'intent' => auth()->user()->createSetupIntent()
        ]);
    }

    public function store(Request $request)
    {
        $request->user()
                ->newSubscription('default', 'prod_Ja8GTzrJ1QrWIv')
                ->create($request->token);

        return redirect()->route('subscriptions.premium');
    }

    public function premium()
    {
        return view('subscriptions.premium');
    }
}
