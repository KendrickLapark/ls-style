@extends('dashboard.partials.base')

@section('title')
    Mostrar todas las actividades
@endsection

@section('content')
    <div class="mainTray ">
        <div class="sectionTitle">
            MUESTRA TODA LA INFORMACIÓN EXTRA
        </div>
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
                        @foreach ($activity->typeAct as $itemActivityType)
                            <p>{{ $itemActivityType->nameTypeAct }}</p>
                        @endforeach
                    </div>
                    <div class="visDate">
                        <strong>Visibilidad:</strong>
                        @if ($activity->isVisible == 0)
                            <i class='bx bxs-low-vision' style="font-size:25px;"></i>
                            Actualmente Invisible / No publicado
                        @else
                            <i class='bx bx-show' style="font-size:25px;"></i>
                            Actualmente Visible / Publicado
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="secondaryTray center ">
            <form method="POST" action="{{ route('dashboard.formCreateInfoExtra') }}">
                @csrf
                <input type="hidden" name="id" value="{{ $activity->activity_id }}">
                <button type="submit" id="submit" class="botonesControl">
                    CREAR INFORMACIÓN EXTRA
                    <br />
                    <i class='bx bx-folder-plus'></i>
                </button>
            </form>
            @if (count($activity->infoExtra) == 0)
                <div class="center">
                    Esta actividad no tiene Información Extra
                </div>
            @else
                @foreach ($activity->infoExtra as $infoExtra)
                    <div class="mainData">
                        <div class="row">
                            <div class="extraName">
                                <strong>Nombre: </strong>{{ $infoExtra->titleInfoExtra }}
                            </div>
                            <div class="extraName">
                                <form method="POST" action="{{ route('dashboard.showInfoExtra') }}">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $infoExtra->extraAct_id }}">
                                    <button type="submit" id="downloadDoc" class="botonesControl"><i
                                            class='bx bx-save'></i></button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
@endsection
