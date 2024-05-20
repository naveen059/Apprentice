@extends('layouts.admin')

@section('content')

<div class="container mx-auto px-4">
    <div class="flex justify-center">
        <div class="w-full lg:w-2/3">
            <div class="bg-white shadow-md rounded-lg overflow-hidden">
                <div class="bg-gray-200 text-gray-700 uppercase text-lg font-bold p-4">All Students</div>

                <div class="p-4">
                    @if($students->isEmpty())
                        <p class="text-gray-600">No students found.</p>
                    @else
                        <ul class="divide-y divide-gray-200">
                            @foreach($students as $student)
                                <li class="py-4 flex items-center justify-between">
                                    <div class="flex items-center">
                                        <img src="{{ asset('images/avatar.png') }}" alt="Avatar" class="h-8 w-8 rounded-full">
                                        <span class="ml-2">{{ $student->name }}</span>
                                    </div>
                                    <div>
                                        <a href="{{ route('admin.students.show', $student->id) }}" class="text-indigo-600 hover:text-indigo-900">View</a>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
