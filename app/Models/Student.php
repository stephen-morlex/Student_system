<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Student extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function exams(): BelongsToMany
    {
        return $this->belongsToMany(Exam::class);
    }
    public function subjects(): BelongsToMany
    {
        return $this->belongsToMany(Subject::class);
    }
    public function school(): BelongsTo
    {
        return $this->belongsTo(School::class);
    }
    public function exam_results(): HasMany
    {
        return $this->hasMany(Student_Exam_Result::class);
    }
}
