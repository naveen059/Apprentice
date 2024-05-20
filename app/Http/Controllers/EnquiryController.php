<?php

namespace App\Http\Controllers;

use App\Models\Inquiry;
use Illuminate\Http\Request;

class EnquiryController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'subject' => 'nullable|string|max:255',
            'contact_number' => 'required|string|max:255',
            'parent_name' => 'required|string|max:255',
            'course_grade' => 'required|string|max:255',
            'description' => 'nullable|string',
            'submit_date' => 'nullable|date',
            'message' => 'nullable|string|max:255',
        ]);

        $inquiry = new Inquiry();
        $inquiry->fill([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'subject' => $validatedData['subject'],
            'description' => $validatedData['description'],
            'contact_number' => $validatedData['contact_number'],
            'parent_name' => $validatedData['parent_name'],
            'course_grade' => $validatedData['course_grade'],
            'submit_date' => $validatedData['submit_date'],
            'status' => 'pending',
            'message' => $validatedData['message'],
            'operation' => 'not_editable', 
        ]);

        $inquiry->save();

        return redirect()->back()->with('success', 'Enquiry submitted successfully.');
    }

    public function submitInquiry(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'subject' => 'nullable|string|max:255',
            'contact_number' => 'required|string|max:255',
            'parent_name' => 'required|string|max:255',
            'course_grade' => 'required|string|max:255',
            'description' => 'nullable|string',
            'submit_date' => 'nullable|date',
            'message' => 'nullable|string|max:255',
        ]);

        $inquiry = new Inquiry();
        $inquiry->fill([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'contact_number' => $validatedData['contact_number'],
            'parent_name' => $validatedData['parent_name'],
            'course_grade' => $validatedData['course_grade'],
            'submit_date' => now(),
            'status' => 'pending',
            'operation' => 'not_editable',
        ]);

        $inquiry->save();

        return redirect()->back()->with('success', 'Enquiry submitted successfully.');
    }

    public function updateInquiry(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'subject' => 'nullable|string|max:255',
            'contact_number' => 'required|string|max:255',
            'parent_name' => 'required|string|max:255',
            'course_grade' => 'required|string|max:255',
            'description' => 'nullable|string',
            'submit_date' => 'nullable|date',
            'message' => 'nullable|string|max:255',
        ]);

        $inquiry = Inquiry::findOrFail($id);

        if ($inquiry->operation === 'editable') {
            $inquiry->update([
                'name' => $validatedData['name'],
                'email' => $validatedData['email'],
                'subject' => $validatedData['subject'],
                'description' => $validatedData['description'],
                'contact_number' => $validatedData['contact_number'],
                'parent_name' => $validatedData['parent_name'],
                'course_grade' => $validatedData['course_grade'],
                'submit_date' => now(),
                'message' => $validatedData['message'],
            ]);

            return redirect()->back()->with('success', 'Enquiry updated successfully.');
        } else {
            return redirect()->back()->with('error', 'This inquiry cannot be edited.');
        }
    }


}
