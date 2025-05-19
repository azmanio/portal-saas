<?php

namespace App\Models;

use App\Traits\HasFormattedAttributes;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasUuids, HasFormattedAttributes;

    protected $guarded = [];

    public function plan_features()
    {
        return $this->hasMany(PlanFeature::class);
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

    // Atribut yang huruf awal setiap kata dikapital
    protected array $ucwordsAttributes = ['plan_name'];

    // Atribut yang hanya huruf awal kata pertama dikapital
    protected array $ucfirstAttributes = ['description'];
}
