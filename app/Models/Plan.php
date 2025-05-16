<?php

namespace App\Models;

use App\Traits\HasFormattedAttributes;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasUuids, HasFormattedAttributes;

    protected $guarded = [];

    public function features()
    {
        return $this->belongsToMany(Feature::class, 'plan_features');
    }

    const STATUS_DRAFT = 0;
    const STATUS_PUBLISHED = 1;
    const STATUS_HIDDEN = 2;
    const STATUS_NOT_ACTIVE = 3;

    public static function getStatusOptions()
    {
        return [
            self::STATUS_DRAFT => 'Draft',
            self::STATUS_PUBLISHED => 'Published',
            self::STATUS_HIDDEN => 'Hidden',
            self::STATUS_NOT_ACTIVE => 'Not Active',
        ];
    }

    // public function getStatusLabelAttribute()
    // {
    //     return self::getStatusOptions()[$this->status] ?? 'Unknown';
    // }

    // public function getStatusBadgeAttribute() : string
    // {
    //     return match ($this->status) {
    //         0 => 'secondary', // draft
    //         1 => 'success',   // published
    //         2 => 'warning',   // hidden
    //         3 => 'danger',    // not active
    //         default => 'dark',
    //     };
    // }
}