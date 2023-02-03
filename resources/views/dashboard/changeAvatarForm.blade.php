@extends('dashboard.partials.base')

@section('title')
    Formulario Cambiar Avatar
@endsection

@section('content')
    <div class="mainTray">
        <div class="sectionTitle">
            FORMULARIO CAMBIAR AVATAR
        </div>
        @if (session()->has('successUploadImage'))
            <div class="formSubmitSuccess center">
                {{ session('successUploadImage') }}
            </div>
        @endif

        <div class="mainData center">

            @if (Auth::user()->imageVol == 0 || Auth::user()->imageVol == null)
                <p>NO Tienes Avatar Actualmente</p>
            @else
                <img src="data:image/jpeg;base64,{{ base64_encode(Storage::get('avatar/' . Auth::user()->imageVol)) }}" alt="{{ Auth::user()->nameVol }}"
                    class="avatarInForm" />
            @endif
            <p>Cambiar:</p>
            <form method="POST" action="{{ route('dashboard.uploadAvatar') }}" accept-charset="UTF-8"
                enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{ Auth::user()->id }}">
                <p><input type="file" name="file" accept="image/jpeg" required></p>
                <p><button type="submit" id="registerSubmitButton" class="botonesControl">SUSTITUIR AVATAR</button></p>
            </form>
        </div>
    </div>
@endsection
