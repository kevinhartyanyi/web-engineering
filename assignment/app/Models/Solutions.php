<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Solutions extends Model
{
    use HasFactory;
    protected $fillable = ["submit", "tasks_id", "answer", "user_id", "evaluated"];

    public function tasks()
    {
        return $this->belongsTo(Tasks::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
