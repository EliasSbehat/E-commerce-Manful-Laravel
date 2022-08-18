@extends('layouts.main')
@section('title', 'ManFul | Details')
@section('content')
<section class="h-screen flex ml-4 my-4">
 <div class="h-full w-1/2 bg-black">
 <img src="{{Storage::url($product->image)}}" alt="" class="w-full h-full object-cover">
 </div>

 <div class="h-full w-1/2 ml-4 space-y-4 font-dancing pt-12">
 <h2 class="text-4xl">{{$product->name}}</h2>
 <p class="text-2xl">{{$product->price}} KES</p>
 <p class="text-xl w-2/3">{{$product->description}}</p>
 <div>
  <label for="quantity" class="text-xl block pb-1">Quanity</label>
  <input type="number" value="1" name="" id="" class="text-xl block">
 </div>
 <a href="" class="px-14 py-2 border border-black block text-center">Add To Wishlist</a>
                    <form action="{{ route('cart.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" value="{{ $product->id }}" name="id">
                        <input type="hidden" value="{{ $product->name }}" name="name">
                        <input type="hidden" value="{{ $product->price }}" name="price">
                        <input type="hidden" value="{{ $product->image }}"  name="image">
                        <input type="hidden" value="1" name="quantity">
                        <button class="w-full py-2 text-white bg-black rounded">Add To Cart</button>
                    </form>
 </div>
</section>
@endsection