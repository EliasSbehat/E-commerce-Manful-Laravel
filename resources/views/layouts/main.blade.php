<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">
 <meta http-equiv="X-UA-Compatible" content="ie=edge">
 <title>@yield('title')</title>
    {{-- Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
 {{-- Font awesome cdn --}}
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- Scripts -->
  @vite(['resources/css/app.css', 'resources/js/app.js' , 'resources/js/custom.js'])
  {{-- Paypal SDK --}}
  <script src="https://www.paypal.com/sdk/js?client-id=test&currency=USD&components=buttons"></script>
</head>
<body class="h-screen">

  <!-- Navbar start-->
    <div class="nav bg-white font-dancing">
      <nav class="flex justify-between items-center h-20">
        <!-- Logo -->
        <div class="flex items-center ml-8 text-3xl font-bold">
         <a href="{{route('home')}}" class="">ManFul</a>
         <ul
           class="pl-10 space-x-5 lg:space-x-12 text-lg font-semibold outline-none items-center hidden md:flex"
         >
           <li class="">
             <a href="{{route('home')}}">Home</a>
           </li>
           <li class="">
             <a href="{{route('shop')}}">Shop</a>
           </li>
           <li class="">
             <a href="#about">About</a>
           </li>
         </ul>
        </div>
        <!-- Nav Items -->
        {{-- Search ,dropdown and cart --}}
        <ul class="flex items-center md:space-x-5 mr-6">
          <!-- Mobile Hamburger icon -->
          <li class="md:hidden mr-10" id="btnMobile">
            <a href="#" class="text-2xl"><i class="fa-solid fa-bars"></i></a>
          </li>

          {{-- Search --}}
          <div class="hidden  md:block">
              <form action="{{route('search')}}" method="GET" role="search">
                 <input type="search" name="search" id="" class="h-8 md:w-44 lg:w-52 rounded shadow-md border-gray-300 focus:border-gray-300 focus:ring focus:ring-gray-200" placeholder="Search...">
                   <button type="submit" class="bg-black text-white px-2 lg:px-3 py-1 -ml-1 h-8 shadow-md"><i class="fa fa-search"></i></button>
              </form>
          </div>
  
    {{-- Dropdown --}}
    <div class="hidden md:flex md:items-center md:ml-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="flex items-center justify-center text-lg font-medium drop-shadow-lg w-24  focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                         
                            <div class="flex">
                              <svg aria-hidden="true" class=" flex-shrink-0 w-6 h-6 text-amber-800 transition duration-75" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path></svg>
                              @guest
                            Guest
                       @endguest
                       @auth
                        {{auth()->user()->name}}   
                       @endauth 
                            </div>

                            <div class="ml-1">
                                <svg class="fill-current h-4 w-4 ml-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                      @if(Auth::user())
                      <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                 <button type="submit" class="text-center w-full bg-black text-white px-2 py-2 rounded shadow-sm text-md hover:bg-yellow-900 transition">Log out</button>
                            </x-dropdown-link>
                        </form>
                      @else
                       <x-dropdown-link :href="route('login')">
                      <button type="submit" class="text-center w-full bg-black text-white px-2 py-2 rounded shadow-sm text-md hover:bg-yellow-900 transition">Sign In</button>
                     </x-dropdown-link>
                      @endif

                     <x-dropdown-link :href="route('account')">
                      <button class="flex items-end" type="submit">
                       <svg aria-hidden="true" class="mr-1 flex-shrink-0 w-6 h-6 text-amber-500 transition duration-75" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path></svg>
                       My Account 
                      </button>
                     </x-dropdown-link>
                     <x-dropdown-link :href="route('orders')">
                       <button class="flex items-end" type="submit">
                       <svg aria-hidden="true" class="mr-1 flex-shrink-0 w-6 h-6 text-green-500 transition duration-75" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 2a4 4 0 00-4 4v1H5a1 1 0 00-.994.89l-1 9A1 1 0 004 18h12a1 1 0 00.994-1.11l-1-9A1 1 0 0015 7h-1V6a4 4 0 00-4-4zm2 5V6a2 2 0 10-4 0v1h4zm-6 3a1 1 0 112 0 1 1 0 01-2 0zm7-1a1 1 0 100 2 1 1 0 000-2z" clip-rule="evenodd"></path></svg>
                       Orders
                      </button>
                     </x-dropdown-link>
                     
                    </x-slot>
                    
                </x-dropdown>
            </div>

          {{-- Cart --}}
          <li title="Cart">
            <a href="{{route('cart.list')}}"
              ><i class="fa-solid fa-cart-shopping text-2xl"></i>
              <span
                class="absolute top-4 right-3 w-5 h-5 text-sm bg-green-600 rounded-full text-center text-white animate-pulse"
                >{{ Cart::getContent()->count() }}</span
              >
            </a>
          </li>
        </ul>
      </nav>
    </div>

    <!-- Mobile navigation -->
    <div
      class="md:invisible fixed right-0 bg-black text-white w-60 h-96 z-50 translate-x-64 transition-transform shadow-md  pt-4"
     id="mobileNav"
      >
    <nav>
      <ul class="pt-5 pl-4 text-lg font-dancing">
        <a href="{{route('account')}}" class="focus:font-bold "><li class="py-2 border-b border-white">
          <svg aria-hidden="true" class="inline mr-1 flex-shrink-0 w-6 h-6 text-amber-800 transition duration-75" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path></svg>
          My Profile
         </li></a>
        <a href="{{route('home')}}" class="focus:font-bold"><li class="py-2 border-b border-white">
          <svg class="inline flex-shrink-0 w-6 h-6 mr-1 text-teal-600" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path></svg>
          Home
        </li></a>
        <a href="{{route('shop')}}" class="focus:font-bold"><li class="py-2 border-b border-white">
              <svg aria-hidden="true" class="inline mr-1 flex-shrink-0 w-6 h-6 text-amber-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M5 3a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2V5a2 2 0 00-2-2H5zM5 11a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2v-2a2 2 0 00-2-2H5zM11 5a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V5zM11 13a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>
          Shop
        </li></a>
        <a href="{{route('orders')}}" class="focus:font-bold"><li class="py-2 border-b border-white">
          <svg aria-hidden="true" class="mr-1 flex-shrink-0 w-6 h-6 text-green-500 transition duration-75 inline" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 2a4 4 0 00-4 4v1H5a1 1 0 00-.994.89l-1 9A1 1 0 004 18h12a1 1 0 00.994-1.11l-1-9A1 1 0 0015 7h-1V6a4 4 0 00-4-4zm2 5V6a2 2 0 10-4 0v1h4zm-6 3a1 1 0 112 0 1 1 0 01-2 0zm7-1a1 1 0 100 2 1 1 0 000-2z" clip-rule="evenodd"></path></svg>
          Orders
        </li></a>
        @if (Auth::user())
        <form action="{{route('logout')}}" method="POST">
          @csrf
          
          <li class="py-2 border-b border-white">
              <button type="submit" class="focus:font-bold w-full text-start">
          <svg aria-hidden="true" class="inline mr-1 flex-shrink-0 w-6 h-6 text-rose-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 3a1 1 0 00-1 1v12a1 1 0 102 0V4a1 1 0 00-1-1zm10.293 9.293a1 1 0 001.414 1.414l3-3a1 1 0 000-1.414l-3-3a1 1 0 10-1.414 1.414L14.586 9H7a1 1 0 100 2h7.586l-1.293 1.293z" clip-rule="evenodd"></path></svg>
            Log Out
          </button>
          </li>
        </form>
         @else   
         <a href="{{route('login')}}" class="focus:font-bold"><li class="py-2 border-b border-white">
          <svg aria-hidden="true" class="inline mr-1 flex-shrink-0 w-6 h-6 text-rose-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 3a1 1 0 00-1 1v12a1 1 0 102 0V4a1 1 0 00-1-1zm10.293 9.293a1 1 0 001.414 1.414l3-3a1 1 0 000-1.414l-3-3a1 1 0 10-1.414 1.414L14.586 9H7a1 1 0 100 2h7.586l-1.293 1.293z" clip-rule="evenodd"></path></svg>
          Sign In
        </li></a>
        @endif
      </ul>
    </nav>
  </div>
    <!-- Navbar end -->

 @yield('content')
 
 {{-- Footer --}}
    <section class="flex flex-col h-60 font-dancing border-t-2 border-white text-white bg-black w-full">
     <div class="h-full w-full text-center">
       <div class="mt-5">
        <ul class="flex justify-center pt-6 space-x-4 md:space-x-6 lg:space-x-12">
          <a href="{{route('orders')}}"><li>Orders</li></a>
          <a href="{{route('account')}}"><li>Account</li></a>
          <a href="{{route('shop')}}"><li>Shop</li></a>
        </ul>
       </div>
      <h2 class="text-5xl font-bold mt-5">ManFul</h2>
      <p class="pt-2">&copy; Copyright, 2022.</p>
     </div>
    </section>
      <!-- Footer -->
    @yield('scripts')
</body>
</html>