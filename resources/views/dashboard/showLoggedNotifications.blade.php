@extends('dashboard.partials.base')

@section('title')
    Notificiaciones
@endsection

@section('content')
    <div class="mainTray">

        <div class="sectionTitle">
            PROCESOS QUE COMPLETAR
        </div>
        @if (session()->has('uploadPreinscription'))
            <div class="formSubmitSuccess center">
                {{ session('uploadPreinscription') }}
            </div>
        @endif

        @foreach ($inscription as $inscription)
            @if ($inscription->filenameIns == null)
                <div class="mainData">
                    <div class="row">
                        <div>
                            <strong>Nombre: </strong>{{ $inscription->activity->nameAct }}
                        </div>
                        <div>
                            <strong>Cupo: </strong>
                            {{ App\Http\Controllers\ActivityController::quotaCalculator(
                                $inscription->activity->quotasAct,
                                $inscription->activity->activity_id,
                            ) }}
                            /
                            {{ $inscription->activity->quotasAct }}
                            Libres
                        </div>
                        <Div><strong>Hora de inicio: </strong>{{ $inscription->activity->timeAct }}</div>
                        <div><strong>Hora Fin: </strong>{{ $inscription->activity->endTimeAct }}</div>

                        <div><strong>Fecha: </strong>{{ date('d-m-Y', strtotime($inscription->activity->dateAct)) }}</div>

                        <div class="controlButton moreDetails">
                            <i class='bx bxs-down-arrow'></i>
                        </div>
                    </div>
                    <div class="hidden">
                        <div class="eachRow">
                            <div>
                                <strong>Descripcion: </strong>
                                {{ $inscription->activity->descAct }}
                            </div>
                            <div>
                                <strong>Entidad: </strong>
                                {{ $inscription->activity->entityAct }}
                            </div>
                            <div>
                                <strong>Dirección: </strong>
                                {{ $inscription->activity->direAct }}
                            </div>
                            <div>
                                <strong>Requisito Previo: </strong>
                                {{ $inscription->activity->requiPrevAct }}
                            </div>
                            <div>
                                <strong>Formacion deseada: </strong>
                                {{ $inscription->activity->formaAct }}
                            </div>
                            <div>
                                <strong>Requisitos: </strong>
                                {{ $inscription->activity->requiAct }}
                            </div>
                        </div>
                        <div class="eachRow">
                            <div>
                                <strong>Tipos de Actividad: </strong>
                                @foreach ($activityTypes as $activityType)
                                    @foreach ($inscription->activity->typeAct as $itemActivityType)
                                        @if ($activityType->typeAct_id == $itemActivityType->typeAct_id)
                                            <p>{{ $itemActivityType->nameTypeAct }}</p>
                                        @endif
                                    @endforeach
                                @endforeach
                            </div>
                            <div>
                                <p>Descargar documento</p>
                                <form method="POST" action="{{ route('PDF.generatepreinscription') }}">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $inscription->inscription_id }}">
                                    <button type="submit" id="downloadPDF" class="botonesControl"><i
                                            class='bx bx-save'></i></button>
                                </form>
                                <hr />
                                <form method="POST" action="{{ route('dashboard.uploadPreinscription') }}"
                                    accept-charset="UTF-8" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $inscription->inscription_id }}">
                                    <p><input type="file" name="file" accept="application/pdf" required></p>
                                    <p><button type="submit" id="registerSubmitButton" class="botonesControl">SUBIR PDF
                                            FIRMADO</button></p>
                                </form>
                            </div>
                        </div>
                        <div class="eachRow">
                            <div class="controlButton lessDetails">
                                <i class='bx bxs-up-arrow'></i>
                            </div>
                        </div>
                    </div>
            @endif
        @endforeach
    </div>
@endsection


@section('headlibraries')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

    <script>
        $(() => {
            $(".hidden").hide();
            $(".row").on("click", function() {
                $(this).siblings().show('slow');
                if ($('#Div').is(':visible')) {}
            });

            $(".lessDetails").on("click", function() {
                $(this).parent().parent().hide('slow');
            })
        });
    </script>
@endsection
