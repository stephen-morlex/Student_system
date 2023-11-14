<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SchoolLevel extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function school(): BelongsTo
    {
        return $this->belongsTo(School::class);
    }
}
