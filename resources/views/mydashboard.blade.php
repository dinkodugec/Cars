<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">


        <!-- Scripts -->
        @vite('resources/js/app.js')
        @vite(['resources/css/app.css', 'resources/js/app.js'])
       
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            <nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
                <!-- Primary Navigation Menu -->
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="flex justify-between h-16">
                        <div class="flex">
                            <!-- Logo -->
                         {{--    <div class="shrink-0 flex items-center">
                                <a href="{{ route('dashboard') }}">
                                    <x-application-logo class="block h-10 w-auto fill-current text-gray-600" />
                                </a>
                            </div> --}}
            
                            <!-- Navigation Links -->
                            <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                                <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                                    {{ __('Create a Car') }}
                                </x-nav-link>
                            </div>
                            <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                                <x-nav-link :href="route('about')" :active="request()->routeIs('about')">
                                    {{ __('About') }}
                                </x-nav-link>
                            </div>
                            <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                                <x-nav-link :href="route('mydashboard')" :active="request()->routeIs('mydashboard')">
                                    {{ __('My Dashboard') }}
                                </x-nav-link>
                            </div>
                            <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                                <x-nav-link :href="route('about')" :active="request()->routeIs('about')">
                                    {{ __('All Cars') }}
                                </x-nav-link>
                            </div>
                            
                        </div>
            
                        <!-- Settings Dropdown -->
                        <div class="hidden sm:flex sm:items-center sm:ml-6">
                            <x-dropdown align="right" width="48">
                                <x-slot name="trigger">
                                    <button class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                                        <div> Hi {{ Auth::user()->name }}</div>
            
                                        <div class="ml-1">
                                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                    </button>
                                </x-slot>
            
                                <x-slot name="content">
                                    <!-- Authentication -->
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
            
                                        <x-dropdown-link :href="route('logout')"
                                                onclick="event.preventDefault();
                                                            this.closest('form').submit();">
                                            {{ __('Log Out') }}
                                        </x-dropdown-link>
                                    </form>
                                </x-slot>
                             
                            </x-dropdown>
                        </div>
            
                        <!-- Hamburger -->
                        <div class="-mr-2 flex items-center sm:hidden">
                            <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                                <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                    <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                                    <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            
                <!-- Responsive Navigation Menu -->
                <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
                    <div class="pt-2 pb-3 space-y-1">
                        <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                            {{ __('Dashboard') }}
                        </x-responsive-nav-link>
                    </div>
            
                    <!-- Responsive Settings Options -->
                    <div class="pt-4 pb-1 border-t border-gray-200">
                        <div class="px-4">
                            <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                            <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                        </div>
            
                        <div class="mt-3 space-y-1">
                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
            
                                <x-responsive-nav-link :href="route('logout')"
                                        onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-responsive-nav-link>
                            </form>
                        </div>
                    </div>
                </div>
            </nav>

            <!-- Page Heading -->
         
            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 text-gray-900">
                            <div class="row justify-content-center">
                                <div class="col-md-11">
                                    <div class="card">
                                        <div class="card-header">My Dashboard</div>
                        
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-9">
                                                    @foreach($user as $user)
                                                    <div class="card">
                                                        <div class="card-header">
                                                           Hello  {{ auth()->user()->name }}
                                                        </div>
                                                       
                                                      </div>
                                                      <div class="card">
                                                        <div class="card-header">
                                                            Your Motto
                                                        </div>
                                                        <div class="card-body">
                                                          <blockquote class="blockquote mb-0">
                                                            <p><p>{{ auth()->user()->motto ?? '' }}</p></p>
                                                            <footer class="blockquote-footer mt-2">Someone famous in <cite title="Source Title">Goodfather</cite></footer>
                                                          </blockquote>
                                                        </div>
                                                      </div>
                                                      <div class="card">
                                                        <div class="card-header">
                                                            Abbout Me
                                                        </div>
                                                        <div class="card-body">
                                                          <blockquote class="blockquote mb-0">
                                                            <p><p>{{ $user->about_me }}</p></p>
                                                         
                                                          </blockquote>
                                                        </div>
                                                      </div>
                                                 
                                                    @endforeach
                                                </div>
                                                <div class="col-md-3">
                                                    <img src="/img/users/{{$user->id}}_large.jpg" class="card-img" alt="{{ auth()->user()->name }}">
                                                </div>
                                             
                                                 @auth
                                                   <a class="btn btn-sm btn-light ml-2" href="/user/{{ $user->id }}/edit"><i class="fas fa-edit"></i> Edit profile</a>
                                                 @endauth
                                            </div>
                        
                        
                        
                                            @isset($cars)
                                            @if($cars->count() > 0)
                                                <h2 class="mt-4 mb-4">This is my cars</h3>
                                                @endif
                                            <ul class="list-group">
                                             
                                                @foreach($cars as $car)
                                                    <li class="list-group-item">
                                                        <h5 class="card-title">{{ $car->name }}</h5> 
                                                        <a title="Show Details" href="/car/{{ $car->id }}">
                                                            <img src="/img/cars/{{$car->id}}_thumb.jpg" alt="thumb"></a>
                                                            {{ $car->name }}
                                                        </a>
                                                        @auth
                                                            <a class="btn btn-sm btn-light ml-2" href="/car/{{ $car->id }}/edit"><i class="fas fa-edit"></i> Edit Car</a>
                                                        @endauth
                        
                                                        @auth
                                                            <form class="float-right" style="display: inline" action="/car/{{ $car->id }}" method="post">
                                                                @csrf
                                                                @method("DELETE")
                                                                <input class="btn btn-sm btn-outline-danger" type="submit" value="Delete">
                                                            </form>
                                                        @endauth
                                                        <span class="float-right mx-2">{{ $car->created_at->diffForHumans() }}</span>
                                                        <br>
                                                        @foreach($car->tags as $tag)
                                                            <a href="/car/tag/{{ $car->id }}"><span class="badge badge-{{ $tag->style }}">{{ $tag->name }}</span></a>
                                                        @endforeach
                                                    </li>
                                                @endforeach
                                              
                                            </ul>
                                            @endisset
                        
                                            <a class="btn btn-secondary btn-sm mt-4" href="/car/create"><i class="fas fa-plus-circle"></i> Create new Car</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                      
                    </div>
                </div>
            </div>
           
       

            <!-- Page Content -->
            <main>
            
            </main>
        </div>
    </body>
</html>


  