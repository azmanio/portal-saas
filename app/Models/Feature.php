<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{
    use HasUuids;

    protected $guarded = [];

    public function plan()
    {
        return $this->belongsToMany(Plan::class, 'plan_features');
    }
}
