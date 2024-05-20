<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inquiry extends Model
{
    protected $table = 'inquiries';

    protected $fillable = [
        'name',
        'email',
        'contact_number',
        'parent_name',
        'course_grade',
        'subject',
        'description',
        'submit_date',
        'message'
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
