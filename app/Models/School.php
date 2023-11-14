<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class School extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function county(): BelongsTo
    {
        return $this->belongsTo(County::class);
    }
    public function students(): HasMany
    {
        return $this->hasMany(Student::class);
    }
}
