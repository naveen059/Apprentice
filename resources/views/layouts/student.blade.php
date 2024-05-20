<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Apprentice</title>
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link rel="icon" href="{{asset('images/favicon.ico')}}">
        @vite('resources/css/app.css')

        <script src="https://kit.fontawesome.com/8db89cc63d.js" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <body class="flex">
        <nav class="w-1/6 bg-gray-700 border-r border-gray-300">
            <div class="sidebar-sticky flex flex-col mx-5 h-screen">
                <div class="flex items-center mt-3 mb-2">
                    <img src="{{ asset('images/apprentice-icon.png') }}" width="100px" height="100px" alt="Apprentice Icon">
                </div>
                <div class="d-block">
                    <div class="text-lg text-slate-100 font-bold mb-4">Apprentice</div>
                </div>

                <hr class="text-center w-full text-white mb-3">

                <ul class="flex flex-col space-y-2">
                    <li>
                        <a href="{{ route('student.dashboard') }}" class="text-slate-400 hover:text-slate-100 py-3 flex items-center transition duration-300 ease-in-out navLinks">
                            <i class="fas fa-tachometer-alt px-1"></i> Dashboard
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('student.createInquiry') }}" class="text-slate-400 hover:text-slate-100 py-3 flex items-center transition duration-300 ease-in-out navLinks">
                            <i class="fa fa-question-circle px-1" aria-hidden="true"></i></i> Make Inquiry
                        </a>
                    </li>



                    @if($inquiries)
                        @php
                            $latestEditableInquiry = $inquiries->where('operation', 'editable')->where('name', Auth::user()->name)->first();
                        @endphp

                        @if($latestEditableInquiry)
                            <li>
                                <a href="{{ route('student.editInquiry', ['id' => $latestEditableInquiry->id]) }}" class="text-slate-400 hover:text-slate-100 py-3 flex items-center transition duration-300 ease-in-out navLinks">
                                    <i class="fa-solid fa-pen-to-square px-1"></i> Edit Inquiry
                                </a>
                            </li>
                        @endif
                    @endif

                    

                    <li>
                        <a href="{{ route('courses.index') }}" class="text-slate-400 hover:text-slate-100 py-3 flex items-center transition duration-300 ease-in-out navLinks">
                            <i class="fas fa-book px-1"></i> Courses
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('student.makePayment') }}" class="text-slate-400 hover:text-slate-100 py-3 flex items-center transition duration-300 ease-in-out navLinks">
                            <i class="fas fa-money-bill-wave px-1"></i> Pay Now
                        </a>
                    </li>
                    
                    <li>
                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();" class="text-slate-400 hover:text-slate-100 py-3 flex items-center transition duration-300 ease-in-out navLinks">
                            <i class="fas fa-sign-out-alt px-1"></i> {{ __('Logout') }}
                        </a>
                        <form id="frm-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>

                </ul>
            </div>
        </nav>


        <main class="w-5/6 h-7/8 bg-gray-100">
            <div class="flex items-center justify-between rounded px-4 py-3 mt-2 mx-2 mb-3 w-full bg-white">
            <p class="text-gray-700 font-bold text-lg">Hello {{ Auth::user()->name }} </p>

            <div class="flex items-center rounded-full bg-gray-100 w-1/2">
                <input type="text" class="w-full bg-gray-100 rounded-full py-2 px-4 placeholder-gray-500" placeholder="Search...">
            </div>

            <ul class="flex items-center space-x-10">
                <li>
                    <i class="far fa-comment chat-icon cursor-pointer"></i>
                </li>

                <li><i class="far fa-bell notification-icon cursor-pointer"></i></li>
                <li class="relative">
                    <img src="{{ asset('images/profile.png') }}" class="profile cursor-pointer" width="40px" height="40px" class="rounded-full border-indigo-700" alt="Profile Picture">
                    <div id="profileDropdown" class="hidden absolute bg-white rounded-md shadow-md p-2 top-10 right-0 z-10">
                        <p class="font-semibold">{{ Auth::user()->name }}</p>
                        <p class="text-gray-700">{{ Auth::user()->email }}</p>
                    </div>
                </li>
            </ul>

        </div>

            @yield('content')
        </main>

        <script type="text/javascript">
            
            $(".profile").hover(function() {
                        $("#profileDropdown").removeClass("hidden");
                    }, function() {
                        $("#profileDropdown").addClass("hidden");
                    });

        </script>

        <script src="{{ asset('js/app.js') }}" defer></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    </body>


</html>
