<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-5">
      <a href="{{route('admin.orders.index')}}" class="px-4 py-1 ml-1 text-blue-400 font-semibold hover:font-bold"><i class="fa-solid fa-hand-point-left pr-1"></i>Back</a>
      {{-- Order no. and status --}}
       <div class="w-full h-32 bg-gray-50 rounded-lg drop-shadow-xl pl-6 pt-4 space-y-2 mt-3">
        <h5 class="text-xl">Order details : <span class="font-bold text-lg">#{{$singleOrder->order_no}}</span></h5>
        <p>{{date_format($singleOrder->created_at ,"M j, Y, h:i A")}}</p>
         <p>Status : <span class="bg-amber-200 w-fit px-1 py-1 rounded-md text-sm">{{$singleOrder->status}}</span></p>

       </div>
       {{-- Billing address , shipping address , payment option --}}
       <div class="w-full my-6 h-44 bg-gray-50 rounded-lg drop-shadow-xl grid grid-cols-3 px-6 py-3">
        <div class="w-full h-full space-y-1">
          <h5 class="font-bold pb-2">Billing Address</h5>
          <p class="capitalize">{{$singleOrder->customers->firstname}} {{$singleOrder->customers->lastname}}</p>
          <p class="text-sm">{{$singleOrder->customers->address}}</p>
          <p>Email : {{$singleOrder->customers->users->email}}</p>
          <p>Phone: +254{{$singleOrder->customers->phone}}</p>
        </div>
        <div class="w-full h-full space-y-1">
          <h5 class="font-bold pb-2">Shipping Address</h5>
          <p class="capitalize">{{$singleOrder->customers->firstname}} {{$singleOrder->customers->lastname}}</p>
          <p class="text-sm">{{$singleOrder->customers->address}}</p>
          <p class="opacity-60">(Free Shipping)</p>
        </div>
        <div class="w-full h-full space-y-1">
          <h5 class="font-bold pb-2">Payment Method</h5>
          {{-- <p>{{$singleOrder->orderDetails->payment_type}}</p> --}}
        </div>
       </div>
       {{-- Order details --}}
       <div class="relative h-80 w-full bg-gray-50 rounded-lg drop-shadow-xl pt-5 text-justify">
         <table class="ml-6 w-5/6">
          <thead class="h-10 rounded-lg bg-blue-50">
            <tr>
              <th class="pl-6">
                Products
              </th>
              <th>
                Quantity
              </th>
              <th>
                Amount
              </th>
            </tr>
          </thead>
          <tbody>
            @foreach($singleOrder->orderDetails as $item)
            <tr class="border-b border-black border-opacity-5 h-12">
              <td class="pl-6">
                {{$item->product_name}}
              </td>
              <td>
                {{$item->quantity}}
              </td>
              <td>
                {{$item->total}}
              </td>
            </tr>
            @endforeach
          </tbody>
         </table>
         <div class="absolute bottom-0 right-0 mr-10 mb-4">
          <p class="font-bold">Total: Ksh <span></span></p>
         </div>
       </div>
    </div>
</x-admin-layout>