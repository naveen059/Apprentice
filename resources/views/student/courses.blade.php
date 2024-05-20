@extends('layouts.student')

@section('content')
    <div class="container mx-auto">
        <h1 class="text-3xl font-semibold mb-4">Available Courses</h1>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($courses as $course)
                <div class="bg-white shadow-md rounded-lg overflow-hidden">
                    <img src="https://source.unsplash.com/300x150/?education,{{ urlencode($course->name) }}" alt="{{ $course->name }} Image" class="w-full h-48 object-cover">
                    <div class="p-4">
                        <h3 class="font-semibold text-xl mb-2">{{ $course->name }}</h3>
                        <button class="text-blue-600 font-bold rounded-md toggle-description focus:outline-none" data-course-id="{{ $course->id }}">
                            View Details
                        </button>
                        <div class="course-description mt-2 text-gray-600 hidden" id="description-{{ $course->id }}">
                            {{ $course->description }}
                        </div>
                    </div>
                </div>
            @endforeach
    </div>


<script>
    document.addEventListener('DOMContentLoaded', function() {
        const buttons = document.querySelectorAll('.toggle-description');

        buttons.forEach(button => {
            button.addEventListener('click', function() {
                const courseId = this.getAttribute('data-course-id');
                const description = document.getElementById(`description-${courseId}`);
                description.classList.toggle('hidden');
            });
        });
    });
</script>
@endsection
