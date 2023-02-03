@extends('dashboard.partials.base')

@section('title')
    Crear Información Extra
@endsection

@section('content')
    <div class="mainTray ">
        <div class="sectionTitle">
            Crear Información Extra
        </div>

        <form method="POST" action="{{ route('dashboard.uploadInfoExtra') }}" accept-charset="UTF-8"
            enctype="multipart/form-data">
            @csrf
            <div class="mainData center">

                <input type="hidden" name="id" value="{{ $id }}">

                <div class="eachCreateInfoExtraElement">
                    <p>
                        <input type="file" name="infoExtra" accept=".pdf" required>
                    </p>
                </div>
                <div class="eachCreateInfoExtraElement">
                    <p>
                        <label id="labelTitleInfoExtra" class="formSections" for="titleInfoExtra">Titulo del
                            documento:</label>
                        <br />
                        <input type="text" id="titleInfoExtra" name="titleInfoExtra" required>
                    </p>
                </div>
                <div class="eachCreateInfoExtraElement">
                    <button type="submit" class="botonesControl">Guardar</button>
                </div>
            </div>
        </form>
    </div>
@endsection
