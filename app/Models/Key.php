<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Key extends Model
{
    protected $fillable = [
        'key',
        'requests_used',
    ];

    public function groups()
    {
        return $this->belongsToMany(Group::class);
    }
    public function getRequestsusedAttribute()
    {
        return $this->aimodelruns()->count();
    }
    
    public function aimodelruns()
    {
        return $this->hasMany(Aimodelrun::class);
    }
}
