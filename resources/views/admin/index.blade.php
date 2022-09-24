<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div>
        <div>
            <h5 class="text-blue-500 font-dancing text-3xl md:text-5xl py-2"><span id="greeting"></span>, {{auth()->user()->name}}</h5>
            <p class="font-dancing font-semibold">Here's what happening to your store</p>
        </div>
        <div class="container flex flex-col md:flex-row md:space-x-3 mt-4">

            <div class="mt-4 h-40 w-full mx-auto md:mx-0 md:w-1/3 bg-gradient-to-br from-cyan-700 to-cyan-400 text-white drop-shadow-xl pl-3 pt-3 rounded-lg hover:drop-shadow-2xl transition hover:scale-105">
                <a href="{{route('admin.orders.index')}}">
                    
                <h5 class="text-xl font-bold">Today's Pending Orders</h5>
                <div class="flex space-x-5 py-4">
                    <svg class="w-6 h-6 text-cyan-300" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path d="M24 0C10.7 0 0 10.7 0 24S10.7 48 24 48H76.1l60.3 316.5c2.2 11.3 12.1 19.5 23.6 19.5H488c13.3 0 24-10.7 24-24s-10.7-24-24-24H179.9l-9.1-48h317c14.3 0 26.9-9.5 30.8-23.3l54-192C578.3 52.3 563 32 541.8 32H122l-2.4-12.5C117.4 8.2 107.5 0 96 0H24zM176 512c26.5 0 48-21.5 48-48s-21.5-48-48-48s-48 21.5-48 48s21.5 48 48 48zm336-48c0-26.5-21.5-48-48-48s-48 21.5-48 48s21.5 48 48 48s48-21.5 48-48z"/></svg>
                    <p class="text-xl font-bold pr-10 text-cyan-200">{{$pendingOrders->count()}}</p>
                </div>
                <p>Awaiting processing</p>
            </a>
            </div>
        <div class="mt-4 h-40 w-full mx-auto md:mx-0 md:w-1/3 bg-gradient-to-br from-emerald-700 to-emerald-400 text-white drop-shadow-xl pl-3 pt-3 rounded-lg hover:drop-shadow-2xl transition hover:scale-105">
                
                <h5 class="text-xl font-bold">Total Sales</h5>
                <div class="flex space-x-5 py-4">
                   <svg class="w-6 h-6 text-green-300" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 512 512"><path d="M470.7 9.4c3 3.1 5.3 6.6 6.9 10.3s2.4 7.8 2.4 12.2l0 .1v0 96c0 17.7-14.3 32-32 32s-32-14.3-32-32V109.3L310.6 214.6c-11.8 11.8-30.8 12.6-43.5 1.7L176 138.1 84.8 216.3c-13.4 11.5-33.6 9.9-45.1-3.5s-9.9-33.6 3.5-45.1l112-96c12-10.3 29.7-10.3 41.7 0l89.5 76.7L370.7 64H352c-17.7 0-32-14.3-32-32s14.3-32 32-32h96 0c8.8 0 16.8 3.6 22.6 9.3l.1 .1zM0 304c0-26.5 21.5-48 48-48H464c26.5 0 48 21.5 48 48V464c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V304zM48 416v48H96c0-26.5-21.5-48-48-48zM96 304H48v48c26.5 0 48-21.5 48-48zM464 416c-26.5 0-48 21.5-48 48h48V416zM416 304c0 26.5 21.5 48 48 48V304H416zm-96 80c0-35.3-28.7-64-64-64s-64 28.7-64 64s28.7 64 64 64s64-28.7 64-64z"/></svg>
                    <p class="text-xl font-bold pr-10 text-green-300">{{$totalSales}} Ksh</p>
                </div>
                <p>This Month</p>
        </div>
        <div class="mt-4 h-40 w-full mx-auto md:mx-0 md:w-1/3 bg-gradient-to-br from-rose-700 to-rose-400 text-white drop-shadow-xl pl-3 pt-3 rounded-lg hover:drop-shadow-2xl transition hover:scale-105 ">
            <a href="{{route('admin.orders.index')}}">
                
                <h5 class="text-xl font-bold">Total Products Sold</h5>
                <div class="flex space-x-5 py-4">
                    <svg class="w-6 h-6 text-rose-200" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" fill="currentColor"><path d="M160 112c0-35.3 28.7-64 64-64s64 28.7 64 64v48H160V112zm-48 48H48c-26.5 0-48 21.5-48 48V416c0 53 43 96 96 96H352c53 0 96-43 96-96V208c0-26.5-21.5-48-48-48H336V112C336 50.1 285.9 0 224 0S112 50.1 112 112v48zm24 96c-13.3 0-24-10.7-24-24s10.7-24 24-24s24 10.7 24 24s-10.7 24-24 24zm200-24c0 13.3-10.7 24-24 24s-24-10.7-24-24s10.7-24 24-24s24 10.7 24 24z"/></svg>
                    <p class="text-xl font-bold pr-10 text-rose-200">{{$productsSold}}</p>
                </div>
                <p>This Month</p>
            </a>
        </div>
    </div>
    </div>
    @include('partials.chart')

    <div>
        <h5 class="pb-5 text-2xl font-dancing text-yellow-700">User Feedback</h5>
        <div x-data="{ showMessage: true }" x-show="showMessage" x-init="setTimeout(() => showMessage = false, 3000)">
      @if(session('message'))
      <p class="bg-green-400 text-white font-bold p-2 mb-3 rounded-lg w-1/2">{{session('message')}}</p>
      @endif
     </div>
     @if($messages->count()>0)
        @foreach ($messages as $message)
            
        <div class="pl-4 my-3 w-full md:w-2/3 h-44 border border-yellow-900 rounded-lg">
            <div class="flex py-2 justify-between">
                <div class="flex space-x-5">
                    <h5>{{$message->name}}</h5>
                    <p class="text-stone-600">{{$message->email}}</p>
                </div>
                <div class="mr-4 pt-1">
                    <form action="{{route('admin.markasread')}}" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="{{$message->id}}">
                        <button type="submit">
                            <h5 class="text-xs text-green-500 font-bold">Mark as Read<i class="fa-solid fa-check-double"></i></h5>
                        </button>
                    </form>
                </div>
            </div>
            <p class="text-xl font-bold">{{$message->subject}}</p>
            <p class="text-sm">{{$message->message}}</p>
            <p class="pt-4">{{date_format($message->created_at, "M d y, H:i a")}}</p>
        </div>
        @endforeach
        @else
        <h5>No User feedback</h5>
        @endif
    </div>
    <div class="grid sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-y-4 pt-4 h-fit md:h-60 text-white gap-x-3">
        <div class="pl-3 pt-5 bg-gradient-to-br from-orange-700 to-orange-400 rounded-lg drop-shadow-xl hover:drop-shadow-2xl transition hover:scale-105">
            <h5 class="text-xl font-bold pb-2">Total Orders</h5>
            <p class="text-3xl pb-2">{{$totalOrdersCount}}</p>
            <p class="text-sm font-extrabold">Completed<span class="pl-5">{{floor($percentageCompletedOrders)}}%</span></p>
            <p class="text-sm font-extrabold pb-3 md:pb-0">Pending Payment<span class="pl-5">{{floor($percentagePendingPayment)}}%</span></p>
        </div>
        <div class="pl-3 pt-5 bg-gradient-to-br from-lime-700 to-lime-400 rounded-lg drop-shadow-xl hover:drop-shadow-2xl transition hover:scale-105">
            <h5 class="text-xl font-bold pb-2">Total Products</h5>
            <p class="text-3xl pb-2">{{$totalProducts}}</p>
            <p class="text-sm font-extrabold pb-3 md:pb-0">Product Categories<span class="pl-5">{{$totalCategories}}</span></p>
        </div>
        <div class="pl-3 pt-5 bg-gradient-to-br from-fuchsia-700 to-fuchsia-400 rounded-lg drop-shadow-xl hover:drop-shadow-2xl transition hover:scale-105">
            <h5 class="text-xl font-bold pb-2">Total Users</h5>
            <p class="text-3xl pb-2">{{$totalUsers}}</p>
            <p class="text-sm font-extrabold pb-3 md:pb-0">Deactivated Users<span class="pl-5">{{$deactivatedUsers}}</span></p>
        </div>
       
    </div>
</x-admin-layout>