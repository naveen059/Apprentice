<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Inquiry;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function __construct()
        {
            $this->middleware(function ($request, $next) {
                $user = auth()->user();
                $this->inquiries = Inquiry::all();
                $this->courses = Course::all();
                return $next($request);
            });
        }

    public function index()
    {
        $courses = Course::all();

        return view('student.courses', ['courses' => $this->courses, 'inquiries' => $this->inquiries]);
    }

    
}

