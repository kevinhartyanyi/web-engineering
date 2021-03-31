<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Subjects extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ["name", "description", "subject_code", "credit"];

    public function tasks()
    {
        return $this->hasMany(Tasks::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'teacher_id');
    }

    public function students()
    {
        return $this->belongsToMany(User::class, 'subject_student', 'subject_id', 'user_id');
    }
}
