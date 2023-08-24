<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class macro_processes extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'macroprocess_id', 'icon'];

    public function areas(): HasMany
    {
        return $this->hasMany(Areas::class, 'macro_process_id');
    }

    public function children()
    {
        return $this->hasMany(Self::class, 'macroprocess_id');
    }

    public function parents()
    {
        return $this->belongsTo(Self::class, 'macroprocess_id');
    }

    public function documents()
    {
        return $this->morphMany(Documents::class, 'documentable');
    }
}
