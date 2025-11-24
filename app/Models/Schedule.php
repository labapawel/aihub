<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $fillable = [
        'name',
        'start_time',
        'end_time',
        'description',
        'is_recurring',
        'recurrence_pattern',
    ];

    public function aiModels()
    {
        return $this->hasMany(AIModel::class);
    }
    
}
