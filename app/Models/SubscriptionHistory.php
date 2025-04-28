<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class SubscriptionHistory extends Model
{
    use HasUuids;

    protected $guarded = [];

    public function subscription()
    {
        return $this->belongsTo(Subscription::class);
    }
}
