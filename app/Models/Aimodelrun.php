<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Aimodelrun extends Model
{
    protected $fillable = [
        'aimodel_id',
        'input_data',
        'output_data',
        'status',
        'key_id',
    ];

    public function aimodel()
    {
        return $this->belongsTo(Aimodel::class);
    }

    public function key()
    {
        return $this->belongsTo(Key::class);
    }

}
