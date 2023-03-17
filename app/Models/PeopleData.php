<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PeopleData extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'last_name', 'document',
        'document_city', 'document_type_id', 'regime_id',
        'city', 'legal_representation_id', 'comments',
        'born_date', 'active'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
