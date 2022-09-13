@extends('layouts.main')
@section('title','Manful - Checkout')
@section('content')
<h3 class="text-5xl ml-4 mt-5 text-yellow-900 font-dancing">Checkout</h3>
<div class="min-h-full flex mt-10 mb-5">
<form action="{{route('checkout-store')}}" class="w-full font-dancing" method="POST">
  @csrf
  {{-- Billing Details --}}
  <div class="w-2/3 h-fit ml-7 space-y-5">
        <h4 class="w-2/3 text-xl py-2 bg-gray-100 rounded-lg pl-5 cursor-pointer" id="h">Billing Details</h4>
        <p class="text-sm">Please fill in all the details below</p>
    <div class="flex space-x-5 pt-4">
      {{-- Firstname --}}
      <div>
        <label for="firstname" class="block text-sm pb-2">FirstName <sup>*</sup></label>
        <input type="text" placeholder="John" required class="w-60 rounded-md border-emerald-800 focus:border-emerald-900 focus:ring-emerald-900" name="firstname" value="{{old('firstname')}}">
      </div>
      {{-- Lastname --}}
      <div>
        <label for="lastname" class="block text-sm pb-2">LastName <sup>*</sup></label>
        <input type="text" placeholder="Doe" required  class="w-60 rounded-md border-emerald-800 focus:border-emerald-900 focus:ring-emerald-900" name="lastname" value="{{old('lastname')}}">
      </div>
    </div>
    {{-- Phone number --}}
    <div>
      <label for="phone" class="block text-sm pb-2">Phone Number <sup>*</sup></label>
      <input type="tel"  disabled value="+254" class="w-20 rounded-md border-emerald-800 focus:border-emerald-900 focus:ring-emerald-900">
      <input type="tel" name="phone"  placeholder="712345678"  class="rounded-md border-emerald-800 focus:border-emerald-900 focus:ring-emerald-900" minlength="9" maxlength="9" value="{{old('phone')}}">
    </div>
    {{-- Town\City --}}
    <div>
        <label for="city" class="block text-sm pb-2">Town / City <sup>*</sup></label>
        <input type="text" placeholder="Nairobi" required  class="w-72 rounded-md border-emerald-800 focus:border-emerald-900 focus:ring-emerald-900" name="city" value="{{old('city')}}">
      </div>
    {{-- Delivery address --}}
    <div>
      <label for="address" class="block text-sm pb-2">Delivery Address <sup>*</sup></label>
      <textarea name="address"  cols="30" rows="5" class="w-2/3 rounded-md border-emerald-800 focus:border-emerald-900 focus:ring-emerald-900" required placeholder="Street Name / Apartment / Building / Floor">{{old('address')}}</textarea>
    </div>   
    {{-- Payment method --}}
    <div class="py-2 space-y-2">
  <p>Please select Payment method <sup>*</sup></p>
  {{-- Cash on Delivery --}}
  <div class="py-2">
 <input type="radio" name="payment-option" id="" class=" focus:ring-green-400 text-green-400" value="COD">
      <label for="pickup">COD</label>
      <p class="py-1 px-0.5">Cash On Delivery</p>
  </div>
  {{-- Paypal --}}
  <div class="space-y-2">
    <div>
      <input type="radio" name="payment-option" id="" class=" focus:ring-green-400 text-green-400" value="Paypal">
      <label for="delivery">Paypal</label>
    </div>
      {{-- <div class="w-24">
        <img src="{{asset('img/paypal-logo.jpg')}}" alt="" class="h-full w-full object-fit">
      </div> --}}
  </div>
  {{-- Mpesa --}}
  <div class="space-y-2">
    <div>
      <input type="radio" name="payment-option" id="" class=" focus:ring-green-400 text-green-400" value="Mpesa">
      <label for="delivery">Mpesa</label>
    </div>
      {{-- <div class="w-24">
        <img src="{{asset('img/mpesa-logo.jpeg')}}" alt="" class="h-full w-full object-fit">
      </div> --}}
  </div>
</div>
{{-- Submit Button --}}
<button type="submit" class="my-5 w-2/3 h-12 bg-green-400 text-white font-semibold rounded-md text-lg">Confirm Order</button>
  </div>
</form>
  {{-- Order Summary --}}
  <div class="w-1/2 h-fit border border-emerald-800 mr-10 pl-4 pr-2 rounded-md font-mono">
  <h4 class="text-xl my-2 uppercase font-bold">Your Order</h4>
  {{-- Order details --}}
  <table class="w-full mt-5">
    <thead class="text-justify uppercase border-b-2 border-gray-400">
      <tr>
        <th>Product</th>
        <th></th>
        <th>Total</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($cartItems as $item)    
      <tr class="h-16 border-b border-emerald-800">
        <td class="w-1/2">{{$item->name}}</td>
        <td>x {{$item->quantity}}</td>
        <td>Ksh {{$item->price * $item->quantity}}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
  {{-- Shipping and Totals --}}
  <div class="flex justify-between my-3">
    <h4 class="font-semibold text-lg">Subtotal</h4>
    <p>Ksh {{Cart::getSubTotal()}}</p>
  </div>
  <div class="flex justify-between my-3">
    <h4 class="font-semibold text-lg">Shipping</h4>
    <p>FREE</p>
  </div>
  <div class="flex justify-between my-3">
    <h4 class="font-semibold text-lg">Total</h4>
    <p>Ksh {{Cart::getTotal()}}</p>
  </div>
{{-- Payment Method --}}

</div>
</div>
@endsection