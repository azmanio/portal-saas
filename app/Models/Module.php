<?php

namespace App\Models;

use App\Traits\HasFormattedAttributes;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    use HasFactory, HasUuids, HasFormattedAttributes;

    protected $guarded = [];

    public function features()
    {
        return $this->hasMany(Feature::class);
    }

    // Atribut yang huruf awal setiap kata dikapital
    protected array $ucwordsAttributes = ['module_name'];

    // Atribut yang hanya huruf awal kata pertama dikapital
    protected array $ucfirstAttributes = ['status'];
}
