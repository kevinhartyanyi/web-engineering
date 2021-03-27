<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Solutions extends Model
{
    use HasFactory;
    protected $fillable = ["submit", "tasks_id"];

    public function tasks()
    {
        return $this->belongsTo(Tasks::class);
    }
}
