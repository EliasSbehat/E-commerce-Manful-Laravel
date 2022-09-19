@extends('layouts.main')
@section('title', 'Manful | Orders')
@section('content')
  <section class="h-full">
    <div x-data="{ showMessage: true }" x-show="showMessage" x-init="setTimeout(() => showMessage = false, 3000)">
      @if(session('message'))
       <p class="bg-green-400 text-white font-bold p-2 mb-3 rounded-lg">{{session('message')}}</p>
      @endif
     </div>
    <div class="w-2/3 h-fit border border-emerald-800 mr-10 pl-4 pr-2 rounded-md font-mono ml-10 mt-10">
  <h4 class="text-xl my-2 uppercase font-bold">Order Number: {{$singleOrder->order_no}}</h4>
  {{-- Order details --}}
  <table class="w-full mt-5">
    <thead class="text-justify uppercase border-b-2 border-gray-400">
      <tr>
        <th>Product</th>
        <th></th>
        <th>Total</th>
      </tr>
    </thead>
    <tbody>
     @foreach($singleOrder->orderDetails as $detail)
      <tr class="h-16 border-b border-emerald-800">
        <td class="w-1/2">{{$detail->product_name}}</td>
        <td>x {{$detail->quantity}}</td>
        <td>Ksh {{$detail->total}}</td>
      </tr>
     @endforeach
    </tbody>
  </table>
  {{-- Shipping and Totals --}}
  <div class="flex my-3">
       {{-- <h4 class="font-semibold text-lg">Status</h4> --}}
       @if($singleOrder->status == 'pending')
        <p>Status : <span class="text-white bg-amber-400 w-fit px-1 py-1 rounded-md text-sm">
          {{$singleOrder->status}}</span></p>
          {{-- Cancel Order --}}
          <form action="{{route('cancel-order')}}" method="POST" onsubmit="return confirm('Are you sure to cancel the order?')">
            @csrf
            <input type="hidden" name="singleorderid" value="{{$singleOrder->id}}">
            <button type="submit" class="ml-4 px-2 rounded-lg bg-gray-400 text-white text-sm" >Cancel Order</a>
          </form>
         @elseif($singleOrder->status == 'shipped')
         <p>Status : <span class="text-white bg-indigo-400 w-fit px-1 py-1 rounded-md text-sm">{{$singleOrder->status}}</span></p>
        @elseif($singleOrder->status == 'completed')
        <p>Status : <span class="text-white bg-green-400 w-fit px-1 py-1 rounded-md text-sm">{{$singleOrder->status}}</span></p>
         @elseif($singleOrder->status == 'cancelled')
         <p>Status : <span class="text-white bg-stone-400 w-fit px-1 py-1 rounded-md text-sm">{{$singleOrder->status}}</span></p>
        @endif
  </div>
  <div class="flex my-3">
    <h4 class="font-semibold text-lg">Total</h4>
    <p class="pl-5">Ksh 2100</p>
  </div>

</div>
  </section>
@endsection