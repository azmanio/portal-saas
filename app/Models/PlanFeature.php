<?php

namespace App\Models;

use App\Traits\HasFormattedAttributes;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class PlanFeature extends Model
{
    use HasUuids, HasFormattedAttributes;

    protected $guarded = [];

    protected $table = 'plan_features';

    public $timestamps = false;

    public function feature()
    {
        return $this->belongsTo(Feature::class);
    }
}