<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inquiry;
use App\Models\Payment;
use App\Models\Course;
use App\Models\Student;
use App\Models\User;
use App\Models\Message;

class AdminController extends Controller
{
    public function index()
    {
        $inquiries = Inquiry::all();
        $messages = Message::all();
        $students = User::where('role', 'student')->get();
        $payments = Payment::all();
        return view('admin.dashboard', compact('inquiries', 'messages', 'students', 'payments'));
    }

    public function viewInquiries()
    {
        $inquiries = Inquiry::with('student')->get();
        return view('admin.inquiries', compact('inquiries'));
    }

    public function completeInquiry($id)
    {
        $inquiry = Inquiry::findOrFail($id);
        $inquiry->update(['status' => 'completed']);

        return redirect()->route('admin.inquiries')->with('success', 'Inquiry completed successfully');
    }


    public function editInquiry($id)
    {
        $inquiry = Inquiry::findOrFail($id);
        $inquiry->operation = 'editable';
        $inquiry->save();
        $inquiries = Inquiry::all();
        return view('admin.edit_inquiry', compact('inquiry', 'inquiries'));
    }


    public function deleteInquiry(Request $request, $id)
    {
        $inquiry = Inquiry::findOrFail($id);
        $inquiry->delete();

        return redirect()->route('admin.inquiries')->with('success', 'Inquiry deleted successfully.');
    }
    


    public function viewStudents()
    {
        $students = User::where('role', 'student')->get();
        return view('admin.students', compact('students'));
    }

    public function showStudents()
    {
        $students = User::where('role', 'student')->get();
        return view('admin.show_students', compact('students'));
    }


    public function viewPayments()
    {
        $payments = Payment::all();
        return view('admin.payments', compact('payments'));
    }

    public function viewCourses()
    {
        $courses = Course::all();
        return view('admin.courses', compact('courses'));
    }

    public function markPaymentComplete(Request $request)
    {
        $request->validate([
            'student_id' => 'required',
            'amount' => 'required|numeric',
        ]);

        return redirect()->route('admin.payments')->with('success', 'Payment marked as complete');
    }

    public function approvePayment(Request $request, Payment $payment)
    {
        $payment->update(['payment_status' => 'approved']);
        $payment->update(['is_approved' => 1]);
        return redirect()->back()->with('success', 'Payment approved successfully.');
    }

    public function enableAccess(Request $request, User $student)
    {
        $student->update(['access_enabled' => true]);
        return redirect()->back()->with('success', 'Access enabled for the student.');
    }

    public function updateStatus(Request $request, Payment $payment)
    {
        $request->validate([
            'payment_status' => 'required|in:pending,approved,cancelled',
        ]);

        $payment->update(['payment_status' => $request->payment_status]);
        return redirect()->back()->with('success', 'Payment status updated successfully.');
    }
}
