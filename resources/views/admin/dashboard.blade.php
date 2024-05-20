@extends('layouts.admin')

@section('content')

<div class="container mx-auto px-4">
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
        <!-- Students Card -->
        <div class="bg-white rounded-lg shadow-md p-6">
            <h2 class="text-lg font-semibold mb-4">Students</h2>
            <div class="flex items-center">
                <i class="fa fa-user px-1"></i>
                <span class="text-xl font-bold">{{ $students->count() }}</span>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow-md p-6">
            <h2 class="text-lg font-semibold mb-4">Enquiries</h2>
            <div class="flex items-center">
                <i class="fa fa-question-circle px-1"></i>
                <span class="text-xl font-bold">{{ $inquiries->count() }}</span>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow-md p-6">
            <h2 class="text-lg font-semibold mb-4">Payments</h2>
            <div class="flex items-center">
                <i class="fa fa-handshake px-1"></i>
                <span class="text-xl font-bold">{{ $payments->count() }}</span>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mt-3">
        <div id="pieChartContainer" class="bg-white rounded-lg shadow-md p-6">
            <h2 class="text-lg font-semibold mb-4">Pie Chart</h2>
        </div>

        <div id="calendar" class="bg-white rounded-lg shadow-md p-6">
        </div>
    </div>

</div>






<script>
    Highcharts.chart('pieChartContainer', {
        chart: {
            type: 'pie',
            backgroundColor: null,
            borderWidth: 0,
            plotBackgroundColor: null,
            plotShadow: false,
            plotBorderWidth: null
        },
        title: {
            text: 'Student chart'
        },
        plotOptions: {
            pie: {
                innerSize: '60%',
                dataLabels: {
                    enabled: false
                },
                borderWidth: 0
            }
        },
        series: [{
            name: 'Activity',
            colorByPoint: true,
            data: [{
                name: 'Students',
                y: {{ $students->count() }},
                color: '#FF6384'
            }, {
                name: 'Enquiries',
                y: {{ $inquiries->count() }},
                color: '#36A2EB'
            }, {
                name: 'Payments',
                y: {{ $payments->count() }},
                color: '#FFCE56'
            }]
        }]
    });
</script>





<div class="flex justify-start px-4 py-5">
    <button id="toggleMessages" class="text-gray-500 focus:outline-none">
        <span class="bold">Messages</span>
        <i class="fas fa-chevron-down ml-1"></i>
    </button>
</div>



<div id="messagesContainer" class="hidden fixed top-0 right-0 h-3/4 rounded mt-32 overflow-y-auto bg-white border-l border-gray-200 z-10 w-full sm:w-auto">
    <div class="max-w-screen-sm mx-auto px-4 py-4">
        <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Messages</h2>
        
        @if($messages->isEmpty())
            <p class="text-gray-700 font-semibold text-center mt-20">No messages</p>
        @else
            <ul class="flow-root space-y-4">
                @foreach($messages->take(10) as $key => $message)
                    <li class="flex items-start space-x-4">
                        <div class="flex-shrink-0">
                            <img src="{{ asset('images/profile.png') }}" class="profile cursor-pointer" width="40px" height="40px" class="rounded-full border-indigo-700" alt="Profile Picture">
                        </div>
                        <div class="flex flex-col">
                            <div class="bg-gray-100 p-4 rounded-lg">
                                <p class="text-xs text-gray-500">{{ $message->email }}</p>
                                <h3 class="text-sm font-semibold text-gray-900 dark:text-white">{{ $message->subject }}</h3>
                                <p class="text-sm text-gray-700">{{ Str::limit($message->message, 50) }}</p>
                            </div>
                            <span class="text-xs text-gray-500">{{ $message->created_at->format('M d, Y') }}</span>
                        </div>
                    </li>
                @endforeach
            </ul>
        @endif
    </div>
</div>


<script>
    document.getElementById('toggleMessages').addEventListener('click', function() {
        var messagesContainer = document.getElementById('messagesContainer');
        messagesContainer.classList.toggle('hidden');

        var toggleIcon = document.getElementById('toggleIcon');
        toggleIcon.classList.toggle('rotate-90');
    });
</script>






@endsection
