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

    public function checkout()
    {
        if (auth()->user()->subscribed('default')) {
            return redirect()->route('subscriptions.premium');
        };

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
        if (!auth()->user()->subscribed('default')) {
            return redirect()->route('subscriptions.checkout');
        };

        return view('subscriptions.premium');
    }
}
