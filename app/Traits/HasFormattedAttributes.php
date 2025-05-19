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

    /**
     * Override getAttribute agar bisa format otomatis.
     */
    public function getAttribute($key)
    {
        $value = parent::getAttribute($key);

        // Format dengan ucwords
        if (property_exists($this, 'ucwordsAttributes') && in_array($key, $this->ucwordsAttributes ?? [])) {
            return $this->formatUcwords($value);
        }

        // Format dengan ucfirst
        if (property_exists($this, 'ucfirstAttributes') && in_array($key, $this->ucfirstAttributes ?? [])) {
            return $this->formatUcfirst($value);
        }

        return $value;
    }

    /**
     * Kapital setiap awal kata.
     */
    protected function formatUcwords(?string $value) : ?string
    {
        return $value ? ucwords(strtolower($value)) : null;
    }

    /**
     * Kapital hanya kata pertama.
     */
    protected function formatUcfirst(?string $value) : ?string
    {
        return $value ? ucfirst(strtolower($value)) : null;
    }
}
