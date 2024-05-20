<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Course;
use App\Models\Inquiry;
use App\Models\Payment;

class StudentController extends Controller
{
    public function __construct()
        {
            $this->middleware(function ($request, $next) {
                $user = auth()->user();
                $this->payments = Payment::all();
                $this->inquiries = Inquiry::all();
                return $next($request);
            });
        }

        public function index()
        {
            return view('student.dashboard', ['payments' => $this->payments, 'inquiries' => $this->inquiries]);
        }

        public function showCourseSelectionForm()
        {
            $courses = Course::all();
            return view('student.select-course', compact('courses'));
        }

        public function selectCourse(Request $request)
        {
            $validatedData = $request->validate([
                'course_id' => 'required|exists:courses,id',
            ]);

            $student = auth()->user();

            $student->course_id = $validatedData['course_id'];
            $student->save();

            return redirect()->route('dashboard')->with('success', 'Course selected successfully!');
        }

        public function createInquiry(Request $request)
        {
            $validatedData = $request->validate([
                // Your validation rules
            ]);

            $inquiry = new Inquiry();
            $inquiry->fill($validatedData);

            $student = auth()->user();
            $student->inquiries()->save($inquiry);

            return redirect()->route('dashboard')->with('success', 'Inquiry sent successfully!');
        }

        public function showInquiryForm()
        {
            return view('student.enquiry_form', ['payments' => $this->payments, 'inquiries' => $this->inquiries]);
        }



        public function editInquiry($id)
        {
            $inquiry = Inquiry::findOrFail($id);
            return view('student.edit_inquiry_form', ['inquiry' => $inquiry, 'inquiries' => $this->inquiries]);
        }

        

        public function makePayment(Request $request)
            {
                $validatedData = $request->validate([
                    'amount' => 'required|numeric|min:0',
                    'description' => 'nullable|string',
                    'course_id' => 'required|exists:courses,id',
                    'payment_method' => 'nullable|string',
                    'upi_id' => 'nullable|string',
                    'cash_receipt_number' => 'nullable|string',
                    'bank_name' => 'nullable|string',
                    'transaction_type' => 'nullable|string',
                    'payment_status' => 'nullable|string',
                ]);

                $student = auth()->user();

                $payment = new Payment([
                    'student_id' => $student->id,
                    'course_id' => $request->course_id,
                    'amount' => $validatedData['amount'],
                    'description' => $validatedData['description'],
                    'payment_method' => $validatedData['payment_method'],
                    'upi_id' => $validatedData['upi_id'],
                    'cash_receipt_number' => $validatedData['cash_receipt_number'],
                    'bank_name' => $validatedData['bank_name'],
                    'transaction_type' => $validatedData['transaction_type'],
                    'payment_status' => 'pending',
                    'is_partial' => $request->is_partial,
                    'is_approved' => 0,
                ]);

                $payment->save();

                $payments = auth()->user()->payments;
                $inquiries = auth()->user()->inquiries;
                return redirect()->route('student.dashboard', compact('payments', 'inquiries'))->with('success', 'Payment made successfully!');

            }

        public function showPaymentForm()
        {
            $courses = Course::all();
            return view('student.payment_form', ['courses' => $courses, 'inquiries' => $this->inquiries, 'payments' => $this->payments]);
        }

}

