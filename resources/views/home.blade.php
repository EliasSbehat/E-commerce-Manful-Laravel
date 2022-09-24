@extends('layouts.main')
@section('title' , 'ManFul - Home')
@section('content')
{{-- Hero Start --}}
  <section class="hero bg-cover bg-center h-full" style="background-image: url('{{asset('img/cover3.jpg')}}');">
    <div class="flex justify-center text-center h-full w-full">
      <header class="text-white space-y-8 mt-36  tracking-tight">
      <h1 class="md:text-5xl text-3xl leading-10">Grooming, but like never before</h1>
      <p class="md:text-2xl pb-8">Build your custom kit from scratch</p>
      <a href="{{route('shop')}}" class="text-lg px-16 py-2 bg-white text-yellow-800 rounded font-semibold">To Shop</a>
      </header>
    </div>
  </section>
{{-- Hero end --}}

<!-- Icons start -->
  <section>
    <div class="flex justify-evenly h-36 items-center md:text-2xl text-md text-center md:leading-10 md:font-bold font-medium md:py-8 py-0 text-yellow-900 ">
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
  <section class="flex flex-col text-center h-96 my-12  border-black bg-gray-100">
    <h2 class="text-3xl font-bold text-amber-900 pt-20 pb-10">Why Manful</h2>
    <div class=" leading-loose tracking-wider text-sm px-2">  
      <p>We believe no size fits-all. Here at Manful we let you pick your grooming essentials.</p>
      <p>The minimum order amount is <b> 200KES</b> from our wide range of products.</p>
      <p>After selection you receive your order packaged as a kit!</p>
    </div>
  </section>
{{-- Text End --}}

{{-- Categories start --}}
  <section class="h-fit ">
    {{-- Section title --}}
    <h2 class="text-xl md:text-3xl mb-2 ml-4">Shop from our categories</h2>
    <div class=" border-b-4 border-yellow-800 mb-4 ml-4 w-1/5 rounded-lg"></div>
    {{-- Flex container --}}
    <div class="grid sm:grid-cols-1 md:grid-cols-2 gap-5 ml-4 h-fit space-y-5">
      {{-- Left side --}}
      @foreach ($categories as $category)
      <div class="relative">
        <div class=" h-full w-full">
          <div class="absolute bottom-24 left-1/2 -translate-x-1/2">
            <form action="{{route('filter', $category->id)}}" method="POST">
                @csrf
                <input type="hidden" name="id" value="{{$category->id}}">
                <button  class="text-xl md:text-3xl bg-white border border-white px-16 py-3 md:px-20 md:py-4 hover:bg-black hover:text-white hover:border-black transition-all duration-200" type="submit">{{$category->name}}</button>
              </form>
          </div>
          <img src="{{Storage::url($category->image)}}" alt="" class="w-full h-full object-cover">
        </div>
      </div>
      @endforeach
    </div>
  </section>
{{-- Categories end --}}

{{-- Products start --}}
  <section class="h-fit mt-28 ">
  {{-- Section title --}}
    <div class="flex justify-between">
        <div class="ml-4 text">
    <h2 class="text-lg md:text-3xl mb-2">Start building your kit</h2>
      <div class=" border-b-4 border-yellow-800  w-4/5 rounded-lg"></div>
    </div>

    <div class="mr-6 ">
    <a href="" class="hover:underline transition duration-100 text-yellow-900 font-semibold md:text-lg">View All <i class="fa-solid fa-angles-right"></i></a>
    </div>
    </div>
    <div class="grid sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3  gap-y-12  justify-items-center pt-4 ">
    @foreach($products as $product)
      <div class="w-80 h-96">
      {{-- Image --}}
      <div class="h-4/5">
        <a href="{{route('product' ,$product->slug )}}">
          <img src="{{Storage::url($product->image)}}" alt="{{$product->name}}" class="h-full w-full object-cover ">
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
          <a href="{{route('product' ,$product->slug)}}" class="text-end bg-yellow-900  px-10 py-1 text-white hover:bg-white hover:text-black hover:border-2 hover:border-yellow-900 transition duration-100">Quick view</a>
        </div>
      </div>
    </div>
    @endforeach
    </div>
  </section>
{{-- Products end --}}

{{-- About start --}}
  <section class="flex flex-col md:flex-row h-full mt-28 border-b border-white  text-white">
    <div class="w-full md:w-1/2 md:h-full h-1/2">
    <img src="https://images.unsplash.com/photo-1587909209111-5097ee578ec3?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1yZWxhdGVkfDR8fHxlbnwwfHx8fA%3D%3D&auto=format&fit=crop&w=800&q=60" alt="" class="object-cover h-full w-full">
    </div>
    <div class="w-full md:w-1/2 h-1/2 md:h-full bg-black px-5 leading-10 flex justify-center items-center">
    <h5 class="text-3xl text-center leading-wider">From your privates to your not so privates, we're passionate about creating the best products for every part of you. And we have a lot of fun doing it.</h5>
    </div>
  </section>
  {{-- About end --}}

  <section class="h-80 bg-black text-white text-center  pt-12 space-y-8 px-4">
    <p class="text-2xl">Dont forget to sign up</p>
    <p class="text-xl">Enjoy discounts, view your order history and do much more!</p>
    <div>
      <a href="{{route('register')}}" class="px-16 py-3 bg-yellow-900">Sign Up</a>
    </div>
  </section>

@endsection