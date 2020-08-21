<?php

namespace App\Http\Controllers\Subscriptions;

use App\Http\Controllers\Controller;
use App\Plan;
use App\Rules\ValidCoupon;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth', 'not.subscribed']);
    }

    public function index(Request $request)
    {
        return view('subscriptions.checkout',[
            'intent' => $request->user()->createSetupIntent()
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'token' => 'required',
            'coupon' => [
                'nullable',
                new ValidCoupon()
            ],
            'plan' => 'required|exists:plans,slug'
        ]);

        $plan = Plan::where('slug', $request->get('plan', 'monthly'))
                ->first();

        $sub = $request->user()->newSubscription('default', $plan->stripe_id)
            ->withCoupon($request->coupon)
            ->create($request->token);

            return back();
    }
}
