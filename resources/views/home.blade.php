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
          <a href="" class="text-3xl bg-white border border-white px-20 py-4 hover:bg-black hover:text-white hover:border-black transition-all duration-200">Body</a>
        </div>
        <img src="{{Storage::url('categories\aWO4lA3OLUL6qCEkjaylr46AoXO3j7gKCyXC753I.jpg')}}" alt="" class="w-full h-full object-cover">
      </div>
    </div>
    {{-- Right side --}}
    <div class="relative w-1/2 bg-white flex justify-center">
       <div class=" h-full w-full">
        <div class="absolute bottom-32 left-1/2 -translate-x-1/2">
          <a href="" class="text-3xl bg-white border border-white px-20 py-4 hover:bg-black hover:text-white hover:border-black transition-all duration-200">Beard</a>
        </div>
        {{-- <img src="{{asset('img\24402388_jar_06.jpg')}}" alt="" class="w-full h-full object-cover"> --}}
        <img src="{{Storage::url('categories\YHa3JkJNwETCY8OvuG02FdJ09InAq8RrLcjTciaY.jpg')}}" alt="" class="w-full h-full object-cover">
      </div>
    </div>
  </div>
</section>
{{-- Categories end --}}

{{-- Products start --}}
<section class="h-fit mt-28 font-dancing">
{{-- Section title --}}
<div class="flex justify-between">
    <div class="ml-4 text">
<h2 class="text-3xl mb-2">Start building your kit</h2>
  <div class=" border-b-4 border-yellow-800  w-4/5 rounded-lg"></div>
</div>

<div class="mr-6 ">
<a href="" class="hover:underline transition duration-100 text-yellow-900 font-semibold text-lg">View All <i class="fa-solid fa-angles-right"></i></a>
</div>
</div>
<div class="grid grid-cols-3 pt-4 justify-items-center gap-y-20">
@foreach($products as $product)
  <div class="w-80 h-96">
  {{-- Image --}}
  <div class="h-4/5">
    <a href="{{route('product' ,$product->slug )}}">
      <img src="{{Storage::url($product->image)}}" alt="" class="h-full w-full object-cover">
    </a>
  </div>
  {{-- Details --}}
  <div class="space-y-2">
    <div class="">
      <p class="text-xl ">{{$product->name}}</p>
    </div>
    <div class="">
      <p class="font-semibold">{{(int)$product->price}} Kshs</p>
    </div>
    <div>
      <a href="" class="text-end bg-yellow-900  px-10 py-1 text-white hover:bg-white hover:text-black hover:border-2 hover:border-yellow-900 transition duration-100">Add to Cart</a>
    </div>
  </div>
</div>
@endforeach
</div>
</section>
{{-- Product end --}}

{{-- Deal start --}}
<section class="flex h-screen mt-28">
<div class="w-1/2">
<img src="https://m.media-amazon.com/images/I/81WkoAtwsKL._SL1500_.jpg" alt="" class="h-full w-full object-fit">
</div>
<div class="flex flex-col items-center justify-center space-y-8 w-1/2 font-dancing pt-8 relative">
<h2 class="text-xl text-rose-700">Deal of the week</h2>
<p class="text-5xl">Full Beard Gift Set</p>
{{-- Timer --}}
<p id="countdown" class="text-3xl ml-4 text-yellow-900"></p>
{{-- Badge --}}
<div class="absolute top-0 left-0 flex flex-col items-center justify-center mt-4 rounded-full w-36 h-36 bg-yellow-900  text-white">
  <p >Sale of</p>
  <p class="font-bold text-xl">3999 KES</p>
</div>
{{-- Cta --}}
<div class="pt-4">
  <a href="" class="px-20 py-4 bg-black uppercase text-white">Shop Now</a>
</div>
</div>
</section>
{{-- Deal end --}}

<section class="h-80 bg-black text-white text-center font-dancing pt-12 space-y-8">
<p class="text-2xl">Dont forget to sign up</p>
<p class="text-xl">Enjoy discounts, view your order history and do much more!</p>
<div>
  <a href="{{route('register')}}" class="px-16 py-3 bg-yellow-900">Sign Up</a>
</div>
</section>

@endsection