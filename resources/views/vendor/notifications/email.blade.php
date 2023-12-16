<x-mail::message>

<div class="text-center mt-3 mb-4">
    <h1 class="fw-bold">Hallo Komik Reader!</h1>
</div>


<div>
    <p>Kamu mendapatkan email ini karena kamu lupa kata sandimu! Ayo ubah kata sandimu sekarang!</p>
</div>

{{-- Intro Lines --}}
{{-- @foreach ($introLines as $line)
{{ $line }}

@endforeach --}}

{{-- Action Button --}}
@isset($actionText)
<?php
    $color = match ($level) {
        'success', 'error' => $level,
        default => 'primary',
    };
?>
<x-mail::button :url="$actionUrl" :color="$color">
{{ $actionText }}
</x-mail::button>
@endisset

<p>Mari kita nikmati keindahan dunia komik, di mana setiap halaman penuh dengan petualangan luar biasa, dan cerita yang memikat.</p>
<p>Bersiaplah untuk memasuki dunia yang menyenangkan. Ayo jelajahi kisah-kisah menarik yang bisa merubah hari-harimu!</p>


<p style="margin-top: 30px; color: #ef6864" class="fw-bold"><br>Komiktoon</p>


<hr>
<p>Jika terdapat masalah pada tombol "Reset Password" silahkan salin dan paste url berikut di browser anda : <br> <a href="" class="text-decoration-none">{{ $displayableActionUrl }} </a></p>
<a class="break-all"></a>


</x-mail::message>
