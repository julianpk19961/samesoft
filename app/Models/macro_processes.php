<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class macro_processes extends Model
{
    use HasFactory;

    public function area(): HasMany
    {
        return $this->hasMany(areas::class);
    } 

    public function children()
    {
        return $this->hasMany(Self::class, 'macroprocess_id');
    }

    public function parents()
    {
        return $this->belongsTo(Self::class, 'id');
    }
}
