<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
         <div class="my-2 text-blue-600">
            <a href="{{route('admin.users.index')}}">
            <i class="fa-solid fa-arrow-left-long"></i> <span class="pl-2 text-lg font-bold">Back</span>
            </a>
        </div>
        <form action="{{route('admin.users.update' , $user->id)}}" method="POST">
        @csrf
        @method('PUT')
        <input type="hidden" name="name" value="{{$user->name}}">
        <div>
          <label for="role" class="block my-4">Change Role</label>
          <select name="is_admin" class="w-56 rounded-md border-gray-200 focus:border-gray-500 focus:ring-gray-500">
            <option value="{{$user->is_admin}}" selected>{{ $user->is_admin == 1 ? 'Admin' : 'User' }}</option>
            <option value="0">User</option>
            <option value="1">Admin</option>
  
          </select>
        </div>
        <button type="submit" class="my-8 w-44 h-10 bg-emerald-400 hover:bg-emerald-500 rounded-md text-lg text-white">Update Role</button>
        </form>
        </div>
    </div>
</x-admin-layout>



