@extends('layouts.main')
@section('title' , 'Manful | Account')
@section('content')
<section class="h-full flex justify-center font-dancing">
  <div class=" w-1/2 mt-5 bg-gray-100 h-3/4 rounded-2xl">
    <h4 class="text-xl text-yellow-900 text-center pt-5">Update Profile</h4>
    <form action="{{route('update-profile')}}" method="POST" class="flex flex-col items-center space-y-5">
      @csrf
      <div>
        <label for="name" class="block text-xl py-2">Name</label>
        <input type="text" value="{{auth()->user()->name}}" class="md:w-64 h-10 rounded-lg focus:border-gray-400 focus:ring-gray-400" required name="name">
      </div>
      <div>
        <label for="name" class="block text-xl py-2">Email</label>
        <input type="email" value="{{auth()->user()->email}}" class="md:w-64 mb-5 h-10 rounded-lg focus:border-gray-400 focus:ring-gray-400" required name="email">
      </div>
      <button type="submit" class="bg-yellow-900 w-52 h-8 text-white">Update</button>
      <a href="{{route('account')}}" class="w-52 h-8 text-center border border-gray-500 font-bold">Cancel</a>
    </form>
    </div>
</section>
@endsection