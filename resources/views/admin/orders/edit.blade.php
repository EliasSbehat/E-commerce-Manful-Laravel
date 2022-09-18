<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="w-2/3 h-96 bg-gray-100 flex flex-col mx-auto mt-10 pl-10 pt-7 rounded-xl drop-shadow-2xl">
       <a href="{{route('admin.orders.index')}}" class=" py-1 ml-1 text-blue-400 font-semibold hover:font-bold"><i class="fa-solid fa-hand-point-left pr-1"></i>Back</a>
      <form action="{{route('admin.orders.update', $order->id)}}" method="POST" class="space-y-2 ">
        @csrf
        @method('PATCH')
        <p class="text-lg ">Status</p>
        <div>
          <select name="status"  class="w-72 rounded-lg border-gray-400 focus:border-gray-500 focus:ring-gray-500 capitalize" required>
            <option value="{{$order->status}}" selected>{{$order->status}}</option>
            <optgroup label="Change order status">
              <option value="pending">Pending</option>
              <option value="shipped">Shipped</option>
              <option value="completed">Completed</option>
              <option value="cancelled">Cancelled</option>
            </optgroup>
          </select>
        </div>
        <p>Payment Status</p>
        <div>
          <select name="payment_status" class="capitalize w-72 rounded-lg border-gray-400 focus:border-gray-500 focus:ring-gray-500" required>
            <option value="{{$order->payment_status}}" selected>{{$order->payment_status}}</option>
            <optgroup label="Change payment status">
              <option value="unpaid">Unpaid</option>
              <option value="paid">Paid</option>
              <option value="refunded">Refunded</option>
            </optgroup>
          </div>
        </select>
        {{-- <p class="mt-2">Shipping Address</p>
        <textarea name="" id="" cols="29" rows="4" class="rounded-lg border-gray-400 focus:border-gray-500 focus:ring-gray-500">{{$order->customers->address}}</textarea> --}}
        <div class="my-4">
          <button type="submit" class="px-10 py-2 bg-cyan-400 rounded-lg">Update</button>
        </form>
        </div>
      </div>

</x-admin-layout>