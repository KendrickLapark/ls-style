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
        <p class="marked">Hazte Miembro Colaborador de Fundación Magtel.</p>

        <p>Rellena el formulario que se adjunta e inscríbete gratuitamente como Miembro Colaborador de Fundación Magtel.
        </p>
        <p>Te mantendremos informado de las últimas novedades y proyectos desarrollados por la entidad.</p>
        <p>Forma parte de nuestro proyecto.</p>
        <p>Para cualquier consulta, dirígete a: fundacion@magtel.es </p>


        <p class="marked">PERSONA FÍSICA:</p>

        <p><span class="marked">B1. Nombre:</span> {{ $name }} </p>

        <p><span class="marked">B2. Apellidos:</span> {{ $surnames }} </p>

        <p><span class="marked">B3. Dirección:</span> {{ $street }}
        </p>
        @if ($aditiInfo != '')
            <p><span class="marked">B3. Dirección: Información Adicional</span>
                {{ $aditiInfo }}
            </p>
        @endif

        <p><span class="marked">B4. Teléfono:</span> {{ $tel }} </p>

        <p><span class="marked">B5. Correo Electrónico:</span> {{ $persMail }} </p>
        @if ($authorizer != '')
            <p><span class="marked">B6. Autorizador:</span>
                {{ $authorizer }}
            </p>
        @endif
        <p><span class="marked">Información.: </span></p>
        <p id="legales">
            “La información transmitida está destinada solo a la persona o entidad a la que está dirigida
            y puede contener material confidencial y/o privilegiado. Se prohíbe cualquier revisión,
            retransmisión, difusión u otro uso, o la adopción de cualquier acción basada en esta información,
            por parte de personas o entidades distintas del destinatario previsto. Si ha recibido esto por
            error, comuníquese con el remitente y elimine el material de cualquier ordenador. En aras del
            cumplimiento del Reglamento (UE) 2016/679 del Parlamento Europeo y del Consejo, de 27 de abril
            de 2016 y de la Ley Orgánica 3/2018, de 5 de diciembre, de Protección de Datos Personales y
            garantía de los derechos digitales (LOPD-GDD), puede ejercer los derechos de acceso, rectificación,
            cancelación, limitación, oposición y portabilidad mediante correo electrónico a: protecciondatos@magtel.es.
            Para información adicional sobre la política de privacidad puede consultarlo en la siguiente dirección
            www.magtel.es/proteccion-de-datos/”
        </p>
        <p class="marked">Gracias por su colaboración.</p>
        <p id="firma">
            En Córdoba a
            {{ substr($date, 0, 2) }}
            de
            <?php
            $meses = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];
            echo $meses[ltrim(substr($date, 3, 2), '0') - 1];
            ?>
            de
            {{ substr($date, -4, 4) }}
            <br /><br />
            Firma:
        </p>
    </div>


</body>

</html>
