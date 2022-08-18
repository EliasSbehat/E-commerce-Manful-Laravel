@extends('layouts.main')
@section('title' , 'Cart')
@section('content')
<section class="flex justify-between h-screen">
 <div>
 <h2 class="ml-6 my-4 text-5xl font-dancing">My Cart</h2>
<table class="w-[800px] font-dancing h-20 mx-4 border-separate border-spacing-4 border border-slate-500">
 <thead class=" text-justify text-xl">
  <tr>
   <th>Product</th>
   <th>Quantity</th>
   <th>Total</th>
   <th></th>
  </tr>
 </thead>
 <tbody>
  @foreach($cartItems as $item)
  <tr>
   <td class="flex">
    <div class="ml-2 h-28 w-28 bg-black">
     <img src="{{Storage::url($item->attributes->image)}}" alt="" class="h-full w-full object-fit">
    </div>
    <div class="pl-5 pt-3 space-y-2">
     <p class="text-xl">{{$item->name}}</p>
     <p class="font-semibold">{{$item->price}}KES</p>
    </div>
   </td>
   <td>
    <input type="number" name="" id="" class="w-16 text-xl" value="{{$item->quantity}}">
   </td>
   <td class="font-semibold">300KES</td>
   <td>
    <form action="{{route('cart.remove')}}" method="POST">
     @csrf
     <input type="hidden" value="{{ $item->id }}" name="id">
     <button type="submit" class="text-sm underline text-red-500">Remove</button>
    </form>
   </td>
  </tr>
  @endforeach
 </tbody>
</table>
</div>
<div class="w-96 h-[250px] bg-gray-100 mr-10 mt-8 font-dancing pl-4 pt-5 space-y-5">
<h3 class="text-2xl">Cart Total</h3>
<div class="flex justify-between">
 <p>Subtotal</p>
 <p class="mr-3">300KES</p>
</div>
<div class="flex justify-between">
 <p>Total</p>
 <p class="mr-3">300KES</p>
</div>
<div class="flex justify-between">
 <form action="">
  <button class="w-48 h-8 bg-black text-white">Proceed To Checkout</button>
 </form>
 <form action="">
  <button class="mr-2 w-40 h-8 border border-black">Continue Shopping</button>
 </form>
</div>
</div>
</section>
@endsection