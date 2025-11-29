<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Aimodel extends Model
{
    protected $fillable = [
        'name',
        'version',
        'description',
        'script',
        'limitperday',
        'limitperminute',
        'group_id',
        'scheduler_id',
        'active',
    ];
    


    public function getMinutesCountAttribute()
    {
        return $this->aimodulesrun()
                    ->where('created_at', '>=', now()->subMinute())
                    ->count();
    }

    public function getDaysCountAttribute()
    {
        return $this->aimodulesrun()
                    ->where('created_at', '>=', now()->subDay())
                    ->count();
    }
    public function hasReachedMinuteLimit()
    {
        return $this->limitperminute !== null && $this->minutes_count >= $this->limitperminute;
    }

    public function hasReachedDailyLimit()
    {
        return $this->limitperday !== null && $this->days_count >= $this->limitperday;
    }

    public function group()
    {
        return $this->belongsTo(Group::class);
    }

    public function schedule()
    {
        return $this->belongsTo(Schedule::class, 'scheduler_id');
    }

    public function aimodulesrun()
    {
        return $this->hasMany(Aimodelrun::class);   
    }
}