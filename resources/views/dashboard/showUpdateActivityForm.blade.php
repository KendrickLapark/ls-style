@extends('dashboard.partials.base')

@section('title')
    Actualizar Actividad
@endsection

@section('content')
    <div class="mainTray ">
        <div class="sectionTitle">
            Actualizar Actividad
        </div>
        <form method="POST" action="{{ route('dashboard.updateActivity') }}">
            @csrf
            <div class="mainData center">

                <input type="hidden" id="activity_id" name="activity_id" value="{{ $activity->activity_id }}">
                <div class="eachCreateActivityElement">
                    <p>
                        <label id="nameActLabel" class="formSections" for="nameAct">Nombre de la actividad:</label>
                        <br />
                        <input type="text" id="nameAct" name="nameAct" value="{{ $activity->nameAct }}" required>
                    </p>
                </div>
                <div class="eachCreateActivityElement">
                    <p>
                        <label id="direActLabel" class="formSections" for="direAct">Dirección de la actividad:</label>
                        <br />
                        <input type="text" id="direAct" name="direAct" value="{{ $activity->direAct }}" required>
                    </p>
                </div>
                <div class="eachCreateActivityElement">
                    <p>
                        <label id="descActLabel" class="formSections" for="descAct">Descripcion de la actividad:</label>
                        <br />
                        <input type="text" id="descAct" name="descAct" value="{{ $activity->descAct }}" required>
                    </p>
                </div>
                <div class="eachCreateActivityElement">
                    <p>
                        <label id="entityActLabel" class="formSections" for="entityAct">Entidad de la actividad:</label>
                        <br />
                        <input type="text" id="entityAct" name="entityAct" value="{{ $activity->entityAct }}" required>
                    </p>
                </div>
                <div class="eachCreateActivityElement">
                    <p>
                        <label id="timeActLabel" class="formSections" for="timeAct">Hora de inicio de la actividad:</label>
                        <br />
                        <input type="time" id="timeAct" name="timeAct" value="{{ $activity->timeAct }}" required>
                    </p>
                </div>
                <div class="eachCreateActivityElement">
                    <p>
                        <label id="	endTimeActLabel" class="formSections" for="endTimeAct">Hora de fin de la
                            actividad:</label>
                        <br />
                        <input type="time" id="endTimeAct" name="endTimeAct" value="{{ $activity->endTimeAct }}"
                            required>
                    </p>
                </div>
                <div class="eachCreateActivityElement">
                    <p>
                        <label id="dateActLabel" class="formSections" for="dateAct">Fecha de la actividad:</label>
                        <br />
                        <input type="date" id="dateAct" name="dateAct" value="{{ $activity->dateAct }}" required>
                    </p>
                </div>

                <div class="eachCreateActivityElement">
                    <p>
                        <label id="requiPrevActLabel" class="formSections" for="requiPrevAct">Requisito previo de la
                            actividad:</label>
                        <br />
                        <input type="text" id="requiPrevAct" name="requiPrevAct" value="{{ $activity->requiPrevAct }}">
                    </p>
                </div>

                <div class="eachCreateActivityElement">
                    <p>
                        <label id="	formaActLabel" class="formSections" for="formaAct">Formación deseada:</label>
                        <br />
                        <input type="text" id="formaAct" name="formaAct" value="{{ $activity->formaAct }}">
                    </p>
                </div>

                <div class="eachCreateActivityElement">
                    <p>
                        <label id="requiActLabel" class="formSections" for="requiAct">Requisitos de la actividad:</label>
                        <br />
                        <input type="text" id="requiAct" name="requiAct" value="{{ $activity->requiAct }}">
                    </p>
                </div>

                <div class="eachCreateActivityElement">
                    <p>
                        <label id="isPreseActLabel" class="formSections" for="isPreseAct">Marca si la actividad es
                            presencial:</label>
                        <br />
                        @if ($activity->isPreseAct)
                            <input type="checkbox" name="isPreseAct" id="isPreseAct" checked>
                        @else
                            <input type="checkbox" name="isPreseAct" id="isPreseAct">
                        @endif

                    </p>
                </div>
                <div class="eachCreateActivityElement">
                    <p>
                        <label id="quotaActLabel" class="formSections" for="quotasAct">Cupo de la actividad:</label>
                        <br />
                        <input type="number" id="quotasAct" name="quotasAct" value="{{ $activity->quotasAct }}"
                            required>
                    </p>
                </div>
                <div class="eachCreateActivityElement">
                    <p>Si quieres seleccionar más de uno usa las teclas Mayúscula o control</p>
                    <?php
                    $checked = [];
                    foreach ($activity->typeAct as $selectedType) {
                        array_push($checked, $selectedType->typeAct_id);
                    }
                    echo '<select name="ActTypes[]" id="ActTypes" multiple="multiple" class="multipleSelect big">';
                    foreach ($activityTypes as $type) {
                        if (in_array($type->typeAct_id, $checked)) {
                            echo '<option value="' . $type->typeAct_id . '" selected>' . $type->nameTypeAct . '</option>';
                        } else {
                            echo '<option value="' . $type->typeAct_id . '">' . $type->nameTypeAct . '</option>';
                        }
                    }
                    echo '</select>';
                    ?>
                </div>

                <div class="eachCreateActivityElement">
                    <button type="submit" class="botonesControl">Guardar</button>
                </div>
            </div>
        </form>
    </div>
@endsection
