<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Course;
use App\Models\Payment;

class Student extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'course_id', 'role']; 

    public function course()
    {
        return $this->belongsTo(Course::class); 
    }

    const ROLE_STUDENT = 'student'; 

    public function isStudent()
    {
        return $this->role === self::ROLE_STUDENT; 
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }
}
