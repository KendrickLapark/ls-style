@extends('common.base')

@section('title')
    Home
@endsection

@section('content')
    <img src="<?php echo asset('images/mainSlider.jpg'); ?>" alt="slider" id="sliderHome" />
    <div id="contentDiv">
        <div class="rowDiv">
            <div class="eachCell withText">
                <span class="header">Acción Social</span>
                <p>Fomentamos la construcción de una sociedad igualitaria y comprometida a través de la promoción de
                    actividades solidarias.</p>
            </div>
            <div class="eachCell">
                <img src="<?php echo asset('images/homeImages/accionSocial.jpg'); ?>" alt="Acción Social" class="eachHomeBoxImage" />
            </div>
        </div>
        <div class="rowDiv">
            <div class="eachCell">
                <img src="<?php echo asset('images/homeImages/innovacionSocial.jpg'); ?>" alt="Innovación Social" class="eachHomeBoxImage" />
            </div>
            <div class="eachCell withText">
                <span class="header">Innovación Social</span>
                <p>Colaboramos con las Divisiones de I+D+i y de Telecomunicaciones y Transformación Digital de Magtel con el
                    fin de aplicar su conocimiento y experiencia para favorecer la calidad de vida de personas con
                    discapacidad y en situación de dependencia.</p>
            </div>
        </div>
        <div class="rowDiv">
            <div class="eachCell withText">
                <span class="header">Empleabilidad</span>
                <p>Contribuimos a la generación de oportunidades laborales entre colectivos vulnerables o en riesgo de
                    exclusión social a través de programas formativos y de prácticas profesionales.</p>
            </div>
            <div class="eachCell">
                <img src="<?php echo asset('images/homeImages/empleabilidad.jpg'); ?>" alt="Empleabilidad" class="eachHomeBoxImage" />
            </div>
        </div>
        <div class="rowDiv">
            <div class="eachCell">
                <img src="<?php echo asset('images/homeImages/cooperacionInternacional.jpg'); ?>" alt="Cooperación Internacional" class="eachHomeBoxImage" />
            </div>
            <div class="eachCell withText">
                <span class="header">Cooperación Internacional</span>
                <p>Promovemos iniciativas y proyectos que contribuyan al desarrollo y mejora de las condiciones de vida de
                    zonas en vías de desarrollo.</p>
            </div>
        </div>
    </div>
@endsection
