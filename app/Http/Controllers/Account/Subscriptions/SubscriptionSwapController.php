<?php

namespace App\Http\Controllers\Account\Subscriptions;

use App\Http\Controllers\Controller;
use App\Plan;
use Illuminate\Http\Request;
use Laravel\Cashier\Exceptions\PaymentActionRequired;

class SubscriptionSwapController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index(Request $request)
    {
        $plans = Plan::where('slug', '!=', $request->user()->plan->slug)->get();
        return view('account.subscriptions.swap', compact('plans'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'plan' => 'required|exists:plans,slug'
        ]);


        try {
            $request->user()->subscription('default')
            ->swap(Plan::where('slug', $request->plan)->first()->stripe_id);
        } catch (PaymentActionRequired $e) {
            return redirect()->route(
                'cashier.payment',
                [
                    $e->payment->id,
                    'redirect' => route('account.subscriptions')
                ]
            );
        }
        
        return redirect()->route('account.subscriptions');
    }
}
