<div>
    {{-- If your happiness depends on money, you will never be happy with yourself. --}}
    Datos de fileUrl : {{ asset($fileUrl) }} <br>
    Datos de fileUrlPublic : {{ asset($fileUrlPublic) }} <br>
    Datos de publicUrl : {{ asset($publicUrl) }} <br>
    <div>
        <embed src="{{ $publicUrl }}" type="application/pdf" width="100%" height="600px">
    </div>


</div>