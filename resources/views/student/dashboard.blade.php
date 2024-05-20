@extends('layouts.student')

@section('content')

<div class="flex flex-wrap mx-2">
    <div class="w-full lg:w-3/4 lg:mr-1/4">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
            <div class="bg-white rounded-lg shadow-md p-4 flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-500 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                </svg>
                <div>
                    <p class="font-semibold text-lg">$ {{ $payments->where('payment_status', 'approved')->sum('amount') }}</p>
                    <p class="text-sm text-gray-500">Approved Payments</p>
                </div>
            </div>
            <!-- Card for Pending Payments -->
            <div class="bg-white rounded-lg shadow-md p-4 flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-yellow-500 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                </svg>
                <div>
                    <p class="font-semibold text-lg">$ {{ $payments->where('payment_status', 'pending')->sum('amount') }}</p>
                    <p class="text-sm text-gray-500">Pending Payments</p>
                </div>
            </div>
            <!-- Card for Rejected Payments -->
            <div class="bg-white rounded-lg shadow-md p-4 flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-500 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
                <div>
                    <p class="font-semibold text-lg">$ {{ $payments->where('payment_status', 'rejected')->sum('amount') }}</p>
                    <p class="text-sm text-gray-500">Rejected Payments</p>
                </div>
            </div>
            
            <div class="bg-white rounded-lg shadow-md p-4 flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-500 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z"/>
                </svg>
                <div>
                    <p class="font-semibold text-lg">$ {{ $payments->sum('amount') }}</p>
                    <p class="text-sm text-gray-500">Total Payments</p>
                </div>
            </div>
        </div>

        <div class="w-full rounded-lg mx-3 space-x-3 p-6 mt-8" style="min-height: 400px;">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                <div class="relative flex flex-col items-center text-center bg-cover bg-center rounded-lg p-6" style="background-image: url('https://source.unsplash.com/400x300/?events'); min-height: 200px;">
                    <div class="bg-black bg-opacity-50 p-4 rounded-lg">
                        <i class="fas fa-calendar-alt text-blue-500 text-4xl mb-4"></i>
                        <h2 class="text-xl font-bold mb-2 text-white" style="font-family: 'Poppins', sans-serif;">Important Dates</h2>
                        <p class="text-gray-200">Stay updated with upcoming events and deadlines.</p>
                    </div>
                </div>
                
                <div class="relative flex flex-col items-center text-center bg-cover bg-center rounded-lg p-6" style="background-image: url('https://source.unsplash.com/400x300/?book'); min-height: 200px;">
                    <div class="bg-black bg-opacity-50 p-4 rounded-lg">
                        <i class="fas fa-book text-green-500 text-4xl mb-4"></i>
                        <h2 class="text-xl font-bold mb-2 text-white" style="font-family: 'Poppins', sans-serif;">Library Resources</h2>
                        <p class="text-gray-200">Access books and learning materials.</p>
                    </div>
                </div>
                
                <div class="relative flex flex-col items-center text-center bg-cover bg-center rounded-lg p-6" style="background-image: url('https://source.unsplash.com/400x300/?support'); min-height: 200px;">
                    <div class="bg-black bg-opacity-50 p-4 rounded-lg">
                        <i class="fas fa-hands-helping text-red-500 text-4xl mb-4"></i>
                        <h2 class="text-xl font-bold mb-2 text-white" style="font-family: 'Poppins', sans-serif;">Parent Support</h2>
                        <p class="text-gray-200">Resources and support for parents.</p>
                    </div>
                </div>
                
                <div class="relative flex flex-col items-center text-center bg-cover bg-center rounded-lg p-6" style="background-image: url('https://source.unsplash.com/400x300/?announcement'); min-height: 200px;">
                    <div class="bg-black bg-opacity-50 p-6 rounded-lg">
                        <i class="fas fa-bullhorn text-yellow-500 text-4xl mb-4"></i>
                        <h2 class="text-xl font-bold mb-2 text-white" style="font-family: 'Poppins', sans-serif;">School Announcements</h2>
                        <p class="text-gray-200">Stay informed with the latest news and updates.</p>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<div class="hidden lg:block fixed right-0 top-20 mt-8 w-1/6">
    <div class="bg-white p-4 rounded-lg shadow-md">
        <h2 class="text-lg font-semibold mb-5">Upcoming Events</h2>
        <div class="grid grid-cols-1 gap-4">
            <!-- Sample upcoming events content -->
            <div class="flex items-center mb-4">
                <img src="https://source.unsplash.com/featured/?cultural" alt="Event Image" class="w-12 h-12 rounded-full object-cover">
                <div class="ml-4">
                    <p class="font-semibold text-sm">Cultural Event</p>
                    <p class="text-xs text-gray-500">Date: May 15, 2024</p>
                </div>
            </div>
            <div class="flex items-center mb-4">
                <img src="https://source.unsplash.com/400x300/?workshop" alt="Event Image" class="w-12 h-12 rounded-full object-cover">
                <div class="ml-4">
                    <p class="font-semibold text-sm">Workshop</p>
                    <p class="text-xs text-gray-500">Date: May 20, 2024</p>
                </div>
            </div>
            <div class="flex items-center mb-4">
                <img src="https://source.unsplash.com/400x300/?conference" alt="Event Image" class="w-12 h-12 rounded-full object-cover">
                <div class="ml-4">
                    <p class="font-semibold text-sm">Conference</p>
                    <p class="text-xs text-gray-500">Date: June 5, 2024</p>
                </div>
            </div>
            <div class="flex items-center mb-4">
                <img src="https://source.unsplash.com/400x300/?seminar" alt="Event Image" class="w-12 h-12 rounded-full object-cover">
                <div class="ml-4">
                    <p class="font-semibold text-sm">Seminar</p>
                    <p class="text-xs text-gray-500">Date: June 10, 2024</p>
                </div>
            </div>
        </div>
    </div>
</div>

@php
    $latestPayment = $payments->sortByDesc('created_at')->first(); // Get the latest payment
@endphp

@if($latestPayment)
    <div class="fixed left-80 bottom-1"> 
        <button class="btn btn-danger rounded-full" onclick="window.location.href = '{{ route("payment.receipt") }}'"><i class="fa fa-download"></i></button>
    </div>
@endif

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var alerts = document.querySelectorAll('.alert');

        alerts.forEach(function (alert) {
            setTimeout(function () {
                alert.style.display = 'none';
            }, 5000);
        });
    });
</script>
@endsection
