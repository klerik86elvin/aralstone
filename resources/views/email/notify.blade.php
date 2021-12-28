{{--@component('mail::message')--}}
{{--# Introduction--}}

{{--The body of your message.--}}

<h1>Müraciyətçi</h1>
<p>Adı: {{$data['name']}}</p>
<p>
    email: {{$data['email']}}
</p>
<p>
    mətn:{{$data['text']}}
</p>
{{--@component('mail::button', ['url' => ''])--}}
{{--Button Text--}}
{{--@endcomponent--}}

{{--Thanks,<br>--}}
{{--{{ config('app.name') }}--}}
{{--@endcomponent--}}
