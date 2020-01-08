@component('mail::message')
# Welcome {{strtoupper($user->name)}}

We are thrilled to see You on Petgram. Let's make Pets great again!

@component('mail::panel')
Username: {{$user->username}}.
@endcomponent
{{-- @component('mail::button', ['url' => ''])
Button Text
@endcomponent

@component('mail::table')
| Laravel       | Table         | Example  |
| ------------- |:-------------:| --------:|
| Col 2 is      | Centered      | $10      |
| Col 3 is      | Right-Aligned | $20      |
@endcomponent

@component('mail::panel')
This is the panel content.
@endcomponent --}}

Have a great day,<br>
{{ config('app.name') }}
@endcomponent
