<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-between mb-4">
                 <a href="{{route('admin.products.create')}}" class="p-2 my-2 bg-green-400 hover:bg-green-600 text-white rounded-lg font-bold">Add new product</a>
                 {{-- Status message --}}
                <div x-data="{ showMessage: true }" x-show="showMessage" x-init="setTimeout(() => showMessage = false, 3000)">
                    @if(session('message'))
                    <p class="bg-green-400 py-0.5 text-lg rounded-lg text-white mb-2 font-bold px-4">{{session('message')}}</p>
                    @endif
              </div>
            </div>
            <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
                {{-- Pagination --}}
            <div class="mb-4">
            {{ $products->links() }}
            </div>
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-100">
            <tr>
                <th scope="col" class="py-3 px-6">
                    Product name
                </th>
                <th scope="col" class="py-3 px-6">
                    Image
                </th>

                <th scope="col" class="py-3 px-6">
                    Category
                </th>
                <th scope="col" class="py-3 px-6">
                    Price
                </th>

                <th scope="col" class="py-3 px-6">
                    Action
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                
            <tr class="bg-white border-b">
                <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap ">
                    {{$product->name}}
                </th>

                <td class="py-4 px-6">
                    <img src="{{Storage::url($product->image)}}" alt="" width="40" height="40">
                </td>
                <td class="py-4 px-6">
                {{ $product->category->name }}
            </td>
                <td class="py-4 px-6">{{$product->price}}</td>
                <td class="py-4 px-6">
                    <div class="flex space-x-2">
                        <a href="{{route('admin.products.edit', $product->id)}}" class="py-0.5 px-3 rounded text-white font-medium text-lg bg-blue-500 hover:bg-blue-700">Edit</a>
                        <form 
                        action="{{ route('admin.products.destroy' , $product->id)}}"
                        method="POST" 
                        class="py-0.5 px-3 rounded text-white font-medium text-lg bg-red-500 hover:bg-red-700"
                        onsubmit="return confirm('Are you sure?')"
                        >
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>
                        </form>
                        </div>
                </td>
            </tr>
                        @endforeach
        </tbody>
    </table>
</div>
        </div>
    </div>
</x-admin-layout>
