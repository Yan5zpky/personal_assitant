@component('mail::message')
# New Comment

Your article has a new comment.

@component('mail::button', ['url' => 'homestead.test'])
Login
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
