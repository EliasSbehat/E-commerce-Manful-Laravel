@extends('layouts.main')
@section('title', 'Manful | Contact')
@section('content')
<section class="h-full">
  <h5 class="text-center text-2xl font-bold mt-5">DROP US A NOTE</h5>
  <p class="text-center pt-2 font-extralight">For any challenges you are facing on your shopping experience, please share with us</p>
  <div class="absolute top-1/3 left-1/2 -translate-x-1/2">
    {{-- Success message --}}
    @if(session('message'))
    <div x-data="{ showMessage: true }" x-show="showMessage" x-init="setTimeout(() => showMessage = false, 3000)">
    <p class="bg-green-400 text-white font-bold p-2 mb-3 rounded-lg">{{session('message')}}</p>
  </div> 
  @endif
    {{-- Error message --}}
    @if($errors->any())
  @foreach ($errors->all() as $error) 
  <div x-data="{ showMessage: true }" x-show="showMessage" x-init="setTimeout(() => showMessage = false, 3000)">
    <p class="bg-red-400 text-white font-bold p-2 mb-3 rounded-lg">{{$error}}</p>
  </div>     
    @endforeach  
    @endif
  <form action="{{route('submit-form')}}" method="POST">
    @csrf
    <div class="space-x-4 my-3">
      <input type="text" class="h-10 rounded-lg focus:border-gray-400 focus:ring-gray-400" placeholder="Your Name" name="name" required {{old('name')}}>
      <input type="email" class="h-10 rounded-lg focus:border-gray-400 focus:ring-gray-400" placeholder="Email" name="email" required value="{{old('email')}}">
    </div>
    <div class="my-3">
      <input type="text" class="h-10 rounded-lg focus:border-gray-400 focus:ring-gray-400" placeholder="Subject" name="subject" required {{old('subject')}}>
    </div>
    <div>
      <textarea cols="30" rows="10" class="w-full h-40 rounded-lg focus:border-gray-400 focus:ring-gray-400" placeholder="Message" name="message" required>{{old('message')}}</textarea>
    </div>
    <div class="text-center pt-5">
      <button type="submit" class="w-32 h-10 bg-yellow-900 text-white">Send</button>
    </div>
  </form>
  <div class="text-center pt-12">
    <h6>Contact Us</h6>
    <div>
      <i class="fa-solid fa-phone"></i>
      +2547123456789
    </div>
    <div>
<i class="fa-solid fa-envelope"></i>
    manful@support.com
    </div>
  </div>
    </div>

</section>
@endsection