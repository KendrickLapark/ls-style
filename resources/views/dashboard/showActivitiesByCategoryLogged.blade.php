@extends('dashboard.partials.base')

@section('title')
    Mostrar todas las actividades
@endsection

@section('headlibraries')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src='https://unpkg.com/tooltip.js/dist/umd/tooltip.min.js'></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />

    <script src='https://unpkg.com/tooltip.js/dist/umd/tooltip.min.js'></script>
@endsection

@section('content')
    <div class="mainTray">
        <div class="mainData center">
            <div class="sectionTitle">
                MUESTRA ACTIVIDADES DE "{{$typeAct}}"
            </div>

            <div id="calendarCaption">
                <div class="eachCalendarCaption">
                    <div class="eachColor" style="background-color:#FFA500;">
                        &nbsp;
                    </div>
                    Preinscrito
                </div>
                <div class="eachCalendarCaption">
                    <div class="eachColor" style="background-color:#8f1d21;">
                        &nbsp;
                    </div>
                    Aceptado
                </div>
                <div class="eachCalendarCaption">
                    <div class="eachColor" style="background-color:#000000;">
                        &nbsp;
                    </div>
                    Rechazado
                </div>
                <div class="eachCalendarCaption">
                    <div class="eachColor" style="background-color:#8A8A8A;">
                        &nbsp;
                    </div>
                    Anulado
                </div>
                <div class="eachCalendarCaption">
                    <div class="eachColor" style="background-color:#00A300;">
                        &nbsp;
                    </div>
                    Realizado
                </div>
            </div>

            <div class="calendarContainer center">
                <div id='calendar'></div>
            </div>
        </div>
    </div>

    <div class="secondaryTray center ">
        <div class="mainData center">
            <div class="sectionTitle">
                ¿BUSCAS DE UN TIPO CONCRETO?
            </div>
            <div class="allActivities center">
                @foreach ($activityTypes as $type)
                    <div class="eachActivityType">
                        <a
                            href="{{ route('dashboard.showFilterByTypeAct', ['id' => $type->typeAct_id]) }}">{{ $type->nameTypeAct }}</a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>




    <script>
        $(document).ready(function() {

            var SITEURL = "{{ url('/') }}";

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var calendar = $('#calendar').fullCalendar({
                dayNamesShort: ['Dom', 'Lun', 'Mar', 'Mie', 'Jue', 'Vie', 'Sab'],
                monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto',
                    'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'
                ],
                header: {
                    left: 'prev',
                    center: 'title,today',
                    right: 'next'
                },
                buttonText: {
                    today: 'HOY',
                    day: 'DIA',
                    week: 'SEMANA',
                    month: 'MES'
                },
                firstDay: 1,
                editable: true,
                displayEventTime: true,
                events: SITEURL + "/fullcalender",
                displayEventTime: false,
                editable: true,
                events: [

                    @foreach ($activities as $activity)
                        {
                            color: '#064b98',
                            id: '{{ $activity->activity_id }}',
                            title: '{{ $activity->nameAct }}',
                            start: '{{ $activity->dateAct }}T{{ $activity->timeAct }}',
                            @if ($activity->isNulledAct)
                                color: '#8A8A8A',
                            @else
                                @if(count($activity->inscriptions)>0)
                                    @foreach ($activity->inscriptions as $eachInscription)
                                        @if ($eachInscription->volunteer_id==Auth::user()->id)
                                            @if ($eachInscription->isDoneIns == 1)
                                                color: '#00A300',
                                            @elseif ($eachInscription->isCompletedIns == 1) 
                                                color: '#8f1d21',
                                            @elseif (is_null($eachInscription->filenameIns) && is_null($eachInscription->isCompletedIns))
                                                color: '#000000', 
                                            @elseif ($eachInscription->filenameIns && $eachInscription->isCompletedIns == 0)
                                                color: '#ffa500', 
                                            @endif    
                                        @endif
                                    @endforeach
                                @endif
                            @endif
                        },
                    @endforeach
                   
                ],
                editable: false,
                selectable: true,
                selectHelper: true,
                eventClick: function(event) {
                    location.href = '../showThatActivity/' + event.id;
                }

            });

        });

        function displayMessage(message) {
            toastr.success(message, 'Event');
        }
    </script>
@endsection
