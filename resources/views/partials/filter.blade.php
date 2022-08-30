<section class="bg-black h-32 font-dancing">
  <h2 class="text-center text-white text-3xl pt-10">Beard</h2>
</section>
<section class="flex justify-center space-x-7 mt-5 font-dancing">
 {{-- Nav --}}
<div>
    <a href="" class="px-10 py-1 text-white bg-black">All</a>
</div>

<div>
  <form action="{{route('filter')}}" method="GET">
    <input type="hidden" name="body" value="body">
    <button class="px-10 border border-black" type="submit">Body</button>
  </form>
</div>


<div>
  <form action="{{route('filter')}}" method="GET">
    <input type="hidden" name="body" value="body">
    <button class="px-10 border border-black" type="submit">Beard</button>
  </form>
</div>
<div>
  <form action="{{route('filter')}}" method="GET">
    <input type="hidden" name="body" value="body">
    <button class="px-10 border border-black" type="submit">SkinCare</button>
  </form>
</div>
<div>
  <form action="{{route('filter')}}" method="GET">
    <input type="hidden" name="body" value="body">
    <button class="px-10 border border-black" type="submit">Shaving</button>
  </form>
</div>
<div>
  <form action="{{route('filter')}}" method="GET">
    <input type="hidden" name="body" value="body">
    <button class="px-10 border border-black" type="submit">Hair</button>
  </form>
</div>

</section>