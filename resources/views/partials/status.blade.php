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
                  <button class="px-2 py-1 text-white font-bold bg-gray-400 text-center cursor-default rounded-lg">
                    {{$order->status}}
                  </button>
                  @endif

                  