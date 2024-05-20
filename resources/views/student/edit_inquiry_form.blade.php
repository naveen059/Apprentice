@extends('layouts.student')

@section('content')
<div class="mx-2 bg-white p-8 border shadow-md mt-2">
    <h2 class="text-2xl font-bold mb-4">Edit enquiry</h2>
    <form action="{{ route('student.updateInquiry', ['id' => $inquiry->id]) }}" method="POST">
        @csrf

        <div class="mb-6">
            <h3 class="text-lg font-semibold mb-2">Personal Information</h3>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label for="name" class="block mb-1">Name:</label>
                    <input type="text" id="name" name="name" value="{{ $inquiry->name }}"  class="border rounded-md p-2 w-full">
                </div>
                <div>
                    <label for="contact_number" class="block mb-1">Contact Number:</label>
                    <input type="tel" id="contact_number" value="{{ $inquiry->contact_number }}" name="contact_number" class="border rounded-md p-2 w-full">
                </div>
                <div class="mb-4">
                    <label for="parent_name" class="block mb-1">Parent's Name:</label>
                    <input type="text" id="parent_name" value="{{ $inquiry->parent_name }}" name="parent_name" class="border rounded-md p-2 w-full">
                </div>
                <div>
                    <label for="email" class="block mb-1">Email Address:</label>
                    <input type="email" id="email" name="email" value="{{ $inquiry->email }}" class="border rounded-md p-2 w-full">
                </div>
                <div class="mb-4">
                    <label for="course_grade" class="block mb-1">Course/Grade:</label>
                    <select id="course_grade" name="course_grade" class="border rounded-md p-2 w-full">
                        <option value="prekg" {{ $inquiry->course_grade == 'prekg' ? 'selected' : '' }}>Pre-KG</option>
                        <option value="ukg" {{ $inquiry->course_grade == 'ukg' ? 'selected' : '' }}>UKG</option>
                        <option value="lkg" {{ $inquiry->course_grade == 'lkg' ? 'selected' : '' }}>LKG</option>
                        <option value="grade1" {{ $inquiry->course_grade == 'grade1' ? 'selected' : '' }}>Grade 1</option>
                        <option value="grade2" {{ $inquiry->course_grade == 'grade2' ? 'selected' : '' }}>Grade 2</option>
                        <option value="grade3" {{ $inquiry->course_grade == 'grade3' ? 'selected' : '' }}>Grade 3</option>
                        <option value="grade4" {{ $inquiry->course_grade == 'grade4' ? 'selected' : '' }}>Grade 4</option>
                        <option value="grade5" {{ $inquiry->course_grade == 'grade5' ? 'selected' : '' }}>Grade 5</option>
                        <option value="grade6" {{ $inquiry->course_grade == 'grade6' ? 'selected' : '' }}>Grade 6</option>
                    </select>
                </div>

            </div>
        </div>

        <div class="mb-6">
                    <h3 class="text-lg font-semibold mb-2">Enquiry Details</h3>
                    <div class="mb-4">
                        <label for="subject" class="block mb-1">Subject of Enquiry:</label>
                        <input type="text" id="subject" name="subject" value="{{ $inquiry->subject }}" class="border rounded-md p-2 w-full">
                    </div>
                    <div class="mb-4">
                        <label for="description" class="block mb-1">Description:</label>
                        <textarea id="description" name="description" rows="4" class="border rounded-md p-2 w-full">{{ $inquiry->description }}</textarea>
                    </div>
                </div>

                <div class="mb-4">
                    <label for="message" class="block mb-1">Status message:</label>
                    <textarea id="message" name="message" rows="4" class="border rounded-md p-2 w-full">{{ $inquiry->message }}</textarea>
                </div>

        <div class="text-left">
            <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded-md">Submit</button>
        </div>
    </form>
</div>
@endsection
