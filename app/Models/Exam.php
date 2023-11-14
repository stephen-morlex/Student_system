<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Exam extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function subjects(): BelongsToMany
    {
        return $this->belongsToMany(Subject::class);
    }
    public function students(): BelongsToMany
    {
        return $this->belongsToMany(Student::class);
    }
}
