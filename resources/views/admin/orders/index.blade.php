<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12" >
        <div x-data="{ showMessage: true }" x-show="showMessage" x-init="setTimeout(() => showMessage = false, 3000)">
            @if(session('success'))
            <p class="bg-green-400 py-0.5 text-lg rounded-lg text-white mb-2 font-bold pl-4">{{session('success')}}</p>
            @endif
        </div>
<div class="overflow-x-auto relative shadow-md sm:rounded-lg">
    
    {{-- Pending Orders --}}
        
    <h5 class="text-2xl font-bold py-4 px-3">Pending Orders</h5>
    <table class="w-full text-sm text-left text-gray-500">
        <thead class="text-sm text-gray-700 uppercase bg-gray-50">
            <tr>
                <th scope="col" class="py-3 px-6">
                    Order
                </th>
                <th scope="col" class="py-3 px-6">
                    <div class="flex items-center">
                        Date
                    </div>
                </th>
                <th scope="col" class="py-3 px-6">
                    <div class="flex items-center">
                        Payment Status
                    </div>
                </th>
                <th scope="col" class="py-3 px-6">
                    <div class="flex items-center">
                        Ship To
                        
                    </div>
                </th>
                <th scope="col" class="py-3 px-6">
                    <div class="flex items-center">
                        Status
                        <a href="#"><svg xmlns="http://www.w3.org/2000/svg" class="ml-1 w-3 h-3" aria-hidden="true" fill="currentColor" viewBox="0 0 320 512"><path d="M27.66 224h264.7c24.6 0 36.89-29.78 19.54-47.12l-132.3-136.8c-5.406-5.406-12.47-8.107-19.53-8.107c-7.055 0-14.09 2.701-19.45 8.107L8.119 176.9C-9.229 194.2 3.055 224 27.66 224zM292.3 288H27.66c-24.6 0-36.89 29.77-19.54 47.12l132.5 136.8C145.9 477.3 152.1 480 160 480c7.053 0 14.12-2.703 19.53-8.109l132.3-136.8C329.2 317.8 316.9 288 292.3 288z"></path></svg></a>
                    </div>
                </th>
                <th class="py-3 px-2">
                    Action
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
            @if($order->status == 'pending' || $order->payment_status == 'unpaid')
            <tr class="bg-white border-b">
                <td scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap">
                  <a href="{{route('admin.orders.show', $order->id)}}">
                    <h5 class="text-cyan-500 font-semibold uppercase">#{{$order->id}} by 
                        <br>
                        {{$order->customers->firstname}} {{$order->customers->lastname}}<h5>                      
                    </a>
                </td>
                <td class="py-4 px-3">
                    {{date("m-d-Y", strtotime($order->created_at))}}
                </td>
                <td class="py-4 px-10">
                   @if($order->payment_status == 'unpaid')
                    <button class="px-2 py-1 text-white font-bold bg-amber-500 text-center cursor-default rounded-lg">
                        {{$order->payment_status}}
                    </button>
                    @endif
                   @if($order->payment_status == 'paid')
                    <button class="px-2 py-1 text-white font-bold bg-green-400 text-center cursor-default rounded-lg">
                        {{$order->payment_status}}
                    </button>
                    @endif
                </td>
                <td class="py-4 px-6">
                    {{$order->customers->city}} , {{$order->customers->address}} 
                </td>
                <td class="py-4 pr-10 pl-4">

                  @if($order->status == 'pending')    
                  <button class="px-2 py-1 text-white font-bold bg-amber-500 text-center cursor-default rounded-lg">
                    {{$order->status}}
                  </button>
                  @elseif($order->status == 'shipped')
                  <button class="px-2 py-1 text-white font-bold bg-indigo-400 text-center cursor-default rounded-lg">
                    {{$order->status}}
                  </button>
                  @elseif($order->status == 'completed')
                  <button class="px-2 py-1 text-white font-bold bg-emerald-400 text-center cursor-default rounded-lg">
                    {{$order->status}}
                  </button>
                  @endif
                </td>
                <td class="py-4 px-3 text-white font-bold">
                 <a href="{{route('admin.orders.edit' , $order->id)}}" class="px-3 py-1 bg-cyan-500 rounded-lg">Update</a>
                </td>
            </tr>
            @endif
            @endforeach
            
        </tbody>
    </table>
    {{-- All Orders --}}
    <h5 class="text-2xl font-bold py-4 px-3 mt-12">All Orders</h5>
    <table class="w-full text-sm text-left text-gray-500">
        <thead class="text-sm text-gray-700 uppercase bg-gray-50">
            <tr>
                <th scope="col" class="py-3 px-6">
                    Order
                </th>
                <th scope="col" class="py-3 px-6">
                    <div class="flex items-center">
                        Date
                    </div>
                </th>
                <th scope="col" class="py-3 px-6">
                    <div class="flex items-center">
                        Payment Status
                    </div>
                </th>
                <th scope="col" class="py-3 px-6">
                    <div class="flex items-center">
                        Ship To
                        
                    </div>
                </th>
                <th scope="col" class="py-3 px-6">
                    <div class="flex items-center">
                        Status
                        <a href="#"><svg xmlns="http://www.w3.org/2000/svg" class="ml-1 w-3 h-3" aria-hidden="true" fill="currentColor" viewBox="0 0 320 512"><path d="M27.66 224h264.7c24.6 0 36.89-29.78 19.54-47.12l-132.3-136.8c-5.406-5.406-12.47-8.107-19.53-8.107c-7.055 0-14.09 2.701-19.45 8.107L8.119 176.9C-9.229 194.2 3.055 224 27.66 224zM292.3 288H27.66c-24.6 0-36.89 29.77-19.54 47.12l132.5 136.8C145.9 477.3 152.1 480 160 480c7.053 0 14.12-2.703 19.53-8.109l132.3-136.8C329.2 317.8 316.9 288 292.3 288z"></path></svg></a>
                    </div>
                </th>
                <th class="py-3 px-2">
                    Action
                </th>
            </tr>
        </thead>
        <tbody>
          @foreach ($orders as $order)
            <tr class="bg-white border-b">
                <td scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap">
                  <a href="{{route('admin.orders.show', $order->id)}}">
                    <h5 class="text-cyan-500 font-semibold uppercase">#{{$order->id}} by 
                        <br>
                        {{$order->customers->firstname}} {{$order->customers->lastname}}<h5>                      
                    </a>
                </td>
                <td class="py-4 px-3">
                    {{date("m-d-Y", strtotime($order->created_at))}}
                </td>
                <td class="py-4 px-10">
                   @if($order->payment_status == 'unpaid')
                    <button class="px-2 py-1 text-white font-bold bg-amber-500 text-center cursor-default rounded-lg">
                        {{$order->payment_status}}
                    </button>
                    @endif
                   @if($order->payment_status == 'paid')
                    <button class="px-2 py-1 text-white font-bold bg-green-400 text-center cursor-default rounded-lg">
                        {{$order->payment_status}}
                    </button>
                    @endif
                </td>
                <td class="py-4 px-6">
                    {{$order->customers->city}} , {{$order->customers->address}} 

                </td>
                <td class="py-4 pr-10 pl-4">
                  @if($order->status == 'pending')    
                  <button class="px-2 py-1 text-white font-bold bg-amber-500 text-center cursor-default rounded-lg">
                    {{$order->status}}
                  </button>
                  @elseif($order->status == 'shipped')
                  <button class="px-2 py-1 text-white font-bold bg-indigo-400 text-center cursor-default rounded-lg">
                    {{$order->status}}
                  </button>
                  @elseif($order->status == 'completed')
                  <button class="px-2 py-1 text-white font-bold bg-emerald-400 text-center cursor-default rounded-lg">
                    {{$order->status}}
                  </button>
                  @elseif($order->status == 'cancelled')
                  <button class="px-2 py-1 text-white font-bold bg-stone-400 text-center cursor-default rounded-lg">
                    {{$order->status}}
                  </button>
                  @endif
                </td>
                <td class="py-4 px-3 text-white font-bold">
                 <a href="{{route('admin.orders.edit' , $order->id)}}" class="px-3 py-1 bg-cyan-500 rounded-lg">Update</a>
                </td>
            </tr>
                     @endforeach
        </tbody>
    </table>
</div>


      </div>
</x-admin-layout>