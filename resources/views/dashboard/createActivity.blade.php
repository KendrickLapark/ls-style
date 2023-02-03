@extends('dashboard.partials.base')

@section('title')
    Crear Actividad
@endsection

@section('content')
    <div class="mainTray">
        <div class="sectionTitle">
            Crear Actividad
        </div>
        <form method="POST" action="{{ route('dashboard.saveActivity') }}">
            @csrf
            <div class="mainData center">

                <div class="eachCreateActivityElement">
                    <p>
                        <label id="nameActLabel" class="formSections" for="nameAct">Nombre de la actividad:</label>
                        <br />
                        <input type="text" id="nameAct" name="nameAct" required>
                    </p>
                </div>
                <div class="eachCreateActivityElement">
                    <p>
                        <label id="direActLabel" class="formSections" for="	direAct">Dirección de la actividad:</label>
                        <br />
                        <input type="text" id="direAct" name="direAct" required>
                    </p>
                </div>
                <div class="eachCreateActivityElement">
                    <p>
                        <label id="descActLabel" class="formSections" for="descAct">Descripcion de la actividad:</label>
                        <br />
                        <input type="text" id="descAct" name="descAct" required>
                    </p>
                </div>
                <div class="eachCreateActivityElement">
                    <p>
                        <label id="entityActLabel" class="formSections" for="entityAct">Entidad de la actividad:</label>
                        <br />
                        <input type="text" id="entityAct" name="entityAct" required>
                    </p>
                </div>
                <div class="eachCreateActivityElement">
                    <p>
                        <label id="timeActLabel" class="formSections" for="timeAct">Hora de comienzo de la
                            actividad:</label>
                        <br />
                        <input type="time" id="timeAct" name="timeAct" required>
                    </p>
                </div>
                <div class="eachCreateActivityElement">
                    <p>
                        <label id="	endTimeActLabel" class="formSections" for="endTimeAct">Hora de fin de la
                            actividad:</label>
                        <br />
                        <input type="time" id="endTimeAct" name="endTimeAct" required>
                    </p>
                </div>
                <div class="eachCreateActivityElement">
                    <p>
                        <label id="dateActLabel" class="formSections" for="dateAct">Fecha de la actividad:</label>
                        <br />
                        <input type="date" id="dateAct" name="dateAct" required>
                    </p>
                </div>

                <div class="eachCreateActivityElement">
                    <p>
                        <label id="requiPrevActLabel" class="formSections" for="requiPrevAct">Requisito previo de la
                            actividad:</label>
                        <br />
                        <input type="text" id="requiPrevAct" name="requiPrevAct" value="No se requiere">
                    </p>
                </div>

                <div class="eachCreateActivityElement">
                    <p>
                        <label id="	formaActLabel" class="formSections" for="formaAct">Formación deseada:</label>
                        <br />
                        <input type="text" id="formaAct" name="formaAct" value="No necesita Formacion">
                    </p>
                </div>

                <div class="eachCreateActivityElement">
                    <p>
                        <label id="requiActLabel" class="formSections" for="requiAct">Requisitos de la actividad:</label>
                        <br />
                        <input type="text" id="requiAct" name="requiAct" value="No se requiere">
                    </p>
                </div>

                <div class="eachCreateActivityElement">
                    <p>
                        <label id="isPreseActLabel" class="formSections" for="isPreseAct">Marca si la actividad es
                            presencial:</label>
                        <br />
                        <input type="checkbox" name="isPreseAct" id="isPreseAct">

                    </p>
                </div>
                <div class="eachCreateActivityElement">
                    <p>
                        <label id="quotaActLabel" class="formSections" for="quotasAct">Cupo de la actividad:</label>
                        <br />
                        <input type="number" id="quotasAct" name="quotasAct" required>
                    </p>
                </div>
                <div class="eachCreateActivityElement">
                    <p>Si quieres seleccionar más de uno usa las teclas Mayúscula o control</p>
                    <select name="ActTypes[]" id="ActTypes" multiple="multiple" class="multipleSelect big">
                        @foreach ($activityTypes as $type)
                            <option value="{{ $type->typeAct_id }}">{{ $type->nameTypeAct }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="eachCreateActivityElement">
                    <p>La actividad se guardara como INVISIBLE/BORRADOR</p>
                </div>
                <div class="eachCreateActivityElement">
                    <button type="submit" class="botonesControl">Guardar</button>
                </div>
            </div>
        </form>
    </div>
@endsection
