<?php

namespace App\Models;

use App\Traits\HasFormattedAttributes;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    use HasUuids, HasFormattedAttributes;

    protected $guarded = [];

    public function features()
    {
        return $this->hasMany(Feature::class);
    }
}
