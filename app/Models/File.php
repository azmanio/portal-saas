<?php

namespace App\Models;

use App\Traits\HasFormattedAttributes;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasUuids, HasFormattedAttributes;

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
