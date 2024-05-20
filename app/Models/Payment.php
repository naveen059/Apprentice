<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
        'amount', 'payment_method', 'upi_id', 'cash_receipt_number', 'bank_name', 'transaction_type', 'student_id', 'course_id', 'payment_status',  'is_partial', 'is_approved'
    ];

    public function student()
    {
        return $this->belongsTo(User::class, 'student_id');
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}

