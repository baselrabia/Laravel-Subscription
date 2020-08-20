<?php

namespace App\Http\Middleware;

use Closure;

class NotSubscribed
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($request->user() && $request->user()->Subscribed('default')) {
            return redirect()->route('account.subscriptions');
        }

        return $next($request);
    }
}
