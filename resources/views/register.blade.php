@extends('common.base')

@section('title')
    Registro
@endsection

@section('content')
    <div id="registerContainer">
        <div class="sectionTitle">Registro</div>
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <div class="formSubmitError">{{ $error }}</div>
            @endforeach
        @endif

        <form method="POST" action="{{ route('vol.save') }}" id="registerForm">
            @csrf
            <div id="registerSheetOne">
                <div class="RegisterContainer">
                    <div class="eachRegisterElement">
                        <label id="nameVolLabel" class="formSections" for="nameVol">Nombre:<span
                                class="redMark">*</span></label>
                        <br />
                        <input type="text" id="nameVol" name="nameVol" required autofocus>
                        <br />
                        <p id="nameError" class="formError">El nombre es obligatorio.</p>
                    </div>

                    <div class="eachRegisterElement">
                        <label id="surnameVolLabel" class="formSections" for="surnameVol">Apellido:<span
                                class="redMark">*</span></label>
                        <br />
                        <input type="text" id="surnameVol" name="surnameVol" required>
                        <br />
                        <p id="surnameError" class="formError">El apellido es obligatorio.</p>
                    </div>

                    <div class="eachRegisterElement">
                        <label id="surname2VolLabel" class="formSections" for="surname2Vol">Segundo Apellido:<span
                                class="redMark">*</span></label>
                        <br />
                        <input type="text" id="surname2Vol" name="surname2Vol" required>
                        <br />
                        <p id="surname2Error" class="formError">El segundo apellido es obligatorio.</p>
                    </div>
                </div>
                <div class="RegisterContainer">
                    <div class="eachRegisterElement">
                        <label id="birthDateVolLabel" class="formSections" for="birthDateVol">Fecha de Nacimiento:<span
                                class="redMark">*</span></label>
                        <br />
                        <input type="date" id="birthDateVol" name="birthDateVol" required>
                        <br />
                        <p id="birthDateError" class="formError">La Fecha de Nacimiento no es correcta.</p>
                    </div>
                    <div class="eachRegisterElement">
                        <label id="typeDocVolLabel" class="formSections" for="typeDocVol">Tipo de documento:<span
                                class="redMark">*</span></label>
                        <br />
                        <select id="typeDocVol" name="typeDocVol" required>
                            <option value="">Seleccione:</option>
                            <option value="dni">DNI</option>
                            <option value="nie">NIE</option>
                        </select>
                        <br />
                        <p id="typeDocError" class="formError">El tipo de documento es obligatorio.</p>
                    </div>
                    <div class="eachRegisterElement">
                        <label id="numDocVolLabel" class="formSections" for="numDocVol">Número de documento:<span
                                class="redMark">*</span></label>
                        <br />
                        <input type="text" id="numDocVol" name="numDocVol" required>
                        <br />
                        <p id="numDocError" class="formError">Número de documento es obligatorio.</p>
                        <p id="numDocWrongError" class="formError">Número de documento no es Valido.</p>

                    </div>
                </div>
                <div class="RegisterContainer" id="registerAuth">
                    <div class="eachRegisterElement">
                        <label id="nameAuthVolLabel" class="formSections" for="nameAuthVol">Nombre del autorizador:<span
                                class="redMark">*</span></label>
                        <br />
                        <input type="text" id="nameAuthVol" name="nameAuthVol">
                        <br />
                        <p id="nameVolError" class="formError">El nombre del autorizador es obligatorio.</p>
                    </div>
                    <div class="eachRegisterElement">
                        <label id="tlfAuthVolLabel" class="formSections" for="tlfAuthVol">Teléfono del autorizador:<span
                                class="redMark">*</span></label>
                        <br />
                        <input type="text" id="tlfAuthVol" name="tlfAuthVol">
                        <br />
                        <p id="telAuthError" class="formError">El Teléfono es obligatorio.</p>
                    </div>
                    <div class="eachRegisterElement">
                        <label id="numDocAuthVolLabel" class="formSections" for="numDocAuthVol">Número de documento del
                            autorizador:<span class="redMark">*</span></label>
                        <br />
                        <input type="text" id="numDocAuthVol" name="numDocAuthVol">
                        <br />
                        <p id="numDocAuthError" class="formError">Número de documento es obligatorio.</p>
                        <p id="numDocAuthWrongError" class="formError">Número de documento no es Valido.</p>
                    </div>
                </div>
                <div class="RegisterContainer">
                    <div class="eachRegisterElement">
                        <label id="telVolLabel" class="formSections" for="telVol">Teléfono:<span
                                class="redMark">*</span></label>
                        <br />
                        <input type="text" id="telVol" name="telVol" required>
                        <br />
                        <p id="telError" class="formError">El Teléfono es obligatorio.</p>
                    </div>
                    <div class="eachRegisterElement">
                        <label id="sexVolLabel" class="formSections" for="sexVol">Sexo:<span
                                class="redMark">*</span></label>
                        <br />
                        <select id="sexVol" name="sexVol" required>
                            <option value="">Seleccione:</option>
                            <option value="hombre">Hombre</option>
                            <option value="mujer">Mujer</option>
                            <option value="otro">Otro</option>
                        </select>
                        <br />
                        <p id="sexVolError" class="formError">El sexo es obligatorio.</p>
                    </div>
                    <div class="eachRegisterElement">
                        <label id="shirtSizeVolLabel" class="formSections" for="shirtSizeVol">Talla de camiseta:<span
                                class="redMark">*</span></label>
                        <br />
                        <select id="shirtSizeVol" name="shirtSizeVol" required>
                            <option value="">Seleccione:</option>
                            <option value="XS">XS</option>
                            <option value="S">S</option>
                            <option value="M">M</option>
                            <option value="L">L</option>
                            <option value="XL">XL</option>
                            <option value="2XL">2XL</option>
                            <option value="3XL">3XL</option>
                        </select>
                        <br />
                        <p id="shirtSizeError" class="formError">Talla de camiseta es obligatoria.</p>
                    </div>
                </div>
                <div class="RegisterContainer">
                    <div class="eachRegisterElement">
                        <label id="persMailVolLabel" class="formSections" for="persMailVol">Correo electrónico:<span
                                class="redMark">*</span></label>
                        <br />
                        <input type="email" id="persMailVol" name="persMailVol" required>
                        <br />
                        <p id="persMailError" class="formError">El correo electrónico es obligatorio.</p>
                        <p id="persMailWrongError" class="formError">El correo electrónico no es Valido.</p>
                    </div>
                    <div class="eachRegisterElement">
                        <label id="persMailConfVolLabel" class="formSections" for="persMailConfVol">Repetir Correo
                            electrónico:<span class="redMark">*</span></label>
                        <br />
                        <input type="email" id="persMailConfVol" name="persMailConfVol" required>
                        <br />
                        <p id="persMailConfError" class="formError">El correo electrónico es obligatorio.</p>
                        <p id="persMailMatchError" class="formError">Los Correos electrónicos no coinciden.</p>
                    </div>
                    <div class="eachRegisterElement" style="display:none;">
                        &nbsp;
                    </div>
                </div>
                <div class="RegisterContainer" style="margin-bottom: 50px;">
                    <div class="eachLongRegisterElement">
                        <input type="checkbox" name="dataConf" id="dataConf" required>
                        <label id="dataConfLabel" class="formSections" for="dataConf"><span class="redMark">*</span>He
                            leído y aceptado la política de privacidad. </label>
                        <br />
                        <p id="dataConfError" class="formError">Debes de marcar esto.</p>
                    </div>
                    <div class="eachLongRegisterElement">
                        <input type="checkbox" name="offenseConf" id="offenseConf" required>
                        <label id="offenseConfLabel" class="formSections" for="offenseConf"><span
                                class="redMark">*</span>Que la persona cuyos datos figuran como titular de la cuenta de
                            usuario carece de antecedentes penales por cualquiera de los delitos a que hace referencia el
                            apartado 5º del artículo 8 de la Ley 45/2015, de 14 de octubre, de Voluntariado, el cual señala
                            textualmente que: "No podrán ser voluntarias las personas que tengan antecedentes penales no
                            cancelados por delitos de violencia doméstica o de género, por atentar contra la vida, la
                            integridad física, la libertad, la integridad moral o la libertad e indemnidad sexual del otro
                            cónyuge o de los hijos, o por delitos de tráfico ilegal o inmigración clandestina de personas, o
                            por delitos de terrorismo en programas cuyos destinatarios hayan sido o puedan ser víctimas de
                            estos delitos". </label>
                        <br />
                        <p id="offenseConfError" class="formError">Debes de marcar esto.</p>
                    </div>
                </div>
                <div class="RegisterContainer">
                    <div class="eachRegisterElement" style="display:none;">
                        &nbsp;
                    </div>
                    <div class="eachRegisterElement" style="display:none;">
                        &nbsp;
                    </div>
                    <div class="eachRegisterElement">
                        <img width="40" height="40" src="<?php echo asset('images/icons/next.png'); ?>" title="Siguiente"
                            id="nextRegisterFirst" alt="Siguiente" />
                    </div>
                </div>
            </div>
            <div id="registerSheetTwo">
                <div class="RegisterContainer">
                    <div class="eachRegisterElement">
                        <label id="typeViaVolLabel" class="formSections" for="typeViaVol">Tipo de vía:<span
                                class="redMark">*</span></label>
                        <br />
                        <select id="typeViaVol" name="typeViaVol" required>
                            <option value="">Seleccione:</option>
                            <option value="Autopista">Autopista</option>
                            <option value="Autovia">Autovía</option>
                            <option value="Avenida">Avenida</option>
                            <option value="Bulevar">Bulevar</option>
                            <option value="Calle">Calle</option>
                            <option value="Calle peatonal">Calle peatonal</option>
                            <option value="Callejon">Callejón</option>
                            <option value="Camino">Camino</option>
                            <option value="Cañada">Cañada real</option>
                            <option value="Carretera">Carretera</option>
                            <option value="Carretera de circunvalación">Carretera de circunvalación</option>
                            <option value="Carril">Carril</option>
                            <option value="Ciclovia">Ciclovía</option>
                            <option value="Corredera">Corredera</option>
                            <option value=">Costanilla">Costanilla</option>
                            <option value="Parque">Parque</option>
                            <option value="Pasadizo elevado">Pasadizo elevado</option>
                            <option value="Pasaje">Pasaje</option>
                            <option value="Paseo maritimo">Paseo marítimo</option>
                            <option value="Plaza">Plaza</option>
                            <option value="Pretil">Pretil</option>
                            <option value="Puente">Puente</option>
                            <option value="Ronda">Ronda</option>
                            <option value="Sendero">Sendero</option>
                            <option value="Travesia">Travesía</option>
                            <option value="Tunel">Túnel</option>
                            <option value="Via pecuaria">Vía pecuaria</option>
                            <option value="Via rapida">Vía rápida</option>
                            <option value="Via verde">Vía verde</option>
                            <option value="Urbanizacion">Urbanización</option>
                        </select>
                        <br />
                        <p id="typeViaError" class="formError">El Tipo de vía es obligatorio.</p>
                    </div>
                    <div class="eachRegisterElement">
                        <label id="direcVolLabel" class="formSections" for="direcVol">Dirección:<span
                                class="redMark">*</span></label>
                        <br />
                        <input type="text" id="direcVol" name="direcVol" required>
                        <br />
                        <p id="direcError" class="formError">La dirección es obligatorio.</p>
                    </div>
                    <div class="eachRegisterElement">
                        <label id="numVolLabel" class="formSections" for="numVol">Número:<span
                                class="redMark">*</span></label>
                        <br />
                        <input type="text" id="numVol" name="numVol" required>
                        <br />
                        <p id="numError" class="formError">El número es obligatorio.</p>
                    </div>
                </div>
                <div class="RegisterContainer">
                    <div class="eachRegisterElement">
                        <label id="flatVolLabel" class="formSections" for="flatVol">Piso:</label>
                        <br />
                        <input type="text" id="flatVol" name="flatVol">
                        <br />
                    </div>
                    <div class="eachRegisterElement">
                        <label id="VolLabel" class="formSections" for="aditiInfoVol">Información adicional:</label>
                        <br />
                        <input type="text" id="aditiInfoVol" name="aditiInfoVol">
                        <br />
                    </div>
                    <div class="eachRegisterElement" style="display:none;">
                        &nbsp;
                    </div>
                </div>
                <div class="RegisterContainer">
                    <div class="eachRegisterElement">
                        <label id="codPosVolLabel" class="formSections" for="codPosVol">Código Postal:<span
                                class="redMark">*</span></label>
                        <br />
                        <input type="text" id="codPosVol" name="codPosVol" required>
                        <br />
                        <p id="codPosError" class="formError">El código postal es obligatorio.</p>
                        <p id="codPosMal" class="formError">El código postal no es valido.</p>

                    </div>
                    <div class="eachRegisterElement">
                        <label id="stateVolLabel" class="formSections" for="stateVol">Provincia:<span
                                class="redMark">*</span></label>
                        <br />
                        <input type="text" id="stateVol" name="stateVol" readonly>
                        <br />
                        <p id="stateError" class="formError">El provincia es obligatorio.</p>
                    </div>
                    <div class="eachRegisterElement">
                        <label id="townVolLabel" class="formSections" for="townVol">Localidad:<span
                                class="redMark">*</span></label>
                        <br />
                        <input type="text" id="townVol" name="townVol" required>
                        <br />
                        <p id="townError" class="formError">La localidad es obligatorio.</p>
                    </div>
                </div>
                <div class="fullRegisterContainer">
                    <button type="submit" id="registerSubmitButton">Enviar</button>
                </div>
                <div class="RegisterContainer">
                    <div class="eachRegisterElement">
                        <img width="40" height="40" src="<?php echo asset('images/icons/back.png'); ?>" title="Volver"
                            id="backRegisterSecond" alt="Volver" />
                    </div>
                    <div class="eachRegisterElement" style="display:none;">
                        &nbsp;
                    </div>
                    <div class="eachRegisterElement" style="display:none;">
                        &nbsp;
                    </div>
                </div>
            </div>

        </form>
    </div>
@endsection


@section('library')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script type="text/javascript" src="{{ URL::asset('js/register.js') }}"></script>
@endsection
