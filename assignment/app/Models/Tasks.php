<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tasks extends Model
{
    use HasFactory;

    protected $fillable = ["name", "description", "point", "subjects_id"];

    public function solutions()
    {
        return $this->hasMany(Solutions::class);
    }

    public function subjects()
    {
        return $this->belongsTo(Subjects::class);
    }
}
