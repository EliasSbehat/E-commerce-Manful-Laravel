@extends('layouts.main')
@section('title','Manful - Checkout')
@section('content')

<h3 class="text-5xl ml-4 mt-5">Checkout</h3>
<form action="{{route('checkout-store')}}" class="container min-h-full flex flex-col lg:flex-row mt-10 mb-5 w-full" method="POST">
  @csrf
  {{-- Billing Details --}}
  <div class="w-2/3 h-fit ml-7 space-y-5">
        <h4 class="md:w-1/2 text-2xl py-2 bg-gray-100 rounded-lg pl-5 cursor-pointer text-yellow-900" id="h">Billing Details</h4>
        <p class="text-sm font-bold">Please fill in all the details below</p>
        <div x-data="{ showMessage: true }" x-show="showMessage" x-init="setTimeout(() => showMessage = false, 3000)">
            @if($errors->any())
            @foreach ($errors->all() as $error)
            <p class="bg-red-500 py-0.5 text-lg rounded-lg text-white mb-2 font-bold pl-4">
              {{ $error }}
            </p>
            @endforeach
            @endif
        </div>
    <div class="flex space-x-5 pt-4">
      {{-- Firstname --}}
      <div>
        <label for="firstname" class="block text-sm pb-2">FirstName <sup>*</sup></label>
        <input type="text" placeholder="John" required class="md:w-60 rounded-md border-emerald-800 focus:border-emerald-900 focus:ring-emerald-900" name="firstname" value="{{old('firstname')}}">
      </div>
      {{-- Lastname --}}
      <div>
        <label for="lastname" class="block text-sm pb-2">LastName <sup>*</sup></label>
        <input type="text" placeholder="Doe" required  class="md:w-60 rounded-md border-emerald-800 focus:border-emerald-900 focus:ring-emerald-900" name="lastname" value="{{old('lastname')}}">
      </div>
    </div>
    <div class="flex space-x-5 pt-4">
      {{-- Phone number --}}
      <div>
        <label for="phone" class="block text-sm pb-2">Phone Number <sup>*</sup></label>
        <input type="tel" name="phone"  placeholder="712345678"  class="rounded-md border-emerald-800 focus:border-emerald-900 focus:ring-emerald-900" minlength="9" maxlength="9" value="{{old('phone')}}">
      </div>
      {{-- Town\City --}}
      <div>
        <label for="city" class="block text-sm pb-2">Town / City <sup>*</sup></label>
        <input type="text" placeholder="Nairobi" required  class="md:w-72 rounded-md border-emerald-800 focus:border-emerald-900 focus:ring-emerald-900" name="city" value="{{old('city')}}">
      </div>
    </div>
    {{-- Delivery address --}}
    <div>
      <label for="address" class="block text-sm pb-2">Delivery Address <sup>*</sup></label>
      <textarea name="address"  cols="30" rows="5" class="w-full md:w-2/3 rounded-md border-emerald-800 focus:border-emerald-900 focus:ring-emerald-900" required placeholder="Street Name / Apartment / Building / Floor">{{old('address')}}</textarea>
    </div>   
  </div>

  {{-- Order Summary --}}
  <div class="mt-5 ml-5 lg:mt-0 lg:ml-0 w-5/6 lg:w-1/2 h-fit border border-emerald-800 mr-10 pl-4 pr-2 rounded-md font-mono">
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
    <p>Ksh {{$total = Cart::getTotal()}}</p>
  </div>
      {{-- Payment method --}}
    <div class="py-2 space-y-2">
  <p>Please select Payment method <sup>*</sup></p>
  {{-- Cash on Delivery --}}
  <div class="py-2">
 <input type="checkbox" name="payment-option" class="rounded-full focus:ring-green-400 text-green-400 cursor-pointer" value="COD" >
      <label for="pickup" class="text-xl pl-2 text-green-500 font-bold">Cash On Delivery</label>
  </div>
  {{-- Submit Button --}}
  <button type="submit" class="my-5 w-full h-12 bg-green-400 text-white font-semibold rounded-md text-lg">Confirm Order</button>
  <p class="text-center">OR</p>
  {{-- Paypal --}}
  <div class="space-y-2">
    <div>
      <div id="paypal-button-container" name="paypal"></div>
    </div>
  </div>
</div>
@php
 $total= $total/100;   
@endphp
</div>
</form>

@endsection
@section('scripts')
<script>
      paypal.Buttons({
     
        // Sets up the transaction when a payment button is clicked
        createOrder: (data, actions) => {
          return actions.order.create({
            purchase_units: [{
              amount: {
                value: '{{$total}}' // Can also reference a variable or function
              }
            }]
          });
        },
        // Finalize the transaction after payer approval
        onApprove: (data, actions) => {
          return actions.order.capture().then(function(orderData) {
            // Successful capture! For dev/demo purposes:
            console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
            const transaction = orderData.purchase_units[0].payments.captures[0];
            alert(`Transaction ${transaction.status}: ${transaction.id}\n\nSee console for all available details`);
            // When ready to go live, remove the alert and show a success message within this page. For example:
            // const element = document.getElementById('paypal-button-container');
            // element.innerHTML = '<h3>Thank you for your payment!</h3>';
            // Or go to another URL:
              // actions.redirect('confirmation');
              // window.location.href = "{{route('confirmation')}}";
          });
        }
      }).render('#paypal-button-container');
    </script>
@endsection