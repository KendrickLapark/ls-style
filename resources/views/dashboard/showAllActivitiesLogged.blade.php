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
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" 
    integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" 
    crossorigin="anonymous"></script>

@endsection

@section('content')
    <div class="mainTray">
        <div class="mainData center">
            <div class="sectionTitle">
                MUESTRA TODAS LAS ACTIVIDADES
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
                  
                 <!-- Modal created para mostrar las actividades programadas en un día cuando clickamos en el calendar by pepe -->
                 <div class="modal fade" id="fullcalendarModal" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                        </div>
                        <script>
                            console.log($('#exampleModalLabel').text());
                        </script> 
                        <div class="modal-body" id="prueba">
                             @foreach ($activities as $activity)
                             
                                <div class="modal-activity">
                                    <div class="modal-activity-title">
                                        {{$activity->nameAct}}
                                        
                                    </div>
                                    <div class="modal-activity-description">
                                        {{$activity->descAct}}

                                    </div>
                                    <div class="modal-activity-horary">
                                        {{$activity->dateAct}}
                                     </div>                       
                                </div>
                                    <br>
                           
                             @endforeach 
 
                        </div>
                        <div class="modal-footer">
                        </div>
                      </div>
                    </div>
                  </div>

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

                //evento de fullcalendar cuando se hace click en una celda *pepe 26-01-23

                dayClick: function( date, jsEvent, view){               

                    //date=moment(date).format("dddd DD [de] MMMM");  
                    
                    //$request->session()->flash('FechaSeleccionada', date);

                    $('#fullcalendarModal .modal-title').text(date); 

                    $('#fullcalendarModal').modal('show');  

                    


                    /* @foreach($activities as $activity){                       

                        @if(strtotime(date('d-m-Y', strtotime($activity->dateAct))) == strtotime(date('d-m-Y')))                    

                            /$('#fullcalendarModal .modal-activity-title').text('{{$activity->nameAct}}');
                            $('#fullcalendarModal .modal-activity-description').text('{{$activity->descAct}}');
                            $('#fullcalendarModal .modal-activity-horary').text('{{$activity->timeAct}}'); 

                            

                            $('#fullcalendarModal').modal('show');  

                        @endif
                       
                    }
                    @endforeach        */                        
                                        
                },

                eventClick: function(event) {
                    location.href = 'showThatActivity/' + event.id;
                }

            });

        });

        function displayMessage(message) {
            toastr.success(message, 'Event');
        }
    </script>

@endsection
