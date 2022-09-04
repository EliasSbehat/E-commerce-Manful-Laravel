<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
        {{-- Font awesome cdn --}}
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js' , 'resources/js/custom.js'])
    </head>
    <body class="font-sans antialiased">
        
 <div class="flex-col w-full md:flex md:flex-row md:min-h-screen overflow-x-hidden">
        <div @click.away="open = false" class="flex flex-col flex-shrink-0 w-full md:w-64  text-gray-200 bg-gray-800 md:fixed md:h-full " x-data="{ open: false }">
            <div class="flex flex-row items-center justify-between flex-shrink-0 px-8 py-4">
                <a href="#" class="text-lg font-semibold tracking-widest text-gray-900 uppercase rounded-lg dark:text-white focus:outline-none focus:shadow-outline">ManFul UI</a>
                <button class="rounded-lg md:hidden focus:outline-none focus:shadow-outline" @click="open = !open">
                    <svg fill="currentColor" viewBox="0 0 20 20" class="w-6 h-6">
                        <path x-show="!open" fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM9 15a1 1 0 011-1h6a1 1 0 110 2h-6a1 1 0 01-1-1z" clip-rule="evenodd"></path>
                        <path x-show="open" fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>
                <nav :class="{'block': open, 'hidden': !open}" class="flex-grow px-4 pb-4 md:block md:pb-0 md:overflow-y-auto">
                     <x-admin-nav-link :href="route('admin.index')" :active="request()->routeIs('admin.index')" class="flex items-center justify-between">
                        {{ __('Dashboard') }}
                         <svg aria-hidden="true" class="inline flex-shrink-0 w-6 h-6 text-gray-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path><path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path></svg>
                    </x-admin-nav-link>
                     <x-admin-nav-link :href="route('admin.users.index')" :active="request()->routeIs('admin.users*')" class="flex items-center justify-between">
                        {{ __('Users') }}
                         <svg aria-hidden="true" class="inline mr-1 flex-shrink-0 w-6 h-6 text-amber-800 transition duration-75" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path></svg>
                    </x-admin-nav-link>
                     <x-admin-nav-link :href="route('admin.categories.index')" :active="request()->routeIs('admin.categories*')" class="flex items-center justify-between">
                        {{ __('Categories') }}
                         <svg aria-hidden="true" class="inline flex-shrink-0 w-6 h-6 text-amber-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M5 3a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2V5a2 2 0 00-2-2H5zM5 11a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2v-2a2 2 0 00-2-2H5zM11 5a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V5zM11 13a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>
                    </x-admin-nav-link>
                     <x-admin-nav-link :href="route('admin.products.index')" :active="request()->routeIs('admin.products*')" class="flex items-center justify-between">
                           {{ __('Products') }}
                             <svg aria-hidden="true" class="inline flex-shrink-0 w-6 h-6 text-green-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 2a4 4 0 00-4 4v1H5a1 1 0 00-.994.89l-1 9A1 1 0 004 18h12a1 1 0 00.994-1.11l-1-9A1 1 0 0015 7h-1V6a4 4 0 00-4-4zm2 5V6a2 2 0 10-4 0v1h4zm-6 3a1 1 0 112 0 1 1 0 01-2 0zm7-1a1 1 0 100 2 1 1 0 000-2z" clip-rule="evenodd"></path></svg>
                    </x-admin-nav-link>
                    
                   <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-admin-nav-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();" class="block px-4 py-2 mt-2 text-lg font-semibold text-gray-900 bg-transparent rounded-lg dark:bg-transparent  hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" class="flex justify-between items-center">
                                {{ __('Log Out') }}
                                 <svg aria-hidden="true" class="inline flex-shrink-0 w-6 h-6 text-rose-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 3a1 1 0 00-1 1v12a1 1 0 102 0V4a1 1 0 00-1-1zm10.293 9.293a1 1 0 001.414 1.414l3-3a1 1 0 000-1.414l-3-3a1 1 0 10-1.414 1.414L14.586 9H7a1 1 0 100 2h7.586l-1.293 1.293z" clip-rule="evenodd"></path></svg>
                            </x-admin-nav-link>
                        </form>
                
                </nav>
        </div>
        <main class="p-8 m-2 w-full md:ml-72">
            {{$slot}}
        </main>
    </div>
    </body>
</html>
