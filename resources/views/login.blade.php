@extends('common.base')

@section('title')
    Login
@endsection

@section('content')
    <div class="contentDiv">

        <div id="loginContainer">
            <div class="sectionTitle">Accede a tu Área Privada</div>
            <hr />
            @if (session()->get('errorLogin'))
                <div class="formSubmitError">
                    {{ session()->get('errorLogin') }}
                </div>
            @endif

            <form method="POST" action="{{ route('vol.doLogin') }}">
                @csrf
                <div class="eachLoginElement">
                    <label id="numDocVolLabel" class="formSections" for="numDocVol">Numero de documento:</label>
                    <br />
                    <input type="text" id="numDocVol" name="numDocVol" value="{{ old('numDocVol') }}"
                        style="margin-right: -10px;" required>
                    <br />
                </div>
                <div class="eachLoginElement">
                    <label id="passwordLabel" class="formSections" for="password">Contraseña</label>
                    <br />
                    <input type="password" id="password" name="password" required>
                    <i class='bx bx-show' id="togglePassword" style="margin-left: -30px;cursor: pointer;"></i>
                    <br />
                </div>
                <div class="loginContainer" id="passRecLink">
                    <a href="{{ route('vol.recoveryPassWord') }}" class="formLink">Olvidaste tu contraseña</a>
                </div>
                <div class="loginContainer">
                    <button type="submit" id="loginSubmitButton">Acceder</button>
                </div>
            </form>
            <div class="eachLoginElement">
                <a href="{{ route('vol.create') }}" class="formLink">¿Quieres registrarte?</a>
            </div>
        </div>
    </div>
@endsection

@section('library')
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

    <script>
        $(() => {
            $('#togglePassword').on("click", () => {
                const type = $('#password').attr('type') === 'password' ? 'text' : 'password';
                $('#password').attr("type", type);
            });
        });
    </script>
@endsection
