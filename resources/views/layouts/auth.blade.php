<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apprentice</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    @vite('resources/css/app.css')
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="icon" href="{{asset('images/favicon.ico')}}">
</head>
<body class="bg-purple-100 font-sans">

    <main class="h-full bg-purple-100">
        @yield('content')

        <div class="rounded-md mt-5 mx-auto lg:mx-20 w-full lg:w-3/4 px-5 py-2 lg:px-10 lg:py-4 bg-black text-white lg:ml-120">
            Registerations for the year 2024 are closing, kindly register. <span class="hidden lg:inline">Important!!</span>
            @if(Request::is('login'))
                <button class="btn btn-dark rounded-md ml-3 mx-5 lg:ml-0 lg:mt-0 px-3" style="border-radius: 25px; border: 2px solid lightgray;" onclick="window.location.href = '{{ route('register') }}'">Register</button>
            @else
                <button class="btn btn-dark rounded-md ml-3 mx-5 lg:ml-0 lg:mt-0 px-5" style="border-radius: 25px; border: 2px solid lightgray;" onclick="window.location.href = '{{ route('login') }}'">Login</button>
            @endif
        </div>


    </main>

</body>
</html>
