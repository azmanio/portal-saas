<?php

namespace App\Models;

use App\Traits\HasFormattedAttributes;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class InvoiceDetail extends Model
{
    use HasUuids, HasFormattedAttributes;

    protected $guarded = [];

    public function invoice()
    {
        return $this->belongsTo(Invoice::class);
    }
}
