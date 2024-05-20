<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = [
        'name', 'description',
    ];

    public function payments()
    {
        return $this->belongsTo(Payment::class);
    }
}
