@extends('common.base')

@section('title')
    Recuperar contraseña
@endsection

@section('content')
    <div class="contentDiv">

        <div id="recoverPassContainer">
            <div class="sectionTitle">Recuperar Contraseña</div>
            <hr />
            <form method="POST" action="{{ route('vol.recoveryPasswordClic') }}">
                @csrf
                <div class="eachRecoverPassElement">
                    <label id="persMailVolLabel" class="formSections" for="persMailVol">Correo Electrónico:</label>
                    <br />
                    <input type="email" id="persMailVol" name="persMailVol" required>
                    <br />
                    <div class="recoverContainer">
                        <button type="submit" id="recoverSubmitButton">Recuperar</button>
                    </div>
                </div>
            </form>


        </div>
    </div>
@endsection
