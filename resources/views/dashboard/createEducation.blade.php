@extends('dashboard.partials.base')

@section('title')
    Formulario crear educación
@endsection

@section('content')
    <div class="mainTray">
        <div class="sectionTitle">
            FORMULARIO CREAR EDUCACIÓN
        </div>
        @if (session()->has('successCreateEdu'))
            <div class="formSubmitSuccess center">
                {{ session('successCreateEdu') }}
            </div>
        @endif

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form method="POST" action="{{ route('dashboard.saveEducation') }}" accept-charset="UTF-8"
            enctype="multipart/form-data">
            @csrf
            <div class="mainData center">


                <div class="eachCreateEducationElement">
                    <p>
                        <label id="labelTitleEdu" class="formSections" for="titleEdu">Titulo :</label>
                        <br />
                        <input type="text" id="titleEdu" name="titleEdu" required>
                    </p>
                </div>
                <div class="eachCreateEducationElement">
                    <p>
                        <label id="labelHoursEdu" class="formSections" for="hoursEdu">Cantidad de horas:</label>
                        <br />
                        <input type="number" id="hoursEdu" name="hoursEdu" required>
                    </p>
                </div>

                <div class="eachCreateEducationElement">
                    <p>
                        <label id="labelEndEdu" class="formSections" for="endEdu">Fecha de finalizacion :</label>
                        <br />
                        <input type="date" id="endEdu" name="endEdu" required>
                    </p>
                </div>
                <div class="eachCreateEducationElement">
                    <p>
                        <input type="file" name="file" accept=".pdf" required>
                    </p>
                </div>
                <div class="eachCreateEducationElement">
                    <p>
                        <button type="submit" id="registerSubmitButton" class="botonesControl">CREAR ESTUDIO</button>
                    </p>
                </div>
            </div>
        </form>
    </div>
@endsection
