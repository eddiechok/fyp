@component('mail::message')
# Order Received

Thank you for your order!

**Order No:** {{ $order->order_no }}

**Order Email:** {{ $order->billing_email }}

**Order Name:** {{ $order->billing_name }}

**Order Total:** {{ presentPrice($order->billing_total) }}

**Items Ordered: **

<ul>
@foreach($order->products as $product)
<li>
	Name: {{ $product->name }} <br>
	Price: {{ presentPrice($product->price) }} <br>
	Quantity: {{ $product->pivot->quantity }} <br>
</li>
<br>
@endforeach
</ul>

**For more information, please view your order by visiting our website.**

@component('mail::button', ['url' => config('app.url')])
View Order
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent

