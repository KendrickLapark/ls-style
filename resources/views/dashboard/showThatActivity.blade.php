@extends('dashboard.partials.base')

@section('title')
    MOSTRANDO ACTIVIDAD
@endsection

@section('headlibraries')
@endsection

@section('content')
    <div class="mainTray">

        <div class="sectionTitle">
            MOSTRANDO ACTIVIDAD
        </div>
        @if (session()->has('doPreinscription'))
            <div class="formSubmitSuccess center">
                {{ session('doPreinscription') }}
            </div>
        @endif


        <div class="mainData">
            <div class="row">
                <div>
                    <strong>Nombre: </strong>{{ $activity->nameAct }}
                </div>
                <div>
                    <strong>Cupo: </strong>
                    {{ App\Http\Controllers\ActivityController::quotaCalculator($activity->quotasAct, $activity->activity_id) }}
                    /
                    {{ $activity->quotasAct }}
                    Libres
                </div>
                <div><strong>Hora de inicio: </strong>{{ $activity->timeAct }}</div>
                <div><strong>Hora Fin: </strong>{{ $activity->endTimeAct }}</div>

                <div><strong>Fecha: </strong>{{ date('d-m-Y', strtotime($activity->dateAct)) }}</div>

                <div class="controlButton moreDetails">
                    <i class='bx bxs-down-arrow'></i>
                </div>
            </div>
            <div class="hidden">
                <div class="eachRow">
                    <div>
                        <strong>Descripcion: </strong>
                        {{ $activity->descAct }}
                    </div>
                    <div>
                        <strong>Entidad: </strong>
                        {{ $activity->entityAct }}
                    </div>
                    <div>
                        <strong>Dirección: </strong>
                        {{ $activity->direAct }}
                    </div>
                    <div>
                        <strong>Requisito Previo: </strong>
                        {{ $activity->requiPrevAct }}
                    </div>
                    <div>
                        <strong>Formacion deseada: </strong>
                        {{ $activity->formaAct }}
                    </div>
                    <div>
                        <strong>Requisitos: </strong>
                        {{ $activity->requiAct }}
                    </div>
                </div>
                <div class="eachRow">
                    <div>
                        <strong>Tipos de Actividad: </strong>
                        @foreach ($activityTypes as $activityType)
                            @foreach ($activity->typeAct as $itemActivityType)
                                @if ($activityType->typeAct_id == $itemActivityType->typeAct_id)
                                    <p>{{ $itemActivityType->nameTypeAct }}</p>
                                @endif
                            @endforeach
                        @endforeach
                    </div>
                    <div>
                        @if ($activity->isNulledAct)
                            <strong>La actividad ha sido anulada</strong>
                        @else
                            @if (App\Http\Controllers\ActivityController::quotaCalculator($activity->quotasAct, $activity->activity_id) > 0)
                                @if (App\Http\Controllers\ActivityController::inscriptedYet($activity->activity_id, Auth::user()->id))
                                    No puedes volver a inscribirte en la misma actividad
                                @else
                                    <form method="POST" action="{{ route('dashboard.makeInscription') }}">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $activity->activity_id }}">
                                        <button type="submit" id="submit"
                                            class="botonesControl">QUIERO<br />PREINSCRIBIRME</button>
                                    </form>
                                @endif
                            @else
                                No quedan plazas libres
                            @endif
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
