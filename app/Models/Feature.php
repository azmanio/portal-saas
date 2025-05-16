<?php

namespace App\Models;

use App\Traits\HasFormattedAttributes;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{
    use HasUuids, HasFormattedAttributes;

    protected $guarded = [];

    public function plan()
    {
        return $this->belongsToMany(Plan::class, 'plan_features');
    }

    public function module()
    {
        return $this->belongsTo(Module::class);
    }
}
