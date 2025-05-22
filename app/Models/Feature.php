<?php

namespace App\Models;

use App\Traits\HasFormattedAttributes;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{
    use HasFactory, HasUuids, HasFormattedAttributes;

    protected $guarded = [];

    public function plan()
    {
        return $this->belongsToMany(Plan::class, 'plan_features');
    }

    public function module()
    {
        return $this->belongsTo(Module::class);
    }

    // Atribut yang huruf awal setiap kata dikapital
    protected array $ucwordsAttributes = ['feature_name'];

    // Atribut yang hanya huruf awal kata pertama dikapital
    protected array $ucfirstAttributes = ['description', 'status'];
}
