@component('mail::message')
    # Activation Email
    Hi {{ $user->name }}

    Berikut kode OTP Anda <b>{{ $user->activation_token }}</b><br>
    Silahkan Masukkan Kode OTP untuk verifikasi
    akun anda.
    {{--
    @component('mail::button', ['url' => ''])
        Aktifasi
    @endcomponent --}}

    Thanks,<br>
    {{ config('app.name') }}
@endcomponent
