@extends('layouts.main')
@section('title', 'ManFul - Details')
@section('content')

<div x-data="{ showMessage: true }" x-show="showMessage" x-init="setTimeout(() => showMessage = false, 3000)">
    @if(session('message'))
    <p class="bg-green-500 text-white ml-5 font-bold p-2 mb-3 rounded-lg">{{session('message')}}</p>
    @endif
</div>

<section class="h-fit flex flex-col md:flex-row justify-center ml-4 my-4 overflow-x-hidden">
    
 <div class="h-full w-full md:w-1/2 bg-black">
 <img src="{{Storage::url($product->image)}}" alt="" class="w-full h-full object-cover">
 </div>

 <div class="h-full w-3/4 md:w-1/3 mx-2 md:ml-8 space-y-4 pt-12">
 <h2 class="text-4xl">{{$product->name}}</h2>
 <p class="text-2xl text-green-600">Ksh {{$product->price}}</p>
 <p class="text-lg">{{$product->description}}</p>

 <div class="flex items-center space-x-9">
     <form action="{{ route('cart.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="number" name="quantity" min="1" max="50" id="quantity" class="text-xl w-16 text-center rounded-md focus:">
        <input type="hidden" value="{{ $product->id }}" name="id">
        <button type="submit" class="w-44 md:w-48 h-12 text-white bg-black rounded border hover:bg-white hover:border-yellow-900 hover:text-black hover:font-semibold duration-100 ease-out" id="addToCart">Add To Cart</button>
    </form>
    </div>
    {{-- Category name --}}
    <p class="pt-4 opacity-80">Category: {{$product->category->name}}</p>
    {{-- Share product --}}
    <div>
        <div class="flex items-center space-x-3 opacity-80">
            <p>Share: </p>
            <a href=""><i class="fa-brands fa-facebook text-lg"></i></a>
            <a href=""><i class="fa-brands fa-instagram text-lg"></i></a>
            <a href=""><i class="fa-brands fa-whatsapp text-lg"></i></a>
        </div>
    </div>
</div>

</section>
@endsection
