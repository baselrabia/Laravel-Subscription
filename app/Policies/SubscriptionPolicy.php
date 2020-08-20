<?php

namespace App\Policies;

use App\User;
use Laravel\Cashier\Subscription;
use Illuminate\Auth\Access\HandlesAuthorization;

class SubscriptionPolicy
{
    use HandlesAuthorization;

    public function cancel(User $user ,Subscription $subscription)
    {
       return !$subscription->cancelled();
    }

    public function resume(User $user, Subscription $subscription)
    {
        return $subscription->cancelled();
    }
}

