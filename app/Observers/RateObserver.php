<?php

namespace App\Observers;

use App\Models\Rate;
use Illuminate\Support\Facades\Auth;

class RateObserver
{
    /**
     * @param Rate $rate
     */
    public function creating(Rate $rate)
    {
        $rate->user_id = Auth::id();
    }
}
