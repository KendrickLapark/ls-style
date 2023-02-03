@extends('dashboard.partials.base')

@section('title')
    Mostrar todas las actividades
@endsection

@section('content')
    <div class="mainTray">
        <div class="sectionTitle">
            MUESTRA TODAS LAS ACTIVIDADES
        </div>
        @if (session()->has('sucessActivityCreated'))
            <div class="formSubmitSuccess center">
                {{ session('sucessActivityCreated') }}
            </div>
        @endif

        @if (session()->has('sucessActivityUpdated'))
            <div class="formSubmitSuccess center">
                {{ session('sucessActivityUpdated') }}
            </div>
        @endif


        @if (session()->has('sucessActivityDeleted'))
            <div class="formSubmitSuccess center">
                {{ session('sucessActivityDeleted') }}
            </div>
        @endif

        @if (session()->has('sucessVisibleActivity'))
            <div class="formSubmitSuccess center">
                {{ session('sucessVisibleActivity') }}
            </div>
        @endif

        @if (session()->has('successUpload'))
            <div class="formSubmitSuccess center">
                {{ session('successUpload') }}
            </div>
        @endif

        @if (session()->has('nullActivity'))
            <div class="formSubmitSuccess center">
                {{ session('nullActivity') }}
            </div>
        @endif

        <div class="addNew">
            <form method="get" action="{{ route('dashboard.formCreateActivity') }}" accept-charset="UTF-8"
                enctype="multipart/form-data">
                @csrf
                <p><button type="submit" id="banUser" class="botonesControl">Crear Actividad</button></p>
            </form>
        </div>

        <div id="calendarCaption">
            <div class="eachCalendarCaption">
                <div class="eachColor" style="background-color:#DDBFC8;">
                    &nbsp;
                </div>
                Pasada
            </div>
            <div class="eachCalendarCaption">
                <div class="eachColor" style="background-color:#8A8A8A;">
                    &nbsp;
                </div>
                Anulada
            </div>

            <div class="eachCalendarCaption">
                <div class="eachColor" style="background-color:#406cbc;">
                    &nbsp;
                </div>
                Cita Normal
            </div>
        </div>

        @foreach ($activities as $activity)
            <div class="mainActivity">
                <div class="row">

                    @if(strtotime(date('d-m-Y', strtotime($activity->dateAct)))<(strtotime(date('d-m-Y')))) 
                        <div class="divTime" style="background-color:#DDBFC8;">               
                    @elseif(!$activity->isNulledAct)
                        <div class="divTime" style="background-color: #406cbc;">                               
                    @else
                        <div class="divTime" style="background-color:#8A8A8A";>
                    @endif                               
                            <div class="dateDiv"> {{ date('d-m-Y', strtotime($activity->dateAct)) }}</div>
                            <div class="hourDiv"> {{ date('h:i', strtotime($activity->timeAct)) }}</div> 
                        </div>
                        
                        <div class="divMainDesc">
                            <div class="nameDiv">
                                <strong> {{ $activity->nameAct }} </strong>
                            </div>
                            <div class="descDiv">
                                {{$activity->descAct}}
                            </div>
                            <div class="cupoDiv">
                                <strong>Cupo: </strong>
                                {{ App\Http\Controllers\ActivityController::quotaCalculator($activity->quotasAct, $activity->activity_id) }}
                                /
                                {{ $activity->quotasAct }}
                                Libres
                            </div>
                        </div>    
                        
                        <div class="visDate">
                            @if ($activity->isVisible == 0)
                                <form method="POST" action="{{ route('dashboard.visibleActivity') }}">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $activity->activity_id }}">
                                    <button type="submit" class="botonVis"
                                        onclick="return confirm('¿Estas seguro/a?')">
                                        PUBLICAR
                                        <br />
                                        <i class='bx bx-show'></i>
                                    </button>
                                </form>
                            @else
                                <form method="POST" action="{{ route('dashboard.invisibleActivity') }}">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $activity->activity_id }}">
                                    <button type="submit" class="botonVis"
                                        onclick="return confirm('¿Estas seguro/a?')">
                                        DESPUBLICAR
                                        <br />
                                        <i class='bx bxs-low-vision'></i>
                                    </button>
                                </form>
                            @endif
                            
                            <div class="controlButton-moreDetails">
                                <i class='bx bxs-down-arrow'></i>
                            </div>
                            
                        </div>

            </div>
                        
            <div class="hiddenActDet">
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
                    <div class="visDate">
                        <strong>Visibilidad:</strong>
                        @if ($activity->isVisible == 0)
                            <i class='bx bxs-low-vision' style="font-size:25px;"></i>
                            Actualmente Invisible / No publicado
                            <form method="POST" action="{{ route('dashboard.visibleActivity') }}">
                                @csrf
                                <input type="hidden" name="id" value="{{ $activity->activity_id }}">
                                <button type="submit" class="botonesControl"
                                    onclick="return confirm('¿Estas seguro/a?')">
                                    HACER VISIBLE / PUBLICAR
                                    <br />
                                    <i class='bx bx-show' style="font-size:25px;"></i>
                                </button>
                            </form>
                        @else
                            <i class='bx bx-show' style="font-size:25px;"></i>
                            Actualmente Visible / Publicado

                            <form method="POST" action="{{ route('dashboard.invisibleActivity') }}">
                                @csrf
                                <input type="hidden" name="id" value="{{ $activity->activity_id }}">
                                <button type="submit" class="botonesControl"
                                    onclick="return confirm('¿Estas seguro/a?')">
                                    HACER INVISIBLE / DESPUBLICAR
                                    <br />
                                    <i class='bx bxs-low-vision'></i>
                                </button>
                            </form>
                        @endif
                    </div>
                    <div>
                        <strong>Información Extra: </strong>
                        <form method="POST" action="{{ route('dashboard.showAllExtraActivity') }}">
                            @csrf
                            <input type="hidden" name="id" value="{{ $activity->activity_id }}">
                            <button type="submit" class="botonesControl">
                                INFORMACIÓN EXTRA
                                <br />
                                <i class='bx bx-folder-plus'></i>
                            </button>
                        </form>
                    </div>
                </div>
                <div class="eachRow">
                    <div>
                        <strong>Editar: </strong>

                        <form method="POST" action="{{ route('dashboard.getActivityUpdateData') }}">
                            @csrf
                            <input type="hidden" name="id" value="{{ $activity->activity_id }}">
                            <button type="submit" class="botonesControl">
                                EDITAR
                                <br />
                                <i class='bx bxs-edit'></i>
                            </button>
                        </form>
                    </div>

                    <div>
                        @if (!$activity->isNulledAct)
                            <strong>ANULAR: </strong>

                            <form method="POST" action="{{ route('dashboard.nullActivity') }}">
                                @csrf
                                <input type="hidden" name="id" value="{{ $activity->activity_id }}">
                                <button type="submit" class="botonesControl"
                                    onclick="return confirm('¿Estas seguro/a?')">
                                    ANULAR
                                    <br />
                                    <i class='bx bxs-edit'></i>
                                </button>
                            </form>
                        @else
                            <strong>Esta actividad se ha anulado</strong>
                        @endif
                    </div>

                    <div>
                        <strong>Eliminar: </strong>
                        <form method="POST" action="{{ route('dashboard.deleteActivity') }}">
                            @csrf
                            <input type="hidden" name="id" value="{{ $activity->activity_id }}">
                            <button type="submit" class="botonesControl"
                                onclick="return confirm('¿Estas seguro/a?')"><i class='bx bx-trash'
                                    style="font-size:25px;"></i></button>
                        </form>
                    </div>
                </div>
            </div>
    </div>
    
    @endforeach
    </div>
@endsection


@section('headlibraries')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

    <script>
        $(() => {
            $(".hiddenActDet").hide();
            $(".row").on("click", function() {
                if ($(this).siblings().is(':visible'))
                    $(this).siblings().hide('slow');    
                else
                    $(this).siblings().show('slow');
            });
        });
    </script>
@endsection
