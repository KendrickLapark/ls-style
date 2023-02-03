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


        .eachSheet p.title {
            text-align: center;
            margin: 0 auto;
            font-size: 16px;
            margin-top: 30px;
            font-weight: bold;
        }

        #firstTitle {
            margin-top: 110px !important;
            text-align: center;
            margin: 0 auto;
            font-size: 20px;
            font-weight: bold;
        }

        #legales {
            font-style: italic;
        }

        #firma {
            font-weight: bold;
            width: 50%;
            float: right;
        }

        td,
        th {
            border-bottom: 1px solid #54595f;
        }

        strong {
            font-weight: bold;
        }

        .yesNoBox {
            width: 50px;
            float: left;
            margin-left: 50px;
        }

        .yesNo {
            border: 1px solid black;
            width: 20px;
            height: 20px;
            float: right;
        }

        .subTitle {
            text-decoration: underline;
        }

        .withMargin {
            margin-top: 50px;
        }

        .signContainer {
            width: 100%;
        }

        #signAccordance {
            text-align: right;
        }

        #signDate {
            text-align: center;
            margin-top: 50px;
            margin-bottom: 50px;
        }

        .bothSignContainer {
            display: flex;
            clear: both;
            margin-bottom: 130px;
        }

        #entitySign,
        #volunteerSign {
            width: 50%;
            float: left;
            text-align: center;
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

        <p id="firstTitle">MODELO DE ACUERDO O COMPROMISO DE INCORPORACIÓN AL PROGRAMA DE VOLUNTARIADO CORPORATIVO</p>
        <p>De una parte, <strong>FUNDACIÓN MAGTEL</strong> con CIF <strong>G14936439</strong>, actuando como
            representante legal <strong>D. ADRIÁN FERNÁNDEZ CÁRDENAS</strong> mayor de edad y con DNI.
            <strong>30826308Y</strong>, en calidad de Director de la Fundación Magtel (en adelante "LA FUNDACIÓN").</p>
        <p>De otra parte, Dª. / D., <strong>{{ $name }}</strong> nacido el día
            <strong>{{ $birthDate }}</strong>, con <strong>{{ $numDoc }}</strong>, vecino/a de Córdoba con
            domicilio en la <strong>{{ $street }}</strong> (en adelante "LA PERSONA VOLUNTARIA").</p>
        <p>Ambas partes se reconocen mutuamente plena capacidad para realizar el presente ACUERDO DE COLABORACIÓN, que
            se regirá por la Ley 45/2015, de 14 de octubre, de Voluntariado.</p>

        <p class="title withMargin">MANIFIESTAN</p>
        <p>I.- Fundación Magtel está constituida con personalidad jurídica autónoma, y tiene como objeto y fines los
            siguientes:</p>
        <p>Los fines de interés general de Fundación Magtel son la educación, promoción cultural y la investigación
            científica y tecnológica en el ámbito medioambiental, así como la cooperación internacional al desarrollo,
            igualmente, de manera secundaria la fundación perseguirá fines de acción social en estos campos.</p>
        <p>Para la consecución de sus fines, la Fundación establece programas de voluntariado.</p>
        <p>II.- LA PERSONA VOLUNTARIA está interesada en colaborar de manera altruista en el marco de alguno de los
            programas de voluntariado de la Fundación.</p>
        <p>III.- Para formalizar las relaciones que ambas partes quieren establecer, dando cumplimento a lo dispuesto en
            el artículo 12.2.a) de la Ley 45/2015, de 14 de octubre, de Voluntariado, por el que se realiza el presente
            ACUERDO DE COLABORACIÓN, que se regirá por las siguientes,</p>

        <p class="title withMargin">CLÁUSULAS</p>
        <p><strong>Primera. - Carácter altruista de la relación:</strong></p>
        <p>La colaboración que preste la PERSONA VOLUNTARIA en cualquiera de los programas de la Fundación tendrá un
            carácter totalmente altruista y gratuito, sin que dé lugar a percibir ningún tipo de salario, honorarios,
            prima, ayudas o cualquiera otra contraprestación de carácter retributivo.</p>
        <p>En ningún caso podrá tratarse, en consecuencia, de una relación laboral, funcionarial, mercantil o cualquiera
            otra retribuida.</p>
        <p>La Persona Voluntaria consiente la cesión de los derechos de imagen para poder difundir en redes de la
            Fundación.</p>
        </p>
        <div style="height:120px;">&nbsp;</div>
    </div>
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
    <div style="clear:both;"></div>
    <div class="eachSheet">

        <p class="withMargin"><strong>Segunda. - Derechos y deberes de la persona voluntaria:</strong></p>
        <p class="subTitle">LA PERSONA VOLUNTARIA tiene los siguientes derechos:</p>
        <p>a) Recibir la orientación, formación y apoyo necesarios para el ejercicio de su actividad.
            <br />b) Ser tratado sin discriminación, respetando su libertad, dignidad, intimidad y creencias.
            <br />c) Participar activamente en la Fundación, de acuerdo con sus Estatutos y normas de actuación.
            <br />d) Estar asegurado contra los riesgos de enfermedad y accidentes derivados del ejercicio de su
            actividad.
            <br />e) Ser reembolsado de los gastos que realice en el desarrollo de su actividad.
            <br />f) Disponer de una credencial que le identifique como voluntario/a.
            <br />g) Realizar las actividades en las debidas condiciones de seguridad e higiene.
            <br />h) Recibir una certificación da su participación en los programas y proyectos de voluntariado.
            <br />i) Cesar libremente en su condición de persona voluntaria.
        </p>

        <p class="subTitle withMargin">LA PERSONA VOLUNTARIA tiene las siguientes obligaciones:</p>
        <p>a) Cumplir los compromisos adquiridos con La Fundación, respectando sus fines y normativa.
            <br />b) Guardar la confidencialidad respecto a la información recibida y/o conocida en el desarrollo de su
            actividad voluntaria.
            <br />c) Rechazar cualquier contraprestación material que pudiera recibir, bien del beneficiario, bien de
            otras personas relacionadas con su acción.
            <br />d) Respetar los derechos de los beneficiarios de su actividad voluntaria. Actuar de forma diligente y
            solidaria.
            <br />e) Participar en las tareas formativas previstas por la Fundación, tanto específicas de la actividad
            voluntaria, como generales sobre el voluntariado.
            <br />f) Seguir las instrucciones dictadas e impartidas en el desarrollo de las actividades encomendadas.
            <br />g) Utilizar debidamente la credencial y los distintivos de la Fundación.
            <br />h) Respetar y cuidar los recursos materiales que la Fundación ponga a su disposición.
        </p>

        <p class="withMargin"><strong>Tercera. - Deberes de LA ENTIDAD:</strong></p>
        <p class="subTitle">FUNDACIÓN MAGTEL se compromete con LA PERSONA VOLUNTARIA, a:</p>
        <p>a) Cumplir los compromisos adquiridos en este Acuerdo.
            <br />b) Suscribir una póliza de seguro, que cubra los riesgos derivados de la acción de voluntariado tanto
            la responsabilidad civil como los accidentes y enfermedad.
            <br />c) Cubrir los gastos derivados de prestación del servicio y dotar a LA PERSONA VOLUNTARIA de los
            medios adecuados para el cumplimiento de sus cometidos.
            <br />d) Establecer los sistemas internos de información y orientación necesarios para la realización de las
            tareas que sean encomendadas a LA PERSONA VOLUNTARIA.
            <br />e) Proporcionarle la formación específica y la orientación necesaria para el ejercicio de su
            actividad.
            <br />f) Garantizar la realización de su actividad en las debidas condiciones de seguridad e higiene.
            <br />g) Facilitar a LA PERSONA VOLUNTARIA una credencial que le habilite e identifique para el desarrollo
            de su actividad (Peto).
            <br />h) Expedir un certificado que acredite los servicios prestados de manera mensual.
        </p>

    </div>
    <div style="height:120px;">&nbsp;</div>
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
    <div style="clear:both;"></div>

    <div class="eachSheet">
        <p class="withMargin"><strong>Cuarta. - Contenido de las funciones y actividades de LA PERSONA
                VOLUNTARIA:</strong></p>
        <p>LA PERSONA VOLUNTARIA prestará su colaboración en las actividades promovidas por Fundación Magtel con las
            funciones detalladas en los anexos al presento acuerdo.</p>

        <p class="withMargin"><strong>Quinta. - Tiempo de dedicación que se compromete a realizar LA PERSONA
                VOLUNTARIA:</strong></p>
        <p>LA PERSONA VOLUNTARIA prestará su colaboración en las actividades promovidas por Fundación Magtel por el
            tiempo de cada actividad detallado en los anexos al presento acuerdo.</p>

        <p class="withMargin"><strong>Sexta. - Proceso de formación requerido:</strong></p>
        <p>Si LA PERSONA VOLUNTARIA requiere de un proceso de formación previo o no para el desempeño de la actividad de
            voluntariado, será especificado en cada anexo por actividad al presente acuerdo.</p>
        <p>En caso afirmativo, LA PERSONA VOLUNTARIA para disponer de dicha formación a través de la colaboración con
            terceras entidades para su capacitación en la actividad en cuestión.</p>

        <p class="withMargin"><strong>Séptima. - Duración del compromiso:</strong></p>
        <p>El presente acuerdo tendrá una duración indefinida.</p>
        <p>Cualquiera de las partes podrá dejarlo sin efecto, debiendo comunicar su decisión a la otra parte con una
            antelación suficiente, según el tipo de colaboración que se esté prestando y, en todo caso, de forma que no
            suponga perjuicio para la Fundación Magtel.</p>

        <p class="withMargin"><strong>Octava. – Normativa.</strong></p>
        <p>Para lo no previsto en el presente acuerdo, se regirá por lo dispuesto en la Ley 45/2015, de 14 de octubre,
            de Voluntariado.</p>

    </div>
    <div style="height:240px;">&nbsp;</div>
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
    <div style="clear:both;"></div>
    </div>
    <div class="eachSheet">

        <div class="signContainer withMargin">
            <div id="signAccordance">
                En, en prueba de conformidad, firman ambas partes en:
            </div>
            <div id="signDate">
                <strong>
                    En Córdoba a
                    {{ substr($date, 0, 2) }}
                    de
                    <?php
                    $meses = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];
                    echo $meses[ltrim(substr($date, 3, 2), '0') - 1];
                    ?>
                    de
                    {{ substr($date, -4, 4) }}
                </strong>
            </div>
            <div class="bothSignContainer">
                <div id="entitySign">
                    <strong>LA ENTIDAD.</strong>
                </div>
                <div id="volunteerSign">
                    <strong>LA PERSONA VOLUNTARIA:</strong>
                </div>
            </div>
            <div class="bothSignContainer">
                <div id="entitySign" class="subTitle">
                    <strong>Adrián Fernández Cárdenas</strong>
                </div>
                <div id="volunteerSign" class="subTitle">
                    <strong>{{ $name }}</strong>
                </div>
            </div>
        </div>

    </div>
</body>

</html>
