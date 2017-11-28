@component('mail::message')
# Nog één laatste stap.

We hoeven alleen nog maar je email adres. Zodat wij zeker weten dat jij geen robot bent. Dat snap je toch? Cool!

@component('mail::button', ['url' => url('/register/confirm?token=' . $user->confirmation_token)])
Bevestig email adres
@endcomponent

Dankuwel,<br>
{{ config('app.name') }} Team
@endcomponent
