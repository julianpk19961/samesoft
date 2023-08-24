<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\macro_processes;
use League\CommonMark\Node\Block\Document;

class areas extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'macro_process_id'];


    public function parents()
    {
        return $this->belongsTo(macro_processes::class, 'macro_process_id');
    }

    public function macroProcess(): BelongsTo
    {
        return $this->belongsTo(MacroProcesses::class, 'macro_process_id');
    }

    public function documents()
    {
        return $this->morphMany(Documents::class, 'documentable');
    }
}
