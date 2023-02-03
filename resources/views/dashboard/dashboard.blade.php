@extends('dashboard.partials.base')

@section('title')
    Dashboard
@endsection

@section('content')
    @if (App\Http\Controllers\NotifyController::notifyLoggedTrigger())
        <div class="notifyTray">
            <div class="sectionTitle">
                <a href="{{ route('dashboard.logged.showNotify') }}">
                    TIENE NOTIFICACIONES PENDIENTES
                </a>
            </div>
        </div>
    @endif
    <div class="mainTray">
        <div class="sectionTitle">
            DASHBOARD
        </div>
        @if (count($inscriptions) == 0)
            <div class="sectionTitle">
                No tienes INSCRIPCIONES HECHAS EN NINGUNA Actividad
            </div>
        @else
            @foreach ($inscriptions as $inscription)
                <div class="mainActivity">
                    <div class="card">
                        <div class="card__title">{{ $inscription->activity->nameAct }}</div>
                        <div class="card__time">{{ $inscription->activity->timeAct }}</div>
                        <div class="card__date">{{ date('d-m-Y', strtotime($inscription->activity->dateAct)) }}</div>
                        <div class="card__status">
                            @if ($inscription->isDoneIns)
                                HAS PARTICIPADO EN ESTA ACTIVIDAD
                            @elseif($inscription->activity->isNulledAct)
                                ACTIVIDAD ANULADA
                            @elseif($inscription->isCompletedIns)
                                ACEPTADO
                            @elseif(is_null($inscription->filenameIns) && is_null($inscription->isCompletedIns))
                                RECHAZADO
                            @elseif ($inscription->filenameIns == null)
                                DEBES DE SUBIR EL DOCUMENTO FIRMADO EN LA SECCIÓN DE NOTIFICACIONES
                            @elseif ($inscription->filenameIns != null)
                                PREINSCRIPCIÓN REALIZADA<br />
                                ESPERANDO VALIDACIÓN DE UN ADMINISTRADOR
                            @endif
                        </div>
                    </div>
                    <div class="hidden card__full" style="display: none;">
                        <div class="card__desc">
                            {{ $inscription->activity->descAct }}
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
@endsection

@section('headlibraries')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

    <script>
        $(() => {
            $(".card").on("click", function() {
                if ($(this).siblings().is(':visible')) {
                    $(this).css("border-radius", "10px");
                    $(this).siblings().hide();
                }
                else {
                    $(this).css("border-radius", "10px 10px 0px 0px");
                    $(this).siblings().show();
                }
            });
        });
    </script>
@endsection
