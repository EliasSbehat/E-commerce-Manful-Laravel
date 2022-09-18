@extends('layouts.main')
@section('title' , 'Manful | Update Password')
@section('content')
<section class="h-full flex justify-center font-dancing">
  <div class=" w-1/2 mt-5 bg-gray-100 h-3/4 rounded-2xl">
    <h4 class="text-2xl text-yellow-900 text-center pt-5">Update Password</h4>
    <div x-data="{ showMessage: true }" x-show="showMessage" x-init="setTimeout(() => showMessage = false, 3000)">
      @if($errors->any())
      @foreach ($errors->all() as $error)      
      <p class="bg-red-400 text-white font-bold p-2 mb-3 rounded-lg">{{$error}}</p>
      @endforeach
      @elseif(session('error'))
       <p class="bg-red-400 text-white font-bold p-2 mb-3 rounded-lg">{{session('error')}}</p>
      @endif
     </div>
    <form action="{{route('update-password')}}" method="POST" class="flex flex-col items-center space-y- mt-5">
      @csrf
      <div>
        <label for="name" class="block pb-2">Current Password</label>
        <input type="password"  class="md:w-64 mb-2 h-10 rounded-lg focus:border-gray-400 focus:ring-gray-400" required name="old_password">
      </div>
      <div>
        <label for="name" class="block pb-2">New Password</label>
        <input type="password"  class="md:w-64 mb-2 h-10 rounded-lg focus:border-gray-400 focus:ring-gray-400" required name="new_password">
      </div>
      <div>
        <label for="name" class="block pb-2">Confirm Password</label>
        <input type="password"  class="md:w-64 mb-5 h-10 rounded-lg focus:border-gray-400 focus:ring-gray-400" required name="new_password_confirmation">
      </div>
      <button type="submit" class="bg-yellow-900 w-52 h-8 text-white mb-3">Update</button>
      <a href="{{route('account')}}" class="w-52 h-8 text-center border border-gray-500 font-bold">Cancel</a>
    </form>
    </div>
</section>
@endsection