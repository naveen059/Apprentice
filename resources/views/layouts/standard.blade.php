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

        @vite('resources/js/app.js')

        <script src="https://kit.fontawesome.com/8db89cc63d.js" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <style type="text/css">
            .testimonial-slide {
                display: none;
                animation: fadeIn 2s ease forwards;
            }

            @keyframes fadeIn {
                from {
                    opacity: 0;
                }
                to {
                    opacity: 1;
                }
            }
        </style>
    </head>


<body>
    <div id="app">

        <nav class="bg-white dark:bg-gray-900 fixed w-full z-20 top-0 left-0">
        <div class="max-w-screen-xl flex items-center justify-between mx-auto mt-2">
            <a href="#" class="flex items-center space-x-3">
                <img src="{{ asset('images/apprentice-icon.png') }}" width="60px" height="60px" alt="Apprentice Icon">
                <span class="text-lg" style="font-family: 'Lato'; font-size: 28px;">Apprentice</span>
            </a>
            <div class="items-center hidden md:flex md:w-auto" id="navbar-sticky">
                <ul class="flex p-2 md:p-0 font-medium md:space-x-6">
                    <li>
                        <a href="#" class="block py-2 px-3 text-gray-900 rounded dark:text-black dark:hover:text-orange-600">Home</a>
                    </li>
                    <li>
                        <a href="#gallery" class="block py-2 px-3 text-gray-900 rounded dark:text-black dark:hover:text-orange-600">Gallery</a>
                    </li>
                    <li>
                        <a href="#services" class="block py-2 px-3 text-gray-900 rounded dark:text-black dark:hover:text-orange-600">Services</a>
                    </li>
                    <li>
                        <a href="#contact" class="block py-2 px-3 text-gray-900 rounded dark:text-black dark:hover:text-orange-600">Contact</a>
                    </li>
                </ul>
                @guest
                    <li style="list-style-type: none;">
                        <a class="block bg-navy px-4 py-1 mx-2 text-white bg-gray-700 rounded-full hover:bg-slate-500" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li style="list-style-type: none;">
                            <a class="inline-block px-4 py-1 bg-blue-500 hover:bg-blue-400 text-white hover:bg-grey-100 rounded-full" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="relative" style="list-style-type: none;">
                        <a class="block px-4 py-2 border border-black rounded-full hover:bg-gray-200" href="#" onclick="toggleDropdown()">
                            {{ Auth::user()->name }}
                        </a>
                        <div class="absolute right-0 mt-2 bg-white rounded-md shadow-lg border border-gray-200" id="userDropdown" style="display: none;">
                            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();" class="block px-4 py-2 hover:bg-gray-100"><i class="fa fa-sign-out"></i>{{ __('Logout') }}</a>
                            <form id="frm-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest

            </div>
        </div>
    </nav>

    <div class="relative flex items-center justify-center">
        <img src="{{ asset('images/back.jpg') }}" class="absolute inset-0 w-full object-cover blur-xs z-0" alt="Background Image" style="top: 100px; height: 75vh;">
        <div class="mx-5 w-2/5 bg-blue-950 p-8 border shadow-md z-10" style="margin-top: 110px;">
            <h2 class="text-orange-600 font-bold mb-0 text-center" style="font-size: 24px;">Enquire Now</h2>
                <form action="{{ route('submit_enquiry') }}" method="POST">
                    @csrf

                    <div class="mb-6">
                        <h3 class="text-lg font-semibold mb-2 text-white">Personal Information</h3>
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label for="name" class="block mb-1 text-white">Name:</label>
                                <input type="text" id="name" name="name" placeholder="Your Name" class="border rounded-md p-2 w-full">
                            </div>
                            <div>
                                <label for="contact_number" class="block mb-1 text-white">Contact Number:</label>
                                <input type="tel" id="contact_number" name="contact_number" placeholder="Contact Number" class="border rounded-md p-2 w-full">
                            </div>
                            <div class="mb-4">
                                <label for="parent_name" class="block mb-1 text-white">Parent's Name:</label>
                                <input type="text" id="parent_name" name="parent_name" placeholder="Parent's Name" class="border rounded-md p-2 w-full">
                            </div>
                            <div>
                                <label for="email" class="block mb-1 text-white">Email Address:</label>
                                <input type="email" id="email" name="email" placeholder="Email Address" class="border rounded-md p-2 w-full">
                            </div>
                            <div class="mb-4">
                                <label for="course_grade" class="block mb-1 text-white">Course/Grade:</label>
                                <select id="course_grade" name="course_grade" class="border rounded-md p-2 w-3/4">
                                    <option value="prekg">Pre-KG</option>
                                    <option value="ukg">UKG</option>
                                    <option value="lkg">LKG</option>
                                    <option value="grade1">Grade 1</option>
                                    <option value="grade2">Grade 2</option>
                                    <option value="grade3">Grade 3</option>
                                    <option value="grade4">Grade 4</option>
                                    <option value="grade5">Grade 5</option>
                                    <option value="grade6">Grade 6</option>
                                </select>
                            </div>
                            <div class="mb-6 mt-4">
                                <label for="answer" class="inline mb-1 text-white" id="question"></label>
                                <input type="text" id="answer" name="answer" class="border rounded-md p-1 w-1/4">
                                <button onclick="verifyAnswer()" class="bg-slate-100 py-1 px-2 rounded-md text-gray-900 hover:bg-gray-400">Submit</button>
                                <span id="verification"></span>
                            </div>


                            <div class="mb-4">
                                <button type="submit" class="bg-red-500 text-white py-2 px-4 rounded-md">Submit</button>
                            </div>

                        </div>
                        
                    </div>

                    
                </form>
        </div>
        <div class="mx-5 w-2/5 p-8 z-10">
            <h2 class="text-lg font-bold mb-4 text-slate-100" style="font-size: 32px;">"Where <span class="font-serif text-orange-600">Curiosity</span> Meets <span class="font-serif text-blue-700">Education</span>"</h2>
            <p class="text-slate-100 bg-purple-300 p-3">"we believe that education is about nurturing a child's natural curiosity and igniting a lifelong passion for learning. Our innovative curriculum is designed to create a dynamic learning environment where students are encouraged to explore, question, and discover.  Join us on a journey where curiosity meets education, and together, let's inspire a brighter future for our children."</p>
        </div>
    </div>

        
        <main class="py-4">
            @yield('content')
        </main>
    </div>


    <section id="services" class="bg-gray-100 mt-5 dark:bg-gray-800 py-12 mx-5 px-4">
        <div class="container mx-auto">
            <h2 class="text-3xl font-semibold text-center tracking-tight text-gray-800 dark:text-white mb-8">Services</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Service Card 1 -->
                <div class="bg-white dark:bg-gray-900 shadow-md rounded-lg p-6 flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-primary-500 mr-4" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 3a2 2 0 0 1 2 2v1h4.5a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5H4a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5H8V5a2 2 0 0 1 2-2zM4 9h12v6a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V9z"/>
                    </svg>
                    <span class="text-lg font-medium text-gray-800 dark:text-white">Library</span>
                </div>

                <!-- Service Card 2 -->
                <div class="bg-white dark:bg-gray-900 shadow-md rounded-lg p-6 flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-primary-500 mr-4" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M3 7a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V7zm0-2a3 3 0 0 0-3 3v8a3 3 0 0 0 3 3h12a3 3 0 0 0 3-3V8a3 3 0 0 0-3-3H3z"/>
                        <path d="M10 13a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm0-4a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
                    </svg>
                    <span class="text-lg font-medium text-gray-800 dark:text-white">Sports Facilities</span>
                </div>

                <div class="bg-white dark:bg-gray-900 shadow-md rounded-lg p-6 flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-primary-500 mr-4" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M10 2a8 8 0 1 0 0 16 8 8 0 0 0 0-16zM9 12V9h2v3h3v2h-3v3h-2v-3H6v-2h3z"/>
                    </svg>
                    <span class="text-lg font-medium text-gray-800 dark:text-white">Computer Lab</span>
                </div>

                <div class="bg-white dark:bg-gray-900 shadow-md rounded-lg p-6 flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-primary-500 mr-4" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 2a8 8 0 1 0 0 16 8 8 0 0 0 0-16zM5 11a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm5 4.464l-2.08-2.082a3.5 3.5 0 1 1 4.132 0L15 15.464A6 6 0 0 1 10 18a6 6 0 0 1-5-2.536zM6.414 9.293a3.5 3.5 0 1 1 4.172 0L10 10.172l-.586-.586a3.5 3.5 0 0 1-1.414 0l-.586.586zM5 13.535V11a1 1 0 0 1 1-1h2.536l.586-.586a3.5 3.5 0 0 1 1.414 0l.586.586H15a1 1 0 0 1 1 1v2.536l.586.586a3.5 3.5 0 0 1 0 1.414l-.586.586V18a1 1 0 0 1-1 1h-2.536l-.586.586a3.5 3.5 0 0 1-1.414 0l-.586-.586H6a1 1 0 0 1-1-1v-2.465l-.586-.586a3.5 3.5 0 0 1 0-1.414l.586-.586z"/>
                                </svg>
                                <span class="text-lg font-medium text-gray-800 dark:text-white">Science Lab</span>
                            </div>

                            <!-- Service Card 5: Music Room -->
                            <div class="bg-white dark:bg-gray-900 shadow-md rounded-lg p-6 flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-primary-500 mr-4" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 2a8 8 0 1 0 0 16 8 8 0 0 0 0-16zM9 5.879a1 1 0 1 1 1.292-1.292l4 3a1 1 0 0 1 0 1.414l-4 3A1 1 0 0 1 9 11.121V8H5a1 1 0 0 1-1-1V6a1 1 0 0 1 1-1h4v-.121zM6 11v4h8v-4H6z"/>
                                </svg>
                                <span class="text-lg font-medium text-gray-800 dark:text-white">Music Room</span>
                            </div>

                            <!-- Service Card 6: Art Studio -->
                            <div class="bg-white dark:bg-gray-900 shadow-md rounded-lg p-6 flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-primary-500 mr-4" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M15 2v4h3l-3 3v3h-4l-3-3H2V5h3L5 2h4l3 3h3zM8 7v2H5V7h3zm-3 8v-2h3v2H5zm5 0v-2h3v2h-3zm-5 0v-2h3v2H5zm10-2v-1h-2v1h2zm-4-7V7h3v2h-3z"/>
                                </svg>
                                <span class="text-lg font-medium text-gray-800 dark:text-white">Art Studio</span>
                            </div>
            </div>
        </div>
    </section>


    <div id="gallery" class="mx-auto max-w-screen-lg">
        <h2 class="mb-4 mt-5 text-4xl tracking-tight uppercase text-center font-bold text-gray-900 dark:text-white">gallery</h2>

        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
            <div class="grid gap-4">
                <div>
                    <img class="h-auto max-w-full rounded-lg" src="https://source.unsplash.com/400x300/?student" alt="Student photo">
                </div>
                <div>
                    <img class="h-auto max-w-full rounded-lg" src="https://source.unsplash.com/400x300/?school" alt="School photo">
                </div>
                <div>
                    <img class="h-auto max-w-full rounded-lg" src="https://source.unsplash.com/400x300/?education" alt="Education photo">
                </div>
            </div>
            <div class="grid gap-4">
                <div>
                    <img class="h-auto max-w-full rounded-lg" src="https://source.unsplash.com/400x300/?classroom" alt="Classroom photo">
                </div>
                <div>
                    <img class="h-auto max-w-full rounded-lg" src="https://source.unsplash.com/400x300/?students" alt="Students photo">
                </div>
                <div>
                    <img class="h-auto max-w-full rounded-lg" src="https://source.unsplash.com/400x300/?learn" alt="Learning photo">
                </div>
            </div>
            <div class="grid gap-4">
                <div>
                    <img class="h-auto max-w-full rounded-lg" src="https://source.unsplash.com/400x300/?study" alt="Study photo">
                </div>
                <div>
                    <img class="h-auto max-w-full rounded-lg" src="https://source.unsplash.com/400x300/?reading" alt="Reading photo">
                </div>
                <div>
                    <img class="h-auto max-w-full rounded-lg" src="https://source.unsplash.com/400x300/?library" alt="Library photo">
                </div>
            </div>
            <div class="grid gap-4">
                <div>
                    <img class="h-auto max-w-full rounded-lg" src="https://source.unsplash.com/400x300/?knowledge" alt="Knowledge photo">
                </div>
                <div>
                    <img class="h-auto max-w-full rounded-lg" src="https://source.unsplash.com/400x300/?smart" alt="Smart photo">
                </div>
                <div>
                    <img class="h-auto max-w-full rounded-lg" src="https://source.unsplash.com/400x300/?intelligence" alt="Intelligence photo">
                </div>
            </div>
        </div>
    </div>


    <div class="mx-auto max-w-screen-sm">
        <h2 class="mb-4 mt-5 py-3 text-4xl tracking-tight text-center font-bold text-gray-900 dark:text-white">Testimonials</h2>
        <p class="mb-2 font-light text-gray-500 lg:mb-16 text-center sm:text-xl dark:text-gray-400">What our students and parents say about us</p>
    </div>

    <div class="max-w-screen-xl mx-auto px-4 py-4">
        <div class="flex flex-wrap justify-center">
            <div class="testimonial-slide mx-2">
                <figure class="max-w-screen-md mx-auto text-center bg-yellow-100 p-6 rounded-lg shadow-md">
                    <svg class="h-12 mx-auto mb-3 text-gray-400 dark:text-gray-600" viewBox="0 0 24 27" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M14.017 18L14.017 10.609C14.017 4.905 17.748 1.039 23 0L23.995 2.151C21.563 3.068 20 5.789 20 8H24V18H14.017ZM0 18V10.609C0 4.905 3.748 1.038 9 0L9.996 2.151C7.563 3.068 6 5.789 6 8H9.983L9.983 18L0 18Z" fill="currentColor"/>
                        </svg>
                    <blockquote class="text-gray-900">
                        <p class="text-2xl font-medium mb-4">"Our experience with the school has been exceptional. The teachers are dedicated, and the curriculum is well-rounded, providing our child with a holistic education."</p>
                    </blockquote>
                    <figcaption class="flex items-center justify-center mt-4">
                        <img class="w-12 h-12 rounded-full mr-4" src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/avatars/michael-gouch.png" alt="profile picture">
                        <div>
                            <div class="text-gray-900 font-medium">Harman Gupta</div>
                            <div class="text-sm text-gray-600">Parent of Manav</div>
                        </div>
                    </figcaption>
                </figure>
            </div>
            
            <div class="testimonial-slide mx-2">
                <figure class="max-w-screen-md mx-auto text-center bg-purple-100 p-6 rounded-lg shadow-md">
                    <svg class="h-12 mx-auto mb-3 text-gray-400 dark:text-gray-600" viewBox="0 0 24 27" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M14.017 18L14.017 10.609C14.017 4.905 17.748 1.039 23 0L23.995 2.151C21.563 3.068 20 5.789 20 8H24V18H14.017ZM0 18V10.609C0 4.905 3.748 1.038 9 0L9.996 2.151C7.563 3.068 6 5.789 6 8H9.983L9.983 18L0 18Z" fill="currentColor"/>
                    </svg>
                    <blockquote class="text-gray-900">
                        <p class="text-2xl font-medium mb-4">"My child's experience at the school has been wonderful. The supportive environment, dedicated teachers, and engaging curriculum have helped my child excel both academically and socially."</p>
                    </blockquote>
                    <figcaption class="flex items-center justify-center mt-4">
                        <img class="w-12 h-12 rounded-full mr-4" src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/avatars/karen-nelson.png">
                        <div>
                            <div class="text-gray-900 font-medium">Jessica White</div>
                            <div class="text-sm text-gray-600">Parent of Emily</div>
                        </div>
                    </figcaption>
                </figure>
            </div>

        </div>
    </div>

    <section id="contact" class="max-w-screen-full bg-slate-100 dark:bg-gray-900">
        <div class="py-8 lg:py-16 px-4 max-w-screen-full flex flex-col lg:flex-row items-center lg:items-stretch">
            <div class="w-1/4 mx-5 lg:w-1/2 lg:pr-2">
                <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-center lg:text-left text-gray-900 dark:text-white">Contact Us</h2>
                <p class="mb-8 lg:mb-16 font-light text-center lg:text-left text-gray-500 dark:text-gray-400 sm:text-xl">Got a query for us? Want to send feedback about our school? Need details about our course content? Let us know.</p>
                <form action="{{ route('messages.store')}}" method="POST" class="space-y-8">
                    @csrf
                    <div>
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Your email</label>
                        <input type="email" id="email" name="email" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 dark:shadow-sm-light" placeholder="name@example.com" required>
                    </div>
                    <div>
                        <label for="subject" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Subject</label>
                        <input type="text" id="subject" name="subject" class="block p-3 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 shadow-sm focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 dark:shadow-sm-light" placeholder="Let us know how we can help you" required>
                    </div>
                    <div class="sm:col-span-2">
                        <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Your message</label>
                        <textarea id="message" name="message" rows="6" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg shadow-sm border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Leave a comment..."></textarea>
                    </div>
                    <button type="submit" class="py-3 px-5 text-sm font-medium text-center text-white rounded-lg bg-primary-700 sm:w-fit hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Send message</button>
                </form>

            </div>
            <div class="w-full lg:w-2/3 lg:pl-8 mt-8 lg:mt-0">
                <div class="bg-cover bg-center h-full rounded-lg" style="background-image: url('https://source.unsplash.com/400x600/?books')"></div>
            </div>
        </div>
    </section>







    <footer class="bg-slate-900 text-white dark:bg-gray-900">
        <div class="mx-auto w-full max-w-screen-xl p-4 py-6 lg:py-8">
            <div class="md:flex md:justify-between">
              <div class="mb-6 md:mb-0">
                  <a href="/" class="flex items-center">
                      <img src="{{asset('images/apple-touch-icon.png')}}" class="h-8 w-10 me-3" alt="FlowBite Logo" />
                      <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Apprentice</span>
                  </a>
              </div>
              <div class="grid grid-cols-2 gap-8 sm:gap-6 sm:grid-cols-3">
                  <div>
                      <h2 class="mb-6 text-sm font-semibold text-slate-100uppercase dark:text-white">Resources</h2>
                      <ul class="text-gray-500 dark:text-gray-400 font-medium">
                          <li class="mb-4">
                              <a href="#" class="hover:underline">Blogs</a>
                          </li>
                          <li>
                              <a href="#" class="hover:underline">News Letter</a>
                          </li>
                      </ul>
                  </div>
                  <div>
                      <h2 class="mb-6 text-sm font-semibold text-slate-100 uppercase dark:text-white">Follow us</h2>
                      <ul class="text-gray-500 dark:text-gray-400 font-medium">
                          <li class="mb-4">
                              <a href="https://github.com/" class="hover:underline ">Github</a>
                          </li>
                          <li>
                              <a href="https://discord.gg/" class="hover:underline">Discord</a>
                          </li>
                      </ul>
                  </div>
                  <div>
                      <h2 class="mb-6 text-sm font-semibold text-slate-100 uppercase dark:text-white">Legal</h2>
                      <ul class="text-gray-500 dark:text-gray-400 font-medium">
                          <li class="mb-4">
                              <a href="#" class="hover:underline">Privacy Policy</a>
                          </li>
                          <li>
                              <a href="#" class="hover:underline">Terms &amp; Conditions</a>
                          </li>
                      </ul>
                  </div>
              </div>
          </div>
          <hr class="my-6 border-gray-200 sm:mx-auto dark:border-gray-700 lg:my-8" />
          <div class="sm:flex sm:items-center sm:justify-between">
              <span class="text-sm text-gray-500 sm:text-center dark:text-gray-400">© 2024 <a href="https://flowbite.com/" class="hover:underline">Apprentice™</a>. All Rights Reserved.
              </span>
              <div class="flex mt-4 sm:justify-center sm:mt-0">
                  <a href="#" class="text-gray-500 hover:text-slate-100 dark:hover:text-white">
                      <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 8 19">
                            <path fill-rule="evenodd" d="M6.135 3H8V0H6.135a4.147 4.147 0 0 0-4.142 4.142V6H0v3h2v9.938h3V9h2.021l.592-3H5V3.591A.6.6 0 0 1 5.592 3h.543Z" clip-rule="evenodd"/>
                        </svg>
                      <span class="sr-only">Facebook page</span>
                  </a>
                  <a href="#" class="text-gray-500 hover:text-slate-100 dark:hover:text-white ms-5">
                      <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 21 16">
                            <path d="M16.942 1.556a16.3 16.3 0 0 0-4.126-1.3 12.04 12.04 0 0 0-.529 1.1 15.175 15.175 0 0 0-4.573 0 11.585 11.585 0 0 0-.535-1.1 16.274 16.274 0 0 0-4.129 1.3A17.392 17.392 0 0 0 .182 13.218a15.785 15.785 0 0 0 4.963 2.521c.41-.564.773-1.16 1.084-1.785a10.63 10.63 0 0 1-1.706-.83c.143-.106.283-.217.418-.33a11.664 11.664 0 0 0 10.118 0c.137.113.277.224.418.33-.544.328-1.116.606-1.71.832a12.52 12.52 0 0 0 1.084 1.785 16.46 16.46 0 0 0 5.064-2.595 17.286 17.286 0 0 0-2.973-11.59ZM6.678 10.813a1.941 1.941 0 0 1-1.8-2.045 1.93 1.93 0 0 1 1.8-2.047 1.919 1.919 0 0 1 1.8 2.047 1.93 1.93 0 0 1-1.8 2.045Zm6.644 0a1.94 1.94 0 0 1-1.8-2.045 1.93 1.93 0 0 1 1.8-2.047 1.918 1.918 0 0 1 1.8 2.047 1.93 1.93 0 0 1-1.8 2.045Z"/>
                        </svg>
                      <span class="sr-only">Discord community</span>
                  </a>
                  <a href="#" class="text-gray-500 hover:text-slate-100 dark:hover:text-white ms-5">
                      <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 17">
                        <path fill-rule="evenodd" d="M20 1.892a8.178 8.178 0 0 1-2.355.635 4.074 4.074 0 0 0 1.8-2.235 8.344 8.344 0 0 1-2.605.98A4.13 4.13 0 0 0 13.85 0a4.068 4.068 0 0 0-4.1 4.038 4 4 0 0 0 .105.919A11.705 11.705 0 0 1 1.4.734a4.006 4.006 0 0 0 1.268 5.392 4.165 4.165 0 0 1-1.859-.5v.05A4.057 4.057 0 0 0 4.1 9.635a4.19 4.19 0 0 1-1.856.07 4.108 4.108 0 0 0 3.831 2.807A8.36 8.36 0 0 1 0 14.184 11.732 11.732 0 0 0 6.291 16 11.502 11.502 0 0 0 17.964 4.5c0-.177 0-.35-.012-.523A8.143 8.143 0 0 0 20 1.892Z" clip-rule="evenodd"/>
                    </svg>
                      <span class="sr-only">Twitter page</span>
                  </a>
                  <a href="#" class="text-gray-500 hover:text-slate-100 dark:hover:text-white ms-5">
                      <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 .333A9.911 9.911 0 0 0 6.866 19.65c.5.092.678-.215.678-.477 0-.237-.01-1.017-.014-1.845-2.757.6-3.338-1.169-3.338-1.169a2.627 2.627 0 0 0-1.1-1.451c-.9-.615.07-.6.07-.6a2.084 2.084 0 0 1 1.518 1.021 2.11 2.11 0 0 0 2.884.823c.044-.503.268-.973.63-1.325-2.2-.25-4.516-1.1-4.516-4.9A3.832 3.832 0 0 1 4.7 7.068a3.56 3.56 0 0 1 .095-2.623s.832-.266 2.726 1.016a9.409 9.409 0 0 1 4.962 0c1.89-1.282 2.717-1.016 2.717-1.016.366.83.402 1.768.1 2.623a3.827 3.827 0 0 1 1.02 2.659c0 3.807-2.319 4.644-4.525 4.889a2.366 2.366 0 0 1 .673 1.834c0 1.326-.012 2.394-.012 2.72 0 .263.18.572.681.475A9.911 9.911 0 0 0 10 .333Z" clip-rule="evenodd"/>
                      </svg>
                      <span class="sr-only">GitHub account</span>
                  </a>
                  
              </div>
          </div>
        </div>
    </footer>


    <script type="text/javascript">
         function toggleDropdown() {
            const dropdown = document.getElementById('userDropdown');
            dropdown.style.display = dropdown.style.display === 'none' ? 'block' : 'none';
        }

        
      function getRandomInt(min, max) {
          return Math.floor(Math.random() * (max - min + 1)) + min;
      }

          function getRandomOperation() {
              var operations = ['+', '-', '*', '/'];
              var randomIndex = getRandomInt(0, operations.length - 1);
              return operations[randomIndex];
          }

          function generateQuestion() {
              var num1 = getRandomInt(1, 20);
              var num2 = getRandomInt(1, 20);
              var operation = getRandomOperation();

              document.getElementById("question").textContent = num1 + " " + operation + " " + num2 + "?  ";
          }

          
          generateQuestion();

          function verifyAnswer() {
              var answer = document.getElementById("answer").value;
              var num1 = parseInt(document.getElementById("question").textContent.match(/\d+/g)[0]);
              var num2 = parseInt(document.getElementById("question").textContent.match(/\d+/g)[1]);
              var operation = document.getElementById("question").textContent.match(/[\+\-\*\/]/)[0];

              var result;
              switch (operation) {
                  case '+':
                      result = num1 + num2;
                      break;
                  case '-':
                      result = num1 - num2;
                      break;
                  case '*':
                      result = num1 * num2;
                      break;
                  case '/':
                      result = num1 / num2;
                      break;
              }

              if (parseInt(answer) === result) {
                  var verificationElement = document.getElementById("verification");
                  verificationElement.innerHTML = '<span class="inline">Correct<i class="fas fa-check-circle text-green-500 mx-3"></i></span>';
                  verificationElement.style.color = '#00ff00';
                  setTimeout(generateQuestion, 1000);
              } else {
                  var verificationElement = document.getElementById("verification");
                  verificationElement.innerHTML = '<span class="inline">Incorrect<i class="fas fa-times-circle text-red-500 mx-3"></i></span>';
                  verificationElement.style.color = '#ff0000';
              }

          }              
                    
    </script>

    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</body>


</html>
