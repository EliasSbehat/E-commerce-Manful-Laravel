<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

        <div x-data="{ showMessage: true }" x-show="showMessage" x-init="setTimeout(() => showMessage = false, 3000)">
            @if(session('message'))
            <p class="bg-green-400 py-0.5 rounded-lg text-white font-bold px-4 w-1/2 ml-5">{{session('message')}}</p>
            @endif
        </div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
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
                            <td class="py-4 px-6 flex space-x-4">
                                <a title="Edit" href="{{route('admin.users.edit' , $user->id)}}" class="font-medium text-blue-600  hover:underline"><i class="fa-solid fa-pen-to-square"></i></a>
                                @if($user->trashed())
                                <form action="{{route('admin.users.restore', $user->id)}}" method="POST" onsubmit="return confirm('Are you sure to reactivate user?')">
                                    @csrf
                                    <input type="hidden" name="id" value="{{auth()->user()->id}}">
                                    <button title="Restore" type="submit" class="text-green-500"><i class="fa-solid fa-trash-can-arrow-up"></i></a>
                                </form>
                                @else
                                <form action="{{route('admin.users.destroy' , $user->id)}}" method="POST" onsubmit="return confirm('Are you sure to deactivate user?')">
                                    @csrf
                                    @method('DELETE')
                                    <button title="Delete" type="submit" class="text-red-500"><i class="fa-solid fa-trash"></i></button>
                                </form>
                                @endif
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
