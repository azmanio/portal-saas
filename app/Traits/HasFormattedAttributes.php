<?php

namespace App\Traits;

use Illuminate\Support\Carbon;

trait HasFormattedAttributes
{
    public function getFormattedPriceAttribute() : string
    {
        return number_format($this->price ?? 0, 0, ',', '.');
    }

    public function getFormattedDateAttribute() : ?string
    {
        return $this->created_at
            ? Carbon::parse($this->created_at)->translatedFormat('d F Y')
            : null;
    }

    public function getStatusLabelAttribute() : string
    {
        return match ($this->status) {
            0 => 'Draft',
            1 => 'Published',
            2 => 'Hidden',
            3 => 'Not Active',
            default => 'Unknown',
        };
    }

    public function getStatusBadgeAttribute() : string
    {
        return match ($this->status) {
            0 => 'secondary',
            1 => 'success',
            2 => 'warning',
            3 => 'danger',
            default => 'dark',
        };
    }
}