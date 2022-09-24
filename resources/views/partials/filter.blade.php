{{-- Banner section --}}
<section class=" h-32 font-dancing bg-cover" style="background-image:url({{asset('img/cover.jpg')}})">
  <h2 class=" text-center text-white text-3xl pt-10">
    @if (request()->is('shop'))
   All Products
   @endif
    @foreach($categories as $category)
    @if(request()->is('shop/' . $category->id))
    {{$category->name}}
    @endif
    @endforeach
  </h2>
</section>

{{-- Nav --}}
<section class="flex justify-center space-x-2 md:space-x-7 mt-5 font-dancing">
 <div  class="{{request()->routeIs('shop')? 'active' : ''}}"> 
   <a href="{{route('shop')}}" class="px-2 md:px-10 border border-black">All</a>
  </div>
@foreach ($categories as $category)
<div class="{{request()->is('shop/'. $category->id) ? 'active' : ''}}">
  <form action="{{route('filter', $category->id)}}" method="POST">
    @csrf
    <input type="hidden" name="id" value="{{$category->id}}">
    <button  class="px-4 md:px-10 border border-black text-xs md:text-lg" type="submit">{{$category->name}}</button>
  </form>
</div>
@endforeach
</section>

