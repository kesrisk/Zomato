@component('mail::message')
# Order Placed

order Id: {{$orderDetails->id}}


@foreach($cuisines as $cuisine)

@component('mail::panel')

        cuisine: {{$cuisine['name']}} <br>
        Quantity: {{$cuisine['quantity']}} <br>
        Cost: {{$cuisine['cost']}}

@endcomponent

@endforeach


@component('mail::panel')

    Total: {{$orderDetails->total}} <br>
    Discount: {{$orderDetails->total - $orderDetails->final_total}}<br>
    Fianl Amount: {{$orderDetails->final_total}}

@endcomponent

@component('mail::button', ['url' => '/orders'])
Orders
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
