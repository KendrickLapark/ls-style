@extends('dashboard.partials.base')

@section('title')
    Notificiaciones
@endsection

@section('content')
    <div class="mainTray">
        <div class="sectionTitle">
            USUARIOS SIN VALIDAR:
        </div>

        @if (session()->has('validateUser'))
            <div class="formSubmitSuccess center center">
                {{ session('validateUser') }}
            </div>
        @endif
        @if (count($isNotCompleted) == 0)
            <div class="sectionTitle">
                NO hay USUARIOS SIN VALIDAR pendientes
            </div>
        @else
            <div class="mainData">
                @foreach ($isNotCompleted as $eachNotCompleted)
                    <div>
                        <div class="row">
                            <div>
                                @if ($eachNotCompleted->imageVol == 0 || $eachNotCompleted->imageVol == null)
                                    <img src="<?php echo asset('images/dashboard/noProfileImage.jpg'); ?>" alt="No hay imagen" class="avatarInShowAllUsers">
                                @else
                                    <img src="{{ asset('storage/avatar/' . $eachNotCompleted->imageVol) }}"
                                        alt="{{ $eachNotCompleted->nameVol }}" class="avatarInShowAllUsers">
                                @endif
                            </div>
                            <div>
                                <strong>
                                    {{ $eachNotCompleted->nameVol }}
                                    {{ $eachNotCompleted->surnameVol }}
                                    {{ $eachNotCompleted->surname2Vol }}
                                </strong>
                                <br />
                                @if ($eachNotCompleted->organiVol == false)
                                    SIN Empresa Asociada
                                @else
                                    {{ $eachNotCompleted->organiVol }}
                                @endif
                            </div>
                            <div class="mailVol">
                                <i class='bx bx-envelope'></i>
                                <a href="mailto:{{ $eachNotCompleted->persMailVol }}">{{ $eachNotCompleted->persMailVol }}</a>
                            </div>
                            <div class="tlfVol">
                                <i class='bx bxs-phone'></i>
                                <a href="tel:+34{{ $eachNotCompleted->telVol }}">{{ $eachNotCompleted->telVol }}</a>
                            </div>
                            <div class="controlButton moreDetails">
                                <i class='bx bxs-down-arrow'></i>
                            </div>
                        </div>
                        <div class="hidden">
                            <div class="eachRow">
                                <div>
                                    <strong>Fecha de nacimiento: </strong>
                                    {{ date('d-m-Y', strtotime($eachNotCompleted->organiVol)) }}
                                </div>
                                <div>
                                    <strong>{{ $eachNotCompleted->typeDocVol }}: </strong>
                                    {{ $eachNotCompleted->numDocVol }}
                                </div>
                                <div>
                                    <strong>Sexo:</strong>
                                    {{ $eachNotCompleted->sexVol }}
                                </div>
                                <div>
                                    <strong>Talla de camiseta: </strong>
                                    {{ $eachNotCompleted->shirtSizeVol }}
                                </div>
                            </div>
                            <div class="eachRow">
                                <div>
                                    <strong>Delegaciones: </strong>
                                    @if (count($eachNotCompleted->delegations) == 0)
                                        No tiene delegación
                                    @else
                                        @foreach ($eachNotCompleted->delegations as $delegation)
                                            {{ $delegation->nameDel }},
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                            @if (date('Y') - date('Y', strtotime($eachNotCompleted->birthDateVol)) <= 17)
                                <div class="eachRow">
                                    <div>
                                        <span class="redMark">ES MENOR</span>
                                        <div>
                                            <strong>Autorizador:</strong>
                                            {{ $eachNotCompleted->nameAuthVol }}
                                        </div>
                                        <div>
                                            <strong>Documento de identidad del autorizador:</strong>
                                            {{ $eachNotCompleted->numDocAuthVol }}
                                        </div>
                                        <div>
                                            <strong>Teléfono del autorizador:</strong>
                                            <a
                                                href="tel:+34{{ $eachNotCompleted->tlfAuthVol }}">{{ $eachNotCompleted->tlfAuthVol }}</a>
                                        </div>
                                    </div>
                                </div>
                            @endif


                            <div class="eachRow">
                                <div>
                                    <strong>Dirección: </strong> <br />
                                    <div>
                                        {{ $eachNotCompleted->typeViaVol }}
                                        {{ $eachNotCompleted->direcVol }}
                                    </div>
                                    <div>
                                        <strong>Nº: </strong>
                                        {{ $eachNotCompleted->numVol }}
                                        {{ $eachNotCompleted->flatVol }}
                                    </div>
                                    <div>
                                        <strong>Código Postal: </strong>
                                        {{ $eachNotCompleted->codPosVol }}
                                    </div>
                                    <div>
                                        <strong>Provincia: </strong>
                                        {{ $eachNotCompleted->stateVol }}
                                    </div>
                                    <div>
                                        <strong>Ciudad: </strong>
                                        {{ $eachNotCompleted->townVol }}
                                    </div>
                                    <div>
                                        <strong>Información Adicional: </strong>
                                        {{ $eachNotCompleted->aditiInfoVol }}
                                    </div>
                                </div>
                                <div class="eachRow">
                                    <div>
                                        @foreach ($eachNotCompleted->documents as $eachDocument)
                                            <strong>{{ $eachDocument->titleDoc }}</strong> <br />
                                            <div>
                                                <form method="POST"
                                                    action="{{ route('dashboard.downloadThatDocument') }}">
                                                    @csrf
                                                    <input type="hidden" name="doc"
                                                        value="{{ $eachDocument->doc_id }}">
                                                    <button type="submit" id="submit" class="botonesControl"><i
                                                            class='bx bx-save'></i></button>
                                                </form>
                                            </div>
                                        @endforeach

                                    </div>
                                </div>
                                <div class="eachRow">
                                    <div>
                                        @if (count($eachNotCompleted->documents) == 0)
                                            No puede validar hasta que el usuario suba los documentos
                                        @else
                                            <strong>Validar</strong> <br />
                                            <div>
                                                <form method="POST" action="{{ route('dashboard.validateUser') }}">
                                                    @csrf
                                                    <input type="hidden" name="doc"
                                                        value="{{ $eachNotCompleted->id }}">
                                                    <button type="submit" id="submit" class="botonesControl"
                                                        onclick="return confirm('¿Estas seguro/a?')">Validar<br /><i
                                                            class='bx bx-check'></i></button>
                                                </form>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="eachRow">
                                <div class="controlButton lessDetails">
                                    <i class='bx bxs-up-arrow'></i>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
        @endif
    </div>

    <div class="mainTray">
        <div class="sectionTitle">
            Preinscripciones sin aceptar:
        </div>

        @if (session()->has('validatePreinscripcion'))
            <div class="formSubmitSuccess center">
                {{ session('validatePreinscripcion') }}
            </div>
        @endif

        @if (session()->has('declinatePreinscription'))
            <div class="formSubmitSuccess center">
                {{ session('declinatePreinscription') }}
            </div>
        @endif

        @if (count($inscriptionNotValidated) == 0)
            <div class="center">
                <div class="sectionTitle">
                    NO hay PREINSCRIPCIONES sin aceptar
                </div>
            </div>
        @else
            @foreach ($inscriptionNotValidated as $inscription)
                <div class="mainData">
                    <div class="row">
                        <div>
                            @if ($inscription->volunteer->imageVol == 0 || $inscription->volunteer == null)
                                <img src="<?php echo asset('images/dashboard/noProfileImage.jpg'); ?>" alt="No hay imagen" class="avatarInShowAllUsers">
                            @else
                                <img src="{{ asset('storage/avatar/' . $inscription->volunteer->imageVol) }}"
                                    alt="{{ $inscription->volunteer->nameVol }}" class="avatarInShowAllUsers">
                            @endif
                        </div>
                        <div>
                            <strong>
                                {{ $inscription->volunteer->nameVol }}
                                {{ $inscription->volunteer->surnameVol }}
                                {{ $inscription->volunteer->surname2Vol }}
                            </strong>
                            <br />
                            @if ($inscription->volunteer->organiVol == false)
                                SIN Empresa Asociada
                            @else
                                {{ $inscription->volunteer->organiVol }}
                            @endif
                        </div>
                        <div class="mailVol">
                            <i class='bx bx-envelope'></i>
                            <a href="mailto:{{ $inscription->volunteer->persMailVol }}">{{ $inscription->volunteer->persMailVol }}</a>
                        </div>
                        <div class="tlfVol">
                            <i class='bx bxs-phone'></i>
                            <a
                                href="tel:+34{{ $inscription->volunteer->telVol }}">{{ $inscription->volunteer->telVol }}</a>
                        </div>
                        <div class="controlButton moreDetails">
                            <i class='bx bxs-down-arrow'></i>
                        </div>
                    </div>
                    <div class="hidden">
                        <div class="eachRow">
                            <div>
                                <strong>Fecha de nacimiento: </strong>
                                {{ date('d-m-Y', strtotime($inscription->volunteer->organiVol)) }}
                            </div>
                            <div>
                                <strong>{{ $inscription->volunteer->typeDocVol }}: </strong>
                                {{ $inscription->volunteer->numDocVol }}
                            </div>
                            <div>
                                <strong>Sexo:</strong>
                                {{ $inscription->volunteer->sexVol }}
                            </div>
                            <div>
                                <strong>Talla de camiseta: </strong>
                                {{ $inscription->volunteer->shirtSizeVol }}
                            </div>
                        </div>
                        <div class="eachRow">
                            <div>
                                <strong>Delegaciones: </strong>
                                @if (count($inscription->volunteer->delegations) == 0)
                                    No tiene delegaciones
                                @else
                                    @foreach ($inscription->volunteer->delegations as $delegation)
                                        {{ $delegation->nameDel }},
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        @if (date('Y') - date('Y', strtotime($inscription->volunteer->birthDateVol)) <= 17)
                            <div class="eachRow">
                                <div>
                                    <span class="redMark">ES MENOR</span>
                                    <div>
                                        <strong>Autorizador:</strong>
                                        {{ $inscription->volunteer->nameAuthVol }}
                                    </div>
                                    <div>
                                        <strong>Documento de identidad del autorizador:</strong>
                                        {{ $inscription->volunteer->numDocAuthVol }}
                                    </div>
                                    <div>
                                        <strong>Teléfono del autorizador:</strong>
                                        {{ $inscription->volunteer->tlfAuthVol }}
                                    </div>
                                </div>
                            </div>
                        @endif



                        <div class="eachRow">
                            <div>
                                <strong>Dirección: </strong> <br />
                                <div>
                                    {{ $inscription->volunteer->typeViaVol }}
                                    {{ $inscription->volunteer->direcVol }}
                                </div>
                                <div>
                                    <strong>Nº: </strong>
                                    {{ $inscription->volunteer->numVol }}
                                    {{ $inscription->volunteer->flatVol }}
                                </div>
                                <div>
                                    <strong>Código Postal: </strong>
                                    {{ $inscription->volunteer->codPosVol }}
                                </div>
                                <div>
                                    <strong>Provincia: </strong>
                                    {{ $inscription->volunteer->stateVol }}
                                </div>
                                <div>
                                    <strong>Ciudad: </strong>
                                    {{ $inscription->volunteer->townVol }}
                                </div>
                                <div>
                                    <strong>Información Adicional: </strong>
                                    {{ $inscription->volunteer->aditiInfoVol }}
                                </div>

                            </div>
                            <div>
                                <strong>Educación: </strong><br />
                                @if (count($inscription->volunteer->education) == 0)
                                    No tiene titulación registrada
                                @else
                                    @foreach ($inscription->volunteer->education as $education)
                                        {{ $education->titleEdu }}
                                        <form method="POST" action="{{ route('dashboard.downloadThatEducation') }}"
                                            accept-charset="UTF-8" enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $education->education_id }}">
                                            <p><button type="submit" id="downloadEdu" class="botonesControl"><i
                                                        class='bx bx-save'></i></button></p>
                                        </form>
                                    @endforeach
                                @endif
                            </div>
                            <div>
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
                                <div><strong>Hora de inicio: </strong>{{ $inscription->activity->timeAct }}</div>
                                <div><strong>Hora Fin: </strong>{{ $inscription->activity->endTimeAct }}</div>

                                <div><strong>Fecha:
                                    </strong>{{ date('d-m-Y', strtotime($inscription->activity->dateAct)) }}</div>
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
                            <div>
                                <strong>Tipos de Actividad: </strong>
                                @foreach ($inscription->activity->typeAct as $typeAct)
                                    <p>{{ $typeAct->nameTypeAct }}</p>
                                @endforeach
                            </div>
                        </div>
                        <div class="eachRow">
                            <div>
                                <strong>Documentación</strong>
                                <form method="POST" action="{{ route('dashboard.downloadPreinscription') }}">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $inscription->inscription_id }}">
                                    <button type="submit" class="botonesControl"><i
                                            class='bx bx-save'></i></button>
                                </form>
                            </div>
                            <div>
                                <form method="POST" action="{{ route('dashboard.validatePreinscription') }}">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $inscription->inscription_id }}">
                                    <button type="submit" class="botonesControl"
                                        onclick="return confirm('¿Estas seguro/a?')">ACEPTAR</button>
                                </form>
                            </div>
                            <div>
                                <form method="POST" action="{{ route('dashboard.declinatePreinscription') }}">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $inscription->inscription_id }}">
                                    <button type="submit" class="botonesControl"
                                        onclick="return confirm('¿Estas seguro/a?')">RECHAZAR</button>
                                </form>
                            </div>
                        </div>
                        <div class="eachRow">
                            <div class="controlButton lessDetails">
                                <i class='bx bxs-up-arrow'></i>
                            </div>
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
