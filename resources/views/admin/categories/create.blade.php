<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
         
<form action="{{route('admin.categories.store')}}" method="POST" enctype="multipart/form-data">
 @csrf
 <div class="mb-6">
  <label for="name" class="block mb-2 text-lg text-gray-600 font-bold">Category Name</label>
  <input type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-md rounded-lg focus:ring-black focus:border focus:border-black  block w-1/2 p-2.5" name="name">
 </div>
 <label class="block mb-2 text-lg  text-gray-600 font-bold" for="image">Upload image</label>
 <input class="block w-1/2 p-2 text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 cursor-pointer" type="file" name="image">
 <button type="submit" class="my-8 w-44 h-10 bg-emerald-400 hover:bg-emerald-500 rounded-md text-lg text-white">Create Category</button>
</form>

        </div>
    </div>
</x-admin-layout>