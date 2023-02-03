@extends('dashboard.partials.base')

@section('title')
    Mi documentación
@endsection

@section('content')
    <div class="mainTray myDocumentsTray">
        <div class="sectionTitle">
            MUESTRA SUS DOCUMENTOS
        </div>
        @if (session()->has('deleteDocument'))
            <div class="formSubmitSuccess center">
                {{ session('deleteDocument') }}
            </div>
        @endif

        <table id="myDocumentsTable">
            <tr>
                <th>Descargar</th>
                <th>Documento</th>
            </tr>
            @foreach ($documents as $document)
                <tr>
                    <td>
                        <form method="POST" action="{{ route('dashboard.showDocument') }}">
                            @csrf
                            <input type="hidden" name="doc" value="{{ $document->doc_id }}">
                            <button type="submit" id="downloadDoc" class="botonesControl"><i
                                    class='bx bx-save'></i></button>
                        </form>
                    </td>
                    <td>{{ $document->titleDoc }}</a></td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection
