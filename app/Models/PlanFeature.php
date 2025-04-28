<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class PlanFeature extends Model
{
    use HasUuids;

    protected $guarded = [];

    protected $table = 'plan_features';
}