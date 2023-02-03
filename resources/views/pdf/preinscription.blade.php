<!DOCTYPE html>
<html>

<head>
    <title>Inscripcion Voluntariado Magtel</title>
    <style type="text/css">
        * {
            font-size: 14px;
            font-family: 'Lato';
            src: url(<?php echo asset('fonts/Lato-Regular.jpg'); ?>"") format('truetype');
            font-weight: normal;
            font-style: normal;
        }

        #logoPDF {
            width: 40%;
            float: left;
        }

        #logoPDF img {
            width: 300px;
        }

        #textHeaderPDF {
            width: 48%;
            float: right;
            text-align: right;
        }

        .textoMarcado {
            color: #01b6ed;
            font-weight: bold;
        }

        .separator {
            margin-top: 55px;
            margin-bottom: 30px;
        }

        .marked {
            font-weight: bold;
        }

        .eachSheet {
            padding-left: 20px;
            padding-right: 20px;
        }

        .eachSheet p:first-of-type {
            text-align: center;
            margin: 0 auto;
            font-size: 20px;
            margin-top: 105px;
        }

        #legales {
            font-style: italic;
        }

        #firma {

            font-weight: bold;
            width: 50%;
            float: right;
        }
    </style>
</head>

<body>
    <?php
    $path = 'images/logoNeg.jpg';
    $type = pathinfo($path, PATHINFO_EXTENSION);
    $data = file_get_contents($path);
    $logoPDF = 'data:image/' . $type . ';base64,' . base64_encode($data);
    ?>
    <div id="headerPDF">
        <div id="logoPDF">
            <img src="<?php echo $logoPDF; ?>" />
        </div>
        <div id="textHeaderPDF">
            <span class="textoMarcado">Fundación Magtel</span>
            <br />
            C/ Gabriel Ramos Bejarano 114
            <br />
            (Polígono Industrial “Las Quemadas”), 14014 Córdoba
        </div>
    </div>
    <div class="eachSheet">
        <p class="marked">INSCRIPCION DE PARTICIPACIÓN EN ACTIVIDADES DE VOLUNTARIADO</p>
        <p class="marked">DATOS ENTIDAD Y ACTIVIDAD DE VOLUNTARIADO CORPORATIVO</p>
        <p> - <span class="marked">Entidad:</span> {{ $entityAct }} </p>
        <p> - <span class="marked">Dirección:</span> {{ $direAct }} </p>
        <p> - <span class="marked">Actividad:</span> {{ $nameAct }} </p>
        <p> - <span class="marked">Requisito Previo:</span> {{ $requiPrevAct }} </p>
        <p> - <span class="marked">Formación deseada:</span> {{ $formaAct }} </p>
        <p> - <span class="marked">Identificación:</span> Chaleco/camiseta de voluntariado corporativo de Fundación
            Magtel. </p>
        <p> - <span class="marked">Día actividad:</span> {{ $dateAct }} </p>
        <p> - <span class="marked">Hora inicio:</span> {{ $startTimeAct }} </p>
        <p> - <span class="marked">Hora fin:</span> {{ $endTimeAct }} </p>
        <p> - <span class="marked">Requisitos:</span> {{ $requiAct }} </p>
        <br />
        <p class="marked">DATOS PERSONA VOLUNTARIA CORPORATIVA</p>
        <p> - <span class="marked">Nombre:</span> {{ $nameVol }} </p>
        <p> - <span class="marked">Apellidos:</span> {{ $surnameVol }} {{ $surname2Vol }} </p>
        <p> - <span class="marked">{{ $typeDocVol }}:</span> {{ $numDocVol }} </p>
        <p> - <span class="marked">Fecha:</span>
            En Córdoba a
            {{ substr($date, 0, 2) }}
            de
            <?php
            $meses = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];
            echo $meses[ltrim(substr($date, 3, 2), '0') - 1];
            ?>
            de
            {{ substr($date, -4, 4) }}
        </p>
        <p> - <span class="marked">Firma:</span></p>




    </div>


</body>

</html>
