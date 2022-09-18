<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-between mb-4">
                 
            </div>

            
<div class="overflow-x-auto relative shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left text-gray-500">
        <thead class=" text-white uppercase bg-green-400 font-bold">
            <tr>
                <th scope="col" class="py-3 px-6">
                    Name
                </th>
                <th scope="col" class="py-3 px-6">
                    Email
                </th>
                
                <th scope="col" class="py-3 px-6">
                    Role
                </th>
                <th scope="col" class="py-3 px-6">
                    Action
                </th>
             
            </tr>
        </thead>
        <tbody>
          @foreach($users as $user)
            <tr class="bg-white border-b ">
                <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap"> 
                    {{$user->name}}
                </th>
                <td class="py-4 px-6">
                    {{$user->email}}
                </td>
                <td class="py-4 px-6">
                  @if($user->is_admin)
                  Admin
                  @else
                  User
                  @endif
                </td>
                <td class="py-4 px-6">
                    <a href="{{route('admin.users.edit' , $user->id)}}" class="font-medium text-blue-600  hover:underline">Change Role</a>
                  </td>
                  <td>
                  </td>
            </tr>
     @endforeach
        </tbody>
    </table>
</div>


        </div>
    </div>
</x-admin-layout>
