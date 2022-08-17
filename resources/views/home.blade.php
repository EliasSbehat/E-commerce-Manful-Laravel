@extends('layouts.main')
@section('title' , 'Home')
@section('content')
{{-- Hero Start --}}
<section 
class="hero bg-cover bg-center h-96"
style="background-image: url('{{  asset('img/supply-USghnHKesaM-unsplash.jpg') }}');">
 <div class="flex justify-center text-center h-full w-full">
  <header class="text-white mt-20 space-y-8 font-dancing tracking-tight">
  <h1 class="md:text-5xl text-2xl ">Grooming, but like never before</h1>
  <p class="md:text-2xl pb-8">Build your custom kit from scratch</p>
  <a href="{{route('shop')}}" class="text-lg px-14 py-2 bg-white text-yellow-800 rounded font-semibold">To Shop</a>
  </header>
 </div>
</section>
{{-- Hero end --}}

<!-- Icons start -->
<section>
<div
      class="flex justify-evenly h-36 items-center md:text-2xl text-lg text-center md:leading-10 md:font-bold font-medium md:py-8 py-0 text-black font-dancing"
    >
      <div class="space-y-6">
        <i class="fa-brands fa-opencart"></i>
        <p>Fast Delivery</p>
      </div>
      <div class="space-y-6">
        <i class="fa-solid fa-arrow-rotate-left"></i>
        <p>Free Returns</p>
      </div>
      <div class="space-y-6">
        <i class="fa-solid fa-shield"></i>
        <p>Secure checkout</p>
      </div>
    </div>   
</section>
<!-- Icons end   -->

{{-- Text Start --}}
<section class="flex flex-col text-center h-96 my-12 font-dancing border-black bg-gray-100">
  <h2 class="text-2xl font-bold text-amber-900 pt-20 pb-10">How it works</h2>
  <div class=" leading-loose tracking-wider">  
    <p>We believe no size fits-all. Here at Manful we let you pick your grooming essentials.</p>
    <p>The minimum order amount is <b> 200KES</b> from our wide range of products.</p>
    <p>After selection you receive your order packaged as a kit!</p>
  </div>
</section>
{{-- Text End --}}

{{-- Categories start --}}
<section class="h-screen font-dancing">
  {{-- Section title --}}
  <h2 class="text-3xl mb-2 ml-4">Shop from our categories</h2>
  <div class=" border-b-4 border-yellow-800 mb-4 ml-4 w-1/5 rounded-lg"></div>
  {{-- Flex container --}}
  <div class="flex gap-5 ml-4 h-full">
    {{-- Left side --}}
    <div class="relative w-1/2 bg-white flex justify-center">
      <div class=" h-full w-full">
        <div class="absolute bottom-32 left-1/2 -translate-x-1/2">
          <a href="" class="text-3xl bg-white border border-white px-20 py-4 hover:bg-black hover:text-white hover:border-black transition-all duration-200">Beard</a>
        </div>
        {{-- <img src="{{asset('img\16349252_rm388-rm362-b23-mockup.jpg')}}" alt="" class="w-full h-full object-cover"> --}}
        <img src="https://img.freepik.com/premium-photo/young-handsome-bearded-man-with-beard-stylish-haircut-think_147765-71.jpg?size=626&ext=jpg&uid=R73340908&ga=GA1.2.225954679.1655113232" alt="" class="w-full h-full object-cover">
      </div>
    </div>
    {{-- Right side --}}
    <div class="relative w-1/2 bg-white flex justify-center">
       <div class=" h-full w-full">
        <div class="absolute bottom-32 left-1/2 -translate-x-1/2">
          <a href="" class="text-3xl bg-white border border-white px-20 py-4 hover:bg-black hover:text-white hover:border-black transition-all duration-200">SkinCare</a>
        </div>
        {{-- <img src="{{asset('img\24402388_jar_06.jpg')}}" alt="" class="w-full h-full object-cover"> --}}
        <img src="https://img.freepik.com/free-photo/portrait-concentrated-young-bearded-man_171337-17199.jpg?size=626&ext=jpg&uid=R73340908&ga=GA1.2.225954679.1655113232" alt="" class="w-full h-full object-cover">
      </div>
    </div>
  </div>
</section>
{{-- Categories end --}}

{{-- Products start --}}
<section class="h-fit mt-28 font-dancing">
{{-- Section title --}}
  <div class="ml-4 text">
<h2 class="text-3xl mb-2">Start building your kit</h2>
  <div class=" border-b-4 border-yellow-800 mb- w-1/5 rounded-lg"></div>
</div>
<div class="grid grid-cols-3 pt-4 justify-items-center gap-y-10">
@foreach($products as $product)
  <div class="w-80 h-96">
  {{-- Image --}}
  <div class="h-4/5">
    <a href="{{route('details' , $product->id)}}">
      <img src="{{Storage::url($product->image)}}" alt="" class="h-full w-full object-cover">
    </a>
  </div>
  {{-- Details --}}
  <div class=" justify-between items-center">
    <div class="flex justify-between pb-3">
      <p class="text-xl ">{{$product->name}}</p>
      <p class="font-semibold">{{$product->price}} Kshs</p>
    </div>
    <div class="text-center">
      <a href="" class="bg-yellow-900  px-10 py-1 text-white">Add to Cart</a>
    </div>
  </div>
</div>
@endforeach
</div>
<div class="text-center mt-20">
<a href="" class="px-16 py-2 bg-black text-white">View All</a>
</div>
{{-- Product end --}}
</section>

<section class="h-full mt-28 flex justify-center items-center ml-4">
<div class="h-4/5 w-1/2">
<img src="{{asset('img\daniel-pascoa-V4_Oy1hm2kc-unsplash.jpg')}}" alt="" class="w-full h-full object-cover">
</div>
<div class="w-1/2 h-4/5 bg-black text-white text-center font-dancing">
<h2 class=" py-12 text-3xl tracking-wider">KEEP ON GROWING</h2>
<div class="space-y-6">
  <p>A few years ago your life wasn't like today's. You either had the wildest dreams or you got derailed somewhere along the way</p>
  <p>None of that really matters. What matters is that you went forward day-in and day-out—a little shaky and uncertain at first, but gradually more and more confidently.</p>
  <p class="text-yellow-800">How will you show up?</p>
</div>
</div>
</section>

@endsection