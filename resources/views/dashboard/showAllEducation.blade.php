@extends('dashboard.partials.base')

@section('title')
    Mostrar todos los estudios
@endsection

@section('content')
    <div class="mainTray">
        <div class="sectionTitle">
            MUESTRA TODOS LOS ESTUDIOS
        </div>

        @if (session()->has('deleteEducation'))
            <div class="formSubmitSuccess center">
                {{ session('deleteEducation') }}
            </div>
        @endif

        @if (session()->has('uploadEducation'))
            <div class="formSubmitSuccess center">
                {{ session('uploadEducation') }}
            </div>
        @endif
        <div class="center">
            <form method="POST" action="{{ route('dashboard.createEducation') }}" accept-charset="UTF-8"
                enctype="multipart/form-data">
                @csrf
                <p><button type="submit" id="deleteEdu" class="botonesControl">Registrar<br /><i
                            class='bx bxs-edit'></i></button></p>
            </form>
        </div>
        @if (count($education) == 0)
            <div class="notifyContent center">
                No se encuentran Estudios ahora mismo.
            </div>
        @else
            <div class="mainData">
                @foreach ($education as $eachEdu)
                    <div class="row">
                        <div>
                            <strong>Titulo</strong>
                            {{ $eachEdu->titleEdu }}
                        </div>
                        <div>
                            <strong>Horas</strong>
                            {{ $eachEdu->hoursEdu }} horas
                        </div>
                        <div>
                            <strong>Fecha Fin</strong>
                            {{ date('d-m-Y', strtotime($eachEdu->endEdu)) }}
                        </div>
                        <div>
                            <form method="POST" action="{{ route('dashboard.downloadEducation') }}" accept-charset="UTF-8"
                                enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id" value="{{ $eachEdu->education_id }}">
                                <p><button type="submit" id="downloadEdu" class="botonesControl"><i
                                            class='bx bx-save'></i></button></p>
                            </form>
                        </div>
                        <div>
                            <form method="POST" action="{{ route('dashboard.deleteEducation') }}" accept-charset="UTF-8"
                                enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id" value="{{ $eachEdu->education_id }}">
                                <p><button type="submit" id="deleteEdu" class="botonesControl"
                                        onclick="return confirm('¿Estas seguro/a?')"><i class='bx bx-trash'></i></button>
                                </p>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection
