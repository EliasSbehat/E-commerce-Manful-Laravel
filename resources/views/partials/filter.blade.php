{{-- Banner section --}}
<section class=" h-32 font-dancing bg-cover" style="background-image:url(https://images.unsplash.com/photo-1655563096407-42bf664e9b9f?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1yZWxhdGVkfDV8fHxlbnwwfHx8fA%3D%3D&auto=format&fit=crop&w=800&q=60)">
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
<section class="flex justify-center space-x-7 mt-5 font-dancing">
 {{-- Nav --}}
 <div  class="{{request()->routeIs('shop')? 'active' : ''}}"> 
   <a href="{{route('shop')}}" class="px-10 border border-black" type="submit">All</a>
  </div>
@foreach ($categories as $category)

<div class="{{request()->is('shop/'. $category->id) ? 'active' : ''}}">
  <form action="{{route('filter', $category->id)}}" method="POST">
    @csrf
    <input type="hidden" name="id" value="{{$category->id}}">
    <button  class="px-10 border border-black" type="submit">{{$category->name}}</button>
  </form>
  {{-- <a href="{{route('shop', $category->slug)}}">{{$category->name}}</a> --}}
</div>
@endforeach




</section>