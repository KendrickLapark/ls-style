@extends('dashboard.partials.base')

@section('title')
    Dashboard
@endsection

@section('content')
    @if (!Auth::user()->isIncomplete() && Auth::user()->isRegisterComplete == 0)
        <div class="mainTray center">
            <div class="sectionTitle">
                PROCESO DE VALIDACIÓN
            </div>
            <div class="mainData center">
                <p>Debe de esperar a que un administrador valide sus documentos. Gracias</p>
                <p>Gracias por su paciencia</p>
            </div>
        </div>
    @else
        <div class="mainTray center">
            <div class="sectionTitle">
                Bienvenidos a Voluntariado Magtel
            </div>
            <div class="mainData center">
                <p>Para comenzar en el Voluntariado debes de descargar y rellenar un par de documentos</p>
                <p>
                <form method="POST" action="{{ route('PDF.generateContactModelVol') }}">
                    @csrf
                    <button type="submit" id="submit" class="botonesControl">DESCARGAR MODELO DE ACUERDO O COMPROMISO DE
                        INCORPORACIÓN AL PROGRAMA DE VOLUNTARIADO CORPORATIVO</button>
                </form>
                </p>
                <p>
                <form method="POST" action="{{ route('PDF.volunteerInscriptionModel') }}">
                    @csrf
                    <button type="submit" id="submit" class="botonesControl">DESCARGAR MODELO DE CONTRATO DE
                        VOLUNTARIADO</button>
                </form>
                </p>
                <p>
                    <hr />
                </p>
                <p>
                <form method="POST" action="{{ route('PDF.initialPDFupload') }}" accept-charset="UTF-8"
                    enctype="multipart/form-data">
                    @csrf
                    <p>MODELO DE ACUERDO O COMPROMISO DE INCORPORACIÓN AL PROGRAMA DE VOLUNTARIADO CORPORATIVO</p>
                    <input type="file" name="file1" accept="application/pdf" required>
                    <p>MODELO DE CONTRATO DE VOLUNTARIADO</p>
                    <input type="file" name="file2" accept="application/pdf" required>

                    <p><input id="submit" class="botonesControl" type="submit" value="Subir Documentos"></p>
                </form>
                </p>
            </div>
        </div>
    @endif
@endsection
