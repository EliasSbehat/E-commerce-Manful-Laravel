@extends('layouts.main')
@section('title' , 'Manful | Account')
@section('content')
  <section class="flex justify-center h-full font-dancing my-5">
    <div class="w-3/4 h-4/5 bg-gray-100 pl-20 pt-6 rounded-md">
      <div x-data="{ showMessage: true }" x-show="showMessage" x-init="setTimeout(() => showMessage = false, 3000)">
      @if(session('success'))
      <p class="bg-green-400 text-white font-bold p-2 mb-3 rounded-lg">{{session('success')}}</p>
      @endif
     </div>
      <div class="flex space-x-16 mb-5">
        <h5 class="text-xl text-yellow-900">Personal Information</h5>
        <a href="{{route('edit-profile', auth()->user()->id)}}" class="text-blue-500 font-bold">Edit</a>
        <a href="{{route('edit-password', auth()->user()->id)}}" class="text-blue-500 font-bold">Change Password</a>
      </div>
      <div class="my-5">
        <label for="name" class="mx-6">Name</label>
        <input type="text" readonly value="{{auth()->user()->name}}" class="h-10 rounded-lg focus:border-gray-400 focus:ring-gray-400 cursor-not-allowed">
      </div>
      <div class="mb-5">
        <label for="name" class="mx-6">Email</label>
        <input type="email" readonly value="{{auth()->user()->email}}" class="h-10 rounded-lg focus:border-gray-400 focus:ring-gray-400 cursor-not-allowed">
      </div>

        <h5 class="mb-5 text-xl text-yellow-900">Shipping Information</h5>
        @if(auth()->user()->customers)
        <div class="mb-5">
        <label for="phone" class="mx-6">Phone</label>
        <input type="text" readonly value="{{auth()->user()->customers->phone}}" class="h-10 rounded-lg focus:border-gray-400 focus:ring-gray-400 cursor-not-allowed">
      </div>
      <div>
        <label for="address" class="mx-5">Address</label>
        <input type="text" readonly value="{{auth()->user()->customers->address}}" class="h-24 w-72 rounded-lg focus:border-gray-400 focus:ring-gray-400 cursor-not-allowed">
      </div>
      @else
      <h5>No shipping Info</h5>
      @endif
    </div>
  </section>
  @endsection