@extends('layouts.main')
@section('title', 'ManFul - Shop')
@section('content')
{{-- Banner --}}
<section class="bg-black h-32 font-dancing">
    <h2 class="text-center text-white text-3xl pt-10">Beard</h2>
</section>
<section class=" flex justify-center space-x-7 mt-5 font-dancing">
 {{-- Nav --}}
<div>
    <a href="" class="px-10 py-1 text-white bg-black">All</a>
</div>
<div>
    <a href="" class="px-10 py-1 border border-black">Body</a>
</div>
<div>
    <a href="" class="px-10 py-1 border border-black">Beard</a>
</div>
<div>
    <a href="" class="px-10 py-1 border border-black">SkinCare</a>
</div>
<div>
    <a href="" class="px-10 py-1 border border-black">Hair</a>
</div>
<div>
    <a href="" class="px-10 py-1 border border-black">Shaving</a>
</div>
</section>
<section class="font-dancing my-12">
    <div class="mx-14">
        {{ $products->links() }}
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
              <a href="{{route('product', $product->slug)}}" class="text-end bg-yellow-900  px-10 py-1 text-white hover:bg-white hover:text-black hover:border-2 hover:border-yellow-900 transition duration-100">Quick View</a>
            </div>
          </div>
        </div>
        @endforeach
    </div>
</section>
@endsection