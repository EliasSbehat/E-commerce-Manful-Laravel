@extends('layouts.main')
@section('title', 'ManFul | Shop')
@section('content')
{{-- Banner --}}
<section class="h-40 bg-black text-center font-dancing">
<p class="text-3xl text-white pt-12">Beard</p>
</section>
<section>
<div class="ml-4 flex justify-center pt-4 space-x-3">
<a href="" class="px-16 border border-black py-1">All</a>
<a href="" class="px-16 border border-black py-1 bg-black text-white">Beard</a>
<a href="" class="px-16 border border-black py-1">Body</a>
<a href="" class="px-16 border border-black py-1">Skincare</a>
<a href="" class="px-16 border border-black py-1">Shaving</a>
</div>
</section>
<section class="h-">
<div class="grid grid-cols-3 pt-4 justify-items-center gap-y-10 font-dancing mb-5">
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
</section>
@endsection