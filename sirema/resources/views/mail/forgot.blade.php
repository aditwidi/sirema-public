@component('mail::message')
    <p>Hello {{$user->name}}</p>
    @component('mail::button',['url' => url('reset/'.$user->remember_token)])
        reset your password
    @endcomponent
@endcomponent