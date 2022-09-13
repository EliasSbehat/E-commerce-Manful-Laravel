@extends('layouts.main')
@section('title', 'Manful | Confirmation')
@section('content')
  <div class="container flex flex-col pt-16 items-center mx-auto space-y-4 font-dancing w-2/3 h-full">
    <h5 class="text-3xl font-bold mb-1">Your order has been received</h5>
    <p class="w-1/3 text-center pb-4">You will receive an order confirmation email with the details of your order</p>
    <svg class="w-28 h-28 text-emerald-500" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M256 512c141.4 0 256-114.6 256-256S397.4 0 256 0S0 114.6 0 256S114.6 512 256 512zM369 209L241 337c-9.4 9.4-24.6 9.4-33.9 0l-64-64c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0l47 47L335 175c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9z"/></svg>
    <h6 class="text-xl font-semibold pt-4">Thank you for your purchase</h6>
    <p>Your Order ID is: <span class="uppercase font-bold">ANDKNMFO98</span></p>
    <a href="{{route('home')}}" class="px-16 py-2 bg-yellow-900 text-white">Continue Shopping</a>
  </div>
@endsection