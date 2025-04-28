<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasUuids;

    protected $guarded = [];

    public function features()
    {
        return $this->belongsToMany(Feature::class, 'plan_features');
    }
}