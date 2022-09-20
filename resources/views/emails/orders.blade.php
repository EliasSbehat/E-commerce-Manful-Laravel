@component('mail::message' , ['order'=> $order])
# Order Received!

Your order has been received and is currently being processed.

@component('mail::panel')
Your order id is {{$order->order_no}}
@endcomponent

@component('mail::table')
| Product       | Quantity         | Price  |
| ------------- |:-------------:| --------:|
@foreach($order->orderDetails as $detail)
| {{$detail->product_name}}     | {{$detail->quantity}}      | {{$detail->total}}      |
@endforeach
@endcomponent

Thank you for shopping with Us,<br>
Manful
@endcomponent
