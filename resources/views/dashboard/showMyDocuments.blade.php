@extends('dashboard.partials.base')

@section('title')
    Mi documentación
@endsection

@section('content')
    <div class="mainTray ">
        <div class="sectionTitle">
            MUESTRA MIS DOCUMENTOS
        </div>

        @if (session()->has('deleteDocument'))
            <div class="formSubmitSuccess center">
                {{ session('deleteDocument') }}
            </div>
        @endif


        @foreach ($documents as $document)
            <div class="mainData">
                <div class="row">
                    <div>
                        {{ $document->titleDoc }}
                    </div>
                    <div>
                        @if (!$document->isContactModelVol && !$document->isInscripModelVol)
                            <form method="POST" action="{{ route('dashboard.deleteDocument') }}">
                                @csrf
                                <input type="hidden" name="doc" value="{{ $document->doc_id }}">
                                <button type="submit" id="downloadDoc" class="botonesControl"><i
                                        class='bx bx-trash'></i></button>
                            </form>
                        @endif
                    </div>
                    <div>
                        <form method="POST" action="{{ route('dashboard.downloadDocument') }}">
                            @csrf
                            <input type="hidden" name="doc" value="{{ $document->doc_id }}">
                            <button type="submit" id="downloadDoc" class="botonesControl"><i
                                    class='bx bx-save'></i></button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
