{{--@component('mail::message')--}}
{{--# Introduction--}}

{{--The body of your message.--}}

<h1>Allıcı</h1>
<p>Adı: {{$data['name']}}</p>
<p>
    email: {{$data['email']}}
</p>
<p>
    telefon:{{$data['phone']}}
</p>
<a href="azergubre.az/products/{{$data['product_id']}}">Məhsul</a>
{{--@component('mail::button', ['url' => ''])--}}
{{--Button Text--}}
{{--@endcomponent--}}

{{--Thanks,<br>--}}
{{--{{ config('app.name') }}--}}
{{--@endcomponent--}}
