<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Apprentice</title>
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        @vite('resources/css/app.css')
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link rel="icon" href="{{asset('images/favicon.ico')}}">

        <script src="https://kit.fontawesome.com/8db89cc63d.js" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://code.highcharts.com/highcharts.js"></script>
        <script src="https://code.highcharts.com/highcharts-more.js"></script>
        <script src="https://code.highcharts.com/modules/exporting.js"></script>
        <script src="https://code.highcharts.com/modules/export-data.js"></script>

        @vite('resources/js/calender.js')

        <link href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/5.10.1/main.min.css" rel="stylesheet">
    </head>
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
                        <a href="{{ route('admin.dashboard') }}" class="text-slate-400 hover:text-slate-100 py-3 flex items-center transition duration-300 ease-in-out navLinks"> <i class="fa fa-dashboard px-1"></i> Dashboard</a>
                    </li>
                    <li>
                        <a href="{{ route('admin.students') }}" class="text-slate-400 hover:text-slate-100 py-3 flex items-center transition duration-300 ease-in-out navLinks"> <i class="fa fa-user-graduate px-1"></i> Students</a>
                    </li>
                    <li>
                        <a href="{{ route('admin.inquiries') }}" class="text-slate-400 hover:text-slate-100 py-3 flex items-center transition duration-300 ease-in-out navLinks"> <i class="fa fa-clipboard-question px-1"></i> Inquiries</a>
                    </li>
                    <li>
                        <a href="{{ route('admin.payments') }}" class="text-slate-400 hover:text-slate-100 py-3 flex items-center transition duration-300 ease-in-out navLinks"> <i class="fa fa-money-bill-1-wave px-1"></i> Payments</a>
                    </li>
                    <li>
                        <a href="{{ route('admin.courses') }}" class="text-slate-400 hover:text-slate-100 py-3 flex items-center transition duration-300 ease-in-out navLinks"><i class="fa fa-book px-1"></i>Courses</a>
                    </li>
                    <li>
                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();" class="text-slate-400 hover:text-slate-100 py-3 flex items-center transition duration-300 ease-in-out navLinks"><i class="fa fa-sign-out"></i>{{ __('Logout') }}</a>
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
                <li><i class="far fa-comment"></i></li>
                <li><i class="far fa-bell"></i></li>
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
