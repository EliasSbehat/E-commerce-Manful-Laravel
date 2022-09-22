@extends('layouts.main')
@section('title' , 'Manful | Orders')
@section('content')

<section class="h-full font-dancing bg-gray-50">
  @if($orders->count()>0)
    <h2 class="ml-6 my-4 text-5xl font-dancing">My Orders</h2>
        
    <div class="overflow-x-auto">
      <table class="text-sm w-full md:w-2/3 ml-10 text-justify mt-5">
        <thead class="h-20 border-y border-gray-600 text-yellow-900">
          <th class="px-2">Order No</th>
          <th>Shipped To</th>
          <th>Date</th>
          <th>Total</th>
          <th>Status</th>
        </thead>
        <tbody>
          @foreach($orders as $order)
          <tr class="h-16 bg-white drop-shadow-lg border-b border-gray-300">
            <td class="px-2 text-blue-500 font-semibold">
              <a href="{{route('single-order', $order->order_no)}}">#{{$order->order_no}}</a>
            </td>
            <td>
              <p class="font-bold">{{$order->city}}</p>
              {{$order->address}}
            </td>
            <td>
               {{date("M j, Y", strtotime($order->created_at))}}
            </td>
            <td class="font-bold">2300.0</td>
            <td>
               @include('partials.status')
            </td>
          </tr>
         @endforeach
        </tbody>
      </table>
    </div>
    <div class="ml-12 my-4 w-1/2">
        {{$orders->links()}}
      </div>
    @else
      <div class="flex flex-col justify-center items-center text-center space-y-5">
       <div class="h-28 w-28 rounded-full mt-5 text-teal-600">
       <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" fill="currentColor"><path d="M112 0C85.5 0 64 21.5 64 48V96H16c-8.8 0-16 7.2-16 16s7.2 16 16 16H64 272c8.8 0 16 7.2 16 16s-7.2 16-16 16H64 48c-8.8 0-16 7.2-16 16s7.2 16 16 16H64 240c8.8 0 16 7.2 16 16s-7.2 16-16 16H64 16c-8.8 0-16 7.2-16 16s7.2 16 16 16H64 208c8.8 0 16 7.2 16 16s-7.2 16-16 16H64V416c0 53 43 96 96 96s96-43 96-96H384c0 53 43 96 96 96s96-43 96-96h32c17.7 0 32-14.3 32-32s-14.3-32-32-32V288 256 237.3c0-17-6.7-33.3-18.7-45.3L512 114.7c-12-12-28.3-18.7-45.3-18.7H416V48c0-26.5-21.5-48-48-48H112zM544 237.3V256H416V160h50.7L544 237.3zM160 464c-26.5 0-48-21.5-48-48s21.5-48 48-48s48 21.5 48 48s-21.5 48-48 48zm368-48c0 26.5-21.5 48-48 48s-48-21.5-48-48s21.5-48 48-48s48 21.5 48 48z"/></svg>
    </div>
    <h4 class="text-5xl">No recent orders</h4>
    <p>Browse for the best deals and offers</p>
    <a href="{{route('shop')}}" class="px-10 py-2 bg-yellow-900 text-white">Start Shopping</a>
      </div>
    @endif

  </section>
  @endsection