@extends('layouts.main')
@section('title','Your search')
@section('content')
@if($products->count()>0)
<div class="grid sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 pt-4 justify-items-center gap-y-20 my-12">
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
              <a href="{{route('product', $product->slug)}}" class="text-end bg-yellow-900  px-10 py-1 text-white hover:bg-white hover:text-black hover:border-2 hover:border-yellow-900 transition duration-100">Quick View</a>
            </div>
          </div>
        </div>
        @endforeach
    </div>
    @else
    <section class="flex flex-col items-center justify-center h-96 space-y-5">
      <img src="https://img.icons8.com/external-emojis-because-i-love-you-royyan-wijaya/344/external-dead-emojis-and-emoticon-emojis-because-i-love-you-royyan-wijaya.png" alt="  " class="h-20 w-20">
      <h2 class=" text-2xl font-dancing text-center">No Results</h2>
    </section>
    @endif
@endsection