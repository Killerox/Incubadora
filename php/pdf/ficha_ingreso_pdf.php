<?php

    require_once __DIR__ . '/../../vendor/autoload.php';
    require '../conexion.php';


    global $mysqli;


    if(!empty($_GET))
    {
        $html_tabla = "";

        $folio = $_GET['id'];

        $folio_proyecto;
        $fecha_proyecto;
        $nombre_proyecto;
        $nombre_resp;
        $dir_respon;
        $col_resp;
        $municipio;
        $cp;
        $estado;
        $tel_resp;
        $correo_resp;
        $proced_resp;
        $legal;
        $sector;
        $sector1 = '';
        $sector2 = '';
        $medio;
        $fecha;
        $info_otro = '';

        $datos_proyecto = mysqli_query($mysqli,"SELECT * from registroproyecto where folio='$folio'");

        while ($row =  mysqli_fetch_array($datos_proyecto)) {
            $folio_proyecto = $row['folio'];
            $fecha_proyecto = $row['fecha'];
            $nombre_proyecto = $row['Pnombre'];
            $nombre_resp = $row['nombre'];
            $dir_respon = $row['direccion'];
            $col_resp = $row['colonia'];
            $municipio = $row['municipio'];
            $cp = $row['cp'];
            $estado = $row['estado'];
            $tel_resp = $row['telefono'];
            $correo_resp = $row['email'];
            $proced_resp = $row['procedencia'];
            $legal = $row['municipio'];
            $sector1 = $row['sector1'];
            $sector2 = $row['sector2'];
            $medio = $row['medio'];
            $info_otro = $row['otro']; ;
        }

        $datos_personas = mysqli_query($mysqli,"SELECT * from personasinvlucradas where folio='$folio'");

        if(mysqli_num_rows($datos_personas) == 0)
        {
            #no existe ninguna persona relacionada
            $html_tabla = "<!--- tabla persona involucrada----------------- -->

            <table class=MsoNormalTable cellspacing=0 cellpadding=0
            style='border-collapse:collapse;border:none'>
            <tr>
            <td width=128 valign=top style='width:77.0pt;border:none;padding:0cm 5.4pt 0cm 5.4pt'>
            <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;text-align:
            justify;line-height:normal'><span style='font-family:'Cambria',serif'>Nombre</span></p>
            </td>
            <td width=597 valign=top style='width:358.0pt;border-bottom:1px solid black;padding:0cm 5.4pt 0cm 5.4pt'>
            <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;text-align:
            justify;line-height:normal'><span style='font-family:'Cambria',serif'></span></p>
            </td>
            </tr>
            <tr>
            <td width=128 valign=top style='width:77.0pt;border:none;padding:0cm 5.4pt 0cm 5.4pt'>
            <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;text-align:
            justify;line-height:normal'><span style='font-family:'Cambria',serif'>Dirección</span></p>
            </td>
            <td width=597 valign=top style='width:358.0pt;border-bottom:1px solid black;padding:0cm 5.4pt 0cm 5.4pt'>
            <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;text-align:
            justify;line-height:normal'><span style='font-family:'Cambria',serif'></span></p>
            </td>
            </tr>
            <tr>
            <td width=128 valign=top style='width:77.0pt;border:none;padding:0cm 5.4pt 0cm 5.4pt'>
            <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;text-align:
            justify;line-height:normal'><span style='font-family:'Cambria',serif'>Colonia
            </span></p>
            </td>
            <td width=597 valign=top style='width:358.0pt;border-bottom:1px solid black;padding:0cm 5.4pt 0cm 5.4pt'>
            <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;text-align:
            justify;line-height:normal'><span style='font-family:'Cambria',serif'>   </span></p>
            </td>
            </tr>
            <tr>
            <td width=128 valign=top style='width:77.0pt;border:none;padding:0cm 5.4pt 0cm 5.4pt'>
            <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;text-align:
            justify;line-height:normal'><span style='font-family:'Cambria',serif'>Municipio</span></p>
            </td>
            <td width=597 valign=top style='width:358.0pt;border-bottom:1px solid black;padding:0cm 5.4pt 0cm 5.4pt'>
            <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;text-align:
            justify;line-height:normal'><span style='font-family:'Cambria',serif'></span></p>
            </td>
            </tr>
            <tr>
            <td width=128 valign=top style='width:77.0pt;border:none;padding:0cm 5.4pt 0cm 5.4pt'>
            <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;text-align:
            justify;line-height:normal'><span style='font-family:'Cambria',serif'>C. P.</span></p>
            </td>
            <td width=597 valign=top style='width:358.0pt;border-bottom:1px solid black;padding:0cm 5.4pt 0cm 5.4pt'>
            <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;text-align:
            justify;line-height:normal'><span style='font-family:'Cambria',serif'>  </span></p>
            </td>
            </tr>
            <tr>
            <td width=128 valign=top style='width:77.0pt;border:none;padding:0cm 5.4pt 0cm 5.4pt'>
            <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;text-align:
            justify;line-height:normal'><span style='font-family:'Cambria',serif'>Estado</span></p>
            </td>
            <td width=597 valign=top style='width:358.0pt;border-bottom:1px solid black;padding:0cm 5.4pt 0cm 5.4pt'>
            <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;text-align:
            justify;line-height:normal'><span style='font-family:'Cambria',serif'>  </span></p>
            </td>
            </tr>
            <tr>
            <td width=128 valign=top style='width:77.0pt;border:none;padding:0cm 5.4pt 0cm 5.4pt'>
            <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;text-align:
            justify;line-height:normal'><span style='font-family:'Cambria',serif'>Teléfonos</span></p>
            </td>
            <td width=597 valign=top style='width:358.0pt;border-bottom:1px solid black;padding:0cm 5.4pt 0cm 5.4pt'>
            <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;text-align:
            justify;line-height:normal'><span style='font-family:'Cambria',serif'></span></p>
            </td>
            </tr>
            <tr>
            <td width=128 valign=top style='width:77.0pt;border:none;padding:0cm 5.4pt 0cm 5.4pt'>
            <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;text-align:
            justify;line-height:normal'><span style='font-family:'Cambria',serif'>Correo E.</span></p>
            </td>
            <td width=597 valign=top style='width:358.0pt;border-bottom:1px solid black;padding:0cm 5.4pt 0cm 5.4pt'>
            <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;text-align:
            justify;line-height:normal'><span style='font-family:'Cambria',serif'></span></p>
            </td>
            </tr>

            </table>
            ";
            #---------- acaba row de prueba ---------
        }
        else
        {
            #existen perdonas involucradas
            while($rowP = mysqli_fetch_array($datos_personas))
            {

            $nombre_p = $rowP['nombre_com'];
            $dir_p = $rowP['direccion'];
            $col_p = $rowP['colonia'];
            $mun_p = $rowP['municipio'];
            $cp_p = $rowP['cp'];
            $est_p = $rowP['estado'];
            $tel_p = $rowP['telefono'];
            $email_p = $rowP['email'];

            $html_tabla = $html_tabla . "
            <table class=MsoNormalTable cellspacing=0 cellpadding=0
            style='border-collapse:collapse;border:none'>
            <tr>
            <td width=128 valign=top style='width:77.0pt;border:none;padding:0cm 5.4pt 0cm 5.4pt'>
            <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;text-align:
            justify;line-height:normal'><span style='font-family:'Cambria',serif'>Nombre</span></p>
            </td>
            <td width=597 valign=top style='width:358.0pt;border-bottom:1px solid black;padding:0cm 5.4pt 0cm 5.4pt'>
            <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;text-align:
            justify;line-height:normal'><span style='font-family:'Cambria',serif'> $nombre_p </span></p>
            </td>
            </tr>
            <tr>
            <td width=128 valign=top style='width:77.0pt;border:none;padding:0cm 5.4pt 0cm 5.4pt'>
            <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;text-align:
            justify;line-height:normal'><span style='font-family:'Cambria',serif'>Dirección</span></p>
            </td>
            <td width=597 valign=top style='width:358.0pt;border-bottom:1px solid black;padding:0cm 5.4pt 0cm 5.4pt'>
            <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;text-align:
            justify;line-height:normal'><span style='font-family:'Cambria',serif'> $dir_p </span></p>
            </td>
            </tr>
            <tr>
            <td width=128 valign=top style='width:77.0pt;border:none;padding:0cm 5.4pt 0cm 5.4pt'>
            <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;text-align:
            justify;line-height:normal'><span style='font-family:'Cambria',serif'>Colonia
            </span></p>
            </td>
            <td width=597 valign=top style='width:358.0pt;border-bottom:1px solid black;padding:0cm 5.4pt 0cm 5.4pt'>
            <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;text-align:
            justify;line-height:normal'><span style='font-family:'Cambria',serif'> $col_p </span></p>
            </td>
            </tr>
            <tr>
            <td width=128 valign=top style='width:77.0pt;border:none;padding:0cm 5.4pt 0cm 5.4pt'>
            <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;text-align:
            justify;line-height:normal'><span style='font-family:'Cambria',serif'>Municipio</span></p>
            </td>
            <td width=597 valign=top style='width:358.0pt;border-bottom:1px solid black;padding:0cm 5.4pt 0cm 5.4pt'>
            <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;text-align:
            justify;line-height:normal'><span style='font-family:'Cambria',serif'>$mun_p</span></p>
            </td>
            </tr>
            <tr>
            <td width=128 valign=top style='width:77.0pt;border:none;padding:0cm 5.4pt 0cm 5.4pt'>
            <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;text-align:
            justify;line-height:normal'><span style='font-family:'Cambria',serif'>C. P.</span></p>
            </td>
            <td width=597 valign=top style='width:358.0pt;border-bottom:1px solid black;padding:0cm 5.4pt 0cm 5.4pt'>
            <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;text-align:
            justify;line-height:normal'><span style='font-family:'Cambria',serif'>$cp_p</span></p>
            </td>
            </tr>
            <tr>
            <td width=128 valign=top style='width:77.0pt;border:none;padding:0cm 5.4pt 0cm 5.4pt'>
            <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;text-align:
            justify;line-height:normal'><span style='font-family:'Cambria',serif'>Estado</span></p>
            </td>
            <td width=597 valign=top style='width:358.0pt;border-bottom:1px solid black;padding:0cm 5.4pt 0cm 5.4pt'>
            <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;text-align:
            justify;line-height:normal'><span style='font-family:'Cambria',serif'>$est_p</span></p>
            </td>
            </tr>
            <tr>
            <td width=128 valign=top style='width:77.0pt;border:none;padding:0cm 5.4pt 0cm 5.4pt'>
            <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;text-align:
            justify;line-height:normal'><span style='font-family:'Cambria',serif'>Teléfonos</span></p>
            </td>
            <td width=597 valign=top style='width:358.0pt;border-bottom:1px solid black;padding:0cm 5.4pt 0cm 5.4pt'>
            <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;text-align:
            justify;line-height:normal'><span style='font-family:'Cambria',serif'>$tel_p</span></p>
            </td>
            </tr>
            <tr>
            <td width=128 valign=top style='width:77.0pt;border:none;padding:0cm 5.4pt 0cm 5.4pt'>
            <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;text-align:
            justify;line-height:normal'><span style='font-family:'Cambria',serif'>Correo E.</span></p>
            </td>
            <td width=597 valign=top style='width:358.0pt;border-bottom:1px solid black;padding:0cm 5.4pt 0cm 5.4pt'>
            <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;text-align:
            justify;line-height:normal'><span style='font-family:'Cambria',serif'>$col_p</span></p>
            </td>
            </tr>
            </table>
            <p class=MsoNormal>&nbsp;</p>
            ";
            }
        }


        $fecha_new = "";
        for ($i=0; $i < 10 ; $i++) {
            $fecha_new = $fecha_new.$fecha_proyecto[$i];
        }

        $medio1 = '';
        $medio2 = '';
        $medio3 = '';


        if($medio == 'upp')
        {
            $medio1 ='X';
        }
        if($medio == 'secretaria')
        {
            $medio2 = 'X';
        }
        if($medio == 'otro')
        {
            $medio3 = 'X';
        }


        $sec1 = "";
        $sec2 = "";
        $sec3 = "";
        $sec4 = "";
        $sec5 = "";
        $sec6 = "";
        $sec7 = "";
        $sec8 = "";
        $sec9 = "";
        $sec10 = "";
        $sec11 = "";
        $sec12 = "";
        $sec13 = "";
        $sec14 = "";
        $sec15 = "";
        $sec16 = "";
        $sec17 = "";
        $sec18 = "";
        $sec19 = "";

        if($sector1 == 'Aeronautica')
        {
            $sec1 = "X";
        }
        if ($sector1 == 'Agroindustria') {
            $sec2 = "X";
        }
        if ($sector1 == 'Alimentos') {
            $sec3 = "X";
        }
        if ($sector1 == 'Automotriz') {
            $sec4 = "X";
        }
        if ($sector1 == 'Biónica') {
            $sec5 = "X";
        }
        if ($sector1 == 'Biotecnología') {
            $sec6 = "X";
        }
        if ($sector1 == 'Construcción') {
            $sec7 = "X";
        }
        if ($sector1 == 'Cosmetologia') {
            $sec8 = "X";
        }
        if ($sector1 == 'Desarrollo Social') {
            $sec9 = "X";
        }
        if ($sector1 == 'Electronica') {
            $sec10 = "X";
        }
        if ($sector1 == 'Medio Ambiente') {
            $sec11 = "X";
        }
        if ($sector1 == 'Metalmecanica') {
            $sec12 = "X";
        }
        if ($sector1 == 'Robótica') {
            $sec13 = "X";
        }
        if ($sector1 == 'Productos Naturales') {
            $sec14 = "X";
        }
        if ($sector1 == 'Salud') {
            $sec15 = "X";
        }
        if ($sector1 == 'Tecnologías de la Información (software, Multimedia, etc.)') {
            $sec16 = "X";
        }
        if ($sector1 == 'Tecnologías del Aprendizaje') {
            $sec17 = "X";
        }
        if ($sector1 == 'Turismo') {
            $sec18 = "X";
        }
        if ($sector1 == 'Deporte') {
            $sec19 = "X";
        }

        // ------------------- sector2 ------------
        if($sector2 == 'Aeronautica')
        {
            $sec1 = "X";
        }
        if ($sector2 == 'Agroindustria') {
            $sec2 = "X";
        }
        if ($sector2 == 'Alimentos') {
            $sec3 = "X";
        }
        if ($sector2 == 'Automotriz') {
            $sec4 = "X";
        }
        if ($sector2 == 'Biónica') {
            $sec5 = "X";
        }
        if ($sector2 == 'Biotecnología') {
            $sec6 = "X";
        }
        if ($sector2 == 'Construccion') {
            $sec7 = "X";
        }
        if ($sector2 == 'Cosmetologia') {
            $sec8 = "X";
        }
        if ($sector2 == 'Desarrollo Social') {
            $sec9 = "X";
        }
        if ($sector2 == 'Electronica') {
            $sec10 = "X";
        }
        if ($sector2 == 'Medio Ambiente') {
            $sec11 = "X";
        }
        if ($sector2 == 'Metalmecanica') {
            $sec12 = "X";
        }
        if ($sector2 == 'Robótica') {
            $sec13 = "X";
        }
        if ($sector2 == 'Productos Naturales') {
            $sec14 = "X";
        }
        if ($sector2 == 'Salud') {
            $sec15 = "X";
        }
        if ($sector2 == 'Tecnologías de la Información (software, Multimedia, etc.)') {
            $sec16 = "X";
        }
        if ($sector2 == 'Tecnologías del Aprendizaje') {
            $sec17 = "X";
        }
        if ($sector2 == 'Turismo') {
            $sec18 = "X";
        }
        if ($sector2 == 'Deporte') {
            $sec19 = "X";
        }

        $fecha_proyecto = $fecha_new;

        $mpdf = new \Mpdf\Mpdf();
        $mpdf->ignore_invalid_utf8 = true;
        $mpdf->useOddEven = 1;
        $mpdf->SetImportUse();


        //header del documento

        $mpdf->SetHTMLHeader('<img src="../../img/header_logos.jpeg">
                            <h4 align=center> Ficha Ingreso Proyecto </h4>
                            ','O');


        $mpdf->SetHTMLHeader('<img src="../../img/header_logos.jpeg">','E');

        //footer
        $mpdf->SetHTMLFooter('<p align=right><img src="../../img/footer_logo.jpeg"></p>','O');


        //cuerpo del documento
        $mpdf->WriteHTML('<html>');


        //head del documento
        $mpdf->WriteHTML('<head>');

        $mpdf->WriteHTML('
        <meta http-equiv=Content-Type content="text/html; charset=windows-1252">
        <meta name=Generator content="Microsoft Word 15 (filtered)">
        <style>
        <!--
        /* Font Definitions */
        @font-face
        {font-family:"Cambria Math";
        panose-1:2 4 5 3 5 4 6 3 2 4;}
        @font-face
        {font-family:Calibri;
        panose-1:2 15 5 2 2 2 4 3 2 4;}
        @font-face
        {font-family:Cambria;
        panose-1:2 4 5 3 5 4 6 3 2 4;}
        /* Style Definitions */
        p.MsoNormal, li.MsoNormal, div.MsoNormal
        {margin-top:0cm;
        margin-right:0cm;
        margin-bottom:8.0pt;
        margin-left:0cm;
        line-height:107%;
        font-size:11.0pt;
        font-family:"Calibri",sans-serif;}
        p.MsoHeader, li.MsoHeader, div.MsoHeader
        {mso-style-link:"Encabezado Car";
        margin:0cm;
        margin-bottom:.0001pt;
        font-size:11.0pt;
        font-family:"Calibri",sans-serif;}
        p.MsoFooter, li.MsoFooter, div.MsoFooter
        {mso-style-link:"Pie de página Car";
        margin:0cm;
        margin-bottom:.0001pt;
        font-size:11.0pt;
        font-family:"Calibri",sans-serif;}
        span.EncabezadoCar
        {mso-style-name:"Encabezado Car";
        mso-style-link:Encabezado;}
        span.PiedepginaCar
        {mso-style-name:"Pie de página Car";
        mso-style-link:"Pie de página";}
        .MsoChpDefault
        {font-family:"Calibri",sans-serif;}
        .MsoPapDefault
        {margin-bottom:8.0pt;
        line-height:107%;}
        /* Page Definitions */
        @page WordSection1
        {size:612.0pt 792.0pt;
        margin:70.85pt 3.0cm 70.85pt 3.0cm;}
        div.WordSection1
        {page:WordSection1;}
        -->
        </style>
        ');

        $mpdf->WriteHTML('</head>'); //fin head

        //body
        $mpdf->WriteHTML('<body>');

        $mpdf->WriteHTML("<div class=WordSection1>

        <p class=MsoNormal align=center style='text-align:center'>&nbsp;</p>
        <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
        text-align:center;line-height:normal'><b><span style='font-family:'Cambria',serif'>&nbsp;</span></b></p>

        <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
        text-align:center;line-height:normal'><span style='font-family:'Cambria',serif'>Unidad
        Politécnica de Innovación y Desarrollo Empresarial <b>UPINNEM</b></span></p>

        <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
        text-align:center;line-height:normal'><span style='font-family:'Cambria',serif'>&nbsp;</span></p>

        <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
        text-align:center;line-height:normal'><b><span style='font-family:'Cambria',serif'>Departamento
        de Incubadora de Empresas</span></b></p>

        <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
        normal'><span style='font-family:'Cambria',serif'>&nbsp;</span></p>

        <table class=MsoNormalTable border=1 cellspacing=0 cellpadding=0
        style='margin-left:239.3pt;border-collapse:collapse;border:1px solid black'>
        <tr>
        <td width=75 style='width:45.05pt;border:1px solid black windowtext 1.0pt;padding:0cm 5.4pt 0cm 5.4pt'>
        <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
        text-align:center;'><span style='font-family:'Cambria',serif'>Folio</span></p>
        </td>
        <td width=256 valign=top style='width:153.4pt;border:1px solid black windowtext 0.5pt;
        border-left:1px solid black;padding:0cm 5.4pt 0cm 5.4pt'>
        <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
        normal'><span style='font-family:'Cambria',serif'>$folio_proyecto</span></p>
        </td>
        </tr>
        <tr>
        <td width=75 style='width:45.05pt;border:1px solid black windowtext 0.5pt;border-top:
        1px solid black;padding:0cm 5.4pt 0cm 5.4pt'>
        <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
        text-align:center;line-height:normal'><span style='font-family:'Cambria',serif'>Fecha</span></p>
        </td>
        <td width=256 valign=top style='width:153.4pt;border-top:1px solid black;border-left:
        1px solid black;border-bottom:1px solid black windowtext 1.0pt;border-right:1px solid black windowtext 0.5pt;
        padding:0cm 5.4pt 0cm 5.4pt'>
        <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
        normal'><span style='font-family:'Cambria',serif'>$fecha_proyecto</span></p>
        </td>
        </tr>
        </table>

        <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
        normal'><span style='font-family:'Cambria',serif'>&nbsp;</span></p>

        <table class=MsoNormalTable cellspacing=0 cellpadding=0
        style='border-collapse:collapse;border:none'>
        <tr>
        <td width=234 style='width:140.4pt;border:none;padding:0cm 5.4pt 0cm 5.4pt'>
        <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
        normal'><span style='font-family:'Cambria',serif'>Nombre del proyecto</span></p>
        </td>
        <td width=491 valign=top style='width:294.6pt;border-bottom:1px solid black;padding:0cm 5.4pt 0cm 5.4pt'>
        <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;text-align:
        justify;line-height:normal'><span style='font-family:'Cambria',serif'>$nombre_proyecto</span></p>
        </td>
        </tr>
        <tr>
        <td width=725 colspan=2 valign=top style='width:435.0pt;border-bottom:1px solid black;padding:0cm 5.4pt 0cm 5.4pt'>
        <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;text-align:
        justify;line-height:normal'><span style='font-family:'Cambria',serif'>&nbsp;</span></p>
        </td>
        </tr>
        <tr>
        <td width=725 colspan=2 valign=top style='width:435.0pt;border-bottom:1px solid black;padding:0cm 5.4pt 0cm 5.4pt'>
        <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;text-align:
        justify;line-height:normal'><span style='font-family:'Cambria',serif'>&nbsp;</span></p>
        </td>
        </tr>
        </table>

        <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
        normal'><span style='font-family:'Cambria',serif'>&nbsp;</span></p>

        <!--  ----------------------- tabla responsables ------------------- -->
        <table class=MsoNormalTable cellspacing=0 cellpadding=0
        style='border-collapse:collapse;border:none'>
        <tr>
        <td width=363 style='width:218.05pt;padding:0cm 5.4pt 0cm 5.4pt'>
        <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
        normal'><span style='font-family:'Cambria',serif'>Nombre del responsable del
        proyecto:</span></p>
        </td>


        <td width=362 valign=top style='width:216.95pt;padding:0cm 5.4pt 0cm 5.4pt;border-bottom:1px solid black'>
        <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;text-align:
        justify;line-height:normal'><span style='font-family:'Cambria',serif'>$nombre_resp</span></p>
        </td>
        </tr>
        <tr>
        <td width=725 colspan=2 valign=top style='width:435.0pt;border-bottom:1px solid black;padding:0cm 5.4pt 0cm 5.4pt'>
        <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;text-align:
        justify;line-height:normal'><span style='font-family:'Cambria',serif'>&nbsp;</span></p>
        </td>
        </tr>
        <tr>
        <td width=725 colspan=2 valign=top style='width:435.0pt;border-bottom:1px solid black;windowtext 1.0pt;padding:0cm 5.4pt 0cm 5.4pt'>
        <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;text-align:
        justify;line-height:normal'><span style='font-family:'Cambria',serif'>&nbsp;</span></p>
        </td>
        </tr>
        </table>

        <p class=MsoNormal align=center style='text-align:center'>&nbsp;</p>

        <table class=MsoNormalTable cellspacing=0 cellpadding=0
        style='border-collapse:collapse;border:none'>
        <tr>
        <td width=128 valign=top style='width:77.0pt;padding:0cm 5.4pt 0cm 5.4pt'>
        <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;text-align:
        justify;line-height:normal'><span style='font-family:'Cambria',serif'>Dirección</span></p>
        </td>
        <td width=597 valign=top style='width:358.0pt;border-bottom:1px solid black;padding:0cm 5.4pt 0cm 5.4pt'>
        <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;text-align:
        justify;line-height:normal'><span style='font-family:'Cambria',serif'>$dir_respon</span></p>
        </td>
        </tr>
        <tr>
        <td width=128 valign=top style='width:77.0pt;border-bottom:1px solid black;padding:0cm 5.4pt 0cm 5.4pt'>
        <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;text-align:
        justify;line-height:normal'><span style='font-family:'Cambria',serif'>&nbsp;</span></p>
        </td>
        <td width=597 valign=top style='border-bottom:1px solid black;width:358.0pt;padding:0cm 5.4pt 0cm 5.4pt'>
        <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;text-align:
        justify;line-height:normal'><span style='font-family:'Cambria',serif'>&nbsp;</span></p>
        </td>
        </tr>
        <tr>
        <td width=128 valign=top style='width:77.0pt;padding:0cm 5.4pt 0cm 5.4pt'>
        <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;text-align:
        justify;line-height:normal'><span style='font-family:'Cambria',serif'>Colonia</span></p>
        </td>
        <td width=597 valign=top style='width:358.0pt;border-bottom:1px solid black;padding:0cm 5.4pt 0cm 5.4pt'>
        <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;text-align:
        justify;line-height:normal'><span style='font-family:'Cambria',serif'>$col_resp</span></p>
        </td>
        </tr>
        <tr>
        <td width=128 valign=top style='width:77.0pt;border:none;padding:0cm 5.4pt 0cm 5.4pt'>
        <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;text-align:
        justify;line-height:normal'><span style='font-family:'Cambria',serif'>Municipio</span></p>
        </td>
        <td width=597 valign=top style='width:358.0pt;border-bottom:1px solid black;padding:0cm 5.4pt 0cm 5.4pt'>
        <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;text-align:
        justify;line-height:normal'><span style='font-family:'Cambria',serif'>$municipio</span></p>
        </td>
        </tr>
        <tr>
        <td width=128 valign=top style='width:77.0pt;padding:0cm 5.4pt 0cm 5.4pt'>
        <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;text-align:
        justify;line-height:normal'><span style='font-family:'Cambria',serif'>C. P.</span></p>
        </td>
        <td width=597 valign=top style='width:358.0pt;border-bottom:1px solid black;padding:0cm 5.4pt 0cm 5.4pt'>
        <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;text-align:
        justify;line-height:normal'><span style='font-family:'Cambria',serif'>$cp</span></p>
        </td>
        </tr>
        <tr>
        <td width=128 valign=top style='width:77.0pt;padding:0cm 5.4pt 0cm 5.4pt'>
        <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;text-align:
        justify;line-height:normal'><span style='font-family:'Cambria',serif'>Estado</span></p>
        </td>
        <td width=597 valign=top style='width:358.0pt;border-bottom:1px solid black;
        padding:0cm 5.4pt 0cm 5.4pt'>
        <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;text-align:
        justify;line-height:normal'><span style='font-family:'Cambria',serif'>$estado</span></p>
        </td>
        </tr>
        </table>

        <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
        normal'><span style='font-family:'Cambria',serif'>&nbsp;</span></p>

        <table class=MsoNormalTable cellspacing=0 cellpadding=0
        style='border-collapse:collapse;border:none'>
        <tr>
        <td width=128 valign=top style='width:77.0pt;border:none;padding:0cm 5.4pt 0cm 5.4pt'>
        <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;text-align:
        justify;line-height:normal'><span style='font-family:'Cambria',serif'>Teléfonos</span></p>
        </td>
        <td width=597 valign=top style='width:358.0pt;border-bottom:1px solid black;padding:0cm 5.4pt 0cm 5.4pt'>
        <p class=MsoNormal style='border-bottom:1px solid black;margin-bottom:0cm;margin-bottom:.0001pt;text-align:
        justify;line-height:normal'><span style='font-family:'Cambria',serif'>$tel_resp</span></p>
        </td>
        </tr>
        </table>

        <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
        normal'><span style='font-family:'Cambria',serif'>&nbsp;</span></p>

        <table class=MsoNormalTable cellspacing=0 cellpadding=0
        style='border-collapse:collapse;border:none'>
        <tr>
        <td width=128 valign=top style='width:77.0pt;border:none;padding:0cm 5.4pt 0cm 5.4pt'>
        <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;text-align:
        justify;line-height:normal'><span style='font-family:'Cambria',serif'>Correo E.</span></p>
        </td>
        <td width=597 valign=top style='width:358.0pt;border-bottom:1px solid black;padding:0cm 5.4pt 0cm 5.4pt'>
        <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;text-align:
        justify;line-height:normal'><span style='font-family:'Cambria',serif'>$correo_resp</span></p>
        </td>
        </tr>
        </table>

        <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
        normal'><span style='font-family:'Cambria',serif'>&nbsp;</span></p>

        <table class=MsoNormalTable cellspacing=0 cellpadding=0
        style='border-collapse:collapse;border:none'>
        <tr>
        <td width=158 valign=top style='width:95.0pt;border:none;padding:0cm 5.4pt 0cm 5.4pt'>
        <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;text-align:
        justify;line-height:normal'><span style='font-family:'Cambria',serif'>Procedencia</span></p>
        </td>
        <td width=567 valign=top style='width:340.0pt;border-bottom:1px solid black;padding:0cm 5.4pt 0cm 5.4pt'>
        <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;text-align:
        justify;line-height:normal'><span style='font-family:'Cambria',serif'>$proced_resp</span></p>
        </td>
        </tr>
        </table>

        <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
        normal'><span style='font-family:'Cambria',serif'>&nbsp;</span></p>

        <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
        normal'><span style='font-family:'Cambria',serif'>&nbsp;</span></p>


        <!-- -----------Personas involucradas en el Proyecto Empresa ----------------------------------- -->

        <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
        normal'><span style='font-family:'Cambria',serif'>Personas involucradas en el
        Proyecto Empresa</span></p>
        <p class=MsoNormal>&nbsp;</p>
        <!---- acaba tabla persona involucrada ----------- -->
        ");

        $mpdf->WriteHTML($html_tabla);

        $mpdf->WriteHTML("
        <p class=MsoNormal>&nbsp;</p>
        <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
        normal'><span>Su proyecto está constituido
        legalmente como empresa</span></p>

        <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
        normal'><span>&nbsp;</span></p>

        <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
        normal'><span>No (    )                              En
        proceso (  X  )                                Sí (    )</span></p>

        <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
        normal'><span>                                                                                                                          RFC
        (             )</span></p>

        <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
        normal'><span>&nbsp;</span></p>

        <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
        normal'><span>Sector:     (      )
        Industrial           (   X   ) Comercio               (      ) Servicios</span></p>

        <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
        normal'><span >&nbsp;</span></p>

        <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
        normal'><span >&nbsp;</span></p>

        <div align=center>

        <!----------------------------------------------- TABLA DE SECTOR ------------------------------->

        <table class=MsoNormalTable border=1 cellspacing=0 cellpadding=0 width=730
        style='width:437.75pt;border-collapse:collapse;border:1px solid black'>
        <tr>
        <td width=189 style='width:113.5pt;border:1px solid black;background:
        #F3F3F3;padding:0cm 5.4pt 0cm 5.4pt'>
        <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
        text-align:center;line-height:normal'><span >Sectores</span></p>
        </td>
        <td width=103 valign=top style='width:62.0pt;border:solid windowtext 1.0pt;
        border-left:none;background:gray;padding:0cm 5.4pt 0cm 5.4pt'>
        <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
        text-align:center;line-height:normal'><span>&nbsp;</span></p>
        </td>
        <td width=343 valign=top style='width:205.55pt;border:1px solid black;background:#F2F2F2;padding:0cm 5.4pt 0cm 5.4pt'>
        <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
        text-align:center;line-height:normal'><span>Sectores</span></p>
        </td>
        <td width=95 valign=top style='width:2.0cm;border:1px solid black;background:gray;padding:0cm 5.4pt 0cm 5.4pt'>
        <p class=MsoNormal align=center style='margin-bottom:0cm;margin-bottom:.0001pt;
        text-align:center;line-height:normal'><span >&nbsp;</span></p>
        </td>
        </tr>
        <tr>
        <td width=189 valign=top style='width:113.5pt;border:1px solid black;padding:0cm 5.4pt 0cm 5.4pt'>
        <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;text-align:
        justify;line-height:normal'><span >Aeronáutica</span></p>
        </td>
        <td width=103 valign=top style='width:62.0pt;border:1px solid black;
        padding:0cm 5.4pt 0cm 5.4pt'>
        <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;text-align:
        justify;line-height:normal'><span>$sec1</span></p>
        </td>
        <td width=343 valign=top style='width:205.55pt;border:1px solid black;
        padding:0cm 5.4pt 0cm 5.4pt'>
        <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;text-align:
        justify;line-height:normal'><span>Medio
        Ambiente</span></p>
        </td>
        <td width=95 valign=top style='width:2.0cm;border:1px solid black;
        padding:0cm 5.4pt 0cm 5.4pt'>
        <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;text-align:
        justify;line-height:normal'><span>$sec11</span></p>
        </td>
        </tr>
        <tr>
        <td width=189 valign=top style='width:113.5pt;border:1px solid black;padding:0cm 5.4pt 0cm 5.4pt'>
        <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;text-align:
        justify;line-height:normal'><span>Agroindustria</span></p>
        </td>
        <td width=103 valign=top style='width:62.0pt;border:1px solid black;
        padding:0cm 5.4pt 0cm 5.4pt'>
        <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;text-align:
        justify;line-height:normal'><span >$sec2</span></p>
        </td>
        <td width=343 valign=top style='width:205.55pt;border:1px solid black;
        padding:0cm 5.4pt 0cm 5.4pt'>
        <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;text-align:
        justify;line-height:normal'><span >Metalmecánica</span></p>
        </td>
        <td width=95 valign=top style='width:2.0cm;border:1px solid black;
        padding:0cm 5.4pt 0cm 5.4pt'>
        <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;text-align:
        justify;line-height:normal'><span >$sec12</span></p>
        </td>
        </tr>
        <tr>
        <td width=189 valign=top style='width:113.5pt;border:1px solid black;padding:0cm 5.4pt 0cm 5.4pt'>
        <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;text-align:
        justify;line-height:normal'><span>Alimentos</span></p>
        </td>
        <td width=103 valign=top style='width:62.0pt;border:1px solid black;
        padding:0cm 5.4pt 0cm 5.4pt'>
        <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;text-align:
        justify;line-height:normal'><span>$sec3</span></p>
        </td>
        <td width=343 valign=top style='width:205.55pt;border:1px solid black;
        padding:0cm 5.4pt 0cm 5.4pt'>
        <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;text-align:
        justify;line-height:normal'><span >Productos
        Naturales</span></p>
        </td>
        <td width=95 valign=top style='width:2.0cm;border:1px solid black;
        padding:0cm 5.4pt 0cm 5.4pt'>
        <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;text-align:
        justify;line-height:normal'><span>$sec13</span></p>
        </td>
        </tr>
        <tr>
        <td width=189 valign=top style='width:113.5pt;border:1px solid black;padding:0cm 5.4pt 0cm 5.4pt'>
        <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;text-align:
        justify;line-height:normal'><span >Automotriz</span></p>
        </td>
        <td width=103 valign=top style='width:62.0pt;border:1px solid black;
        padding:0cm 5.4pt 0cm 5.4pt'>
        <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;text-align:
        justify;line-height:normal'><span>$sec4</span></p>
        </td>
        <td width=343 valign=top style='width:205.55pt;border:1px solid black;
        padding:0cm 5.4pt 0cm 5.4pt'>
        <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;text-align:
        justify;line-height:normal'><span>Robótica</span></p>
        </td>
        <td width=95 valign=top style='width:2.0cm;border:1px solid black;
        padding:0cm 5.4pt 0cm 5.4pt'>
        <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;text-align:
        justify;line-height:normal'><span>$sec14</span></p>
        </td>
        </tr>
        <tr>
        <td width=189 valign=top style='width:113.5pt;border:1px solid black;padding:0cm 5.4pt 0cm 5.4pt'>
        <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;text-align:
        justify;line-height:normal'><span>Biónica</span></p>
        </td>
        <td width=103 valign=top style='width:62.0pt;border:1px solid black;
        padding:0cm 5.4pt 0cm 5.4pt'>
        <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;text-align:
        justify;line-height:normal'><span >$sec5</span></p>
        </td>
        <td width=343 valign=top style='width:205.55pt;border:1px solid black;
        padding:0cm 5.4pt 0cm 5.4pt'>
        <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;text-align:
        justify;line-height:normal'><span >Salud</span></p>
        </td>
        <td width=95 valign=top style='width:2.0cm;border-top:none;border:1px solid black;
        padding:0cm 5.4pt 0cm 5.4pt'>
        <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;text-align:
        justify;line-height:normal'><span >$sec15</span></p>
        </td>
        </tr>
        <tr>
        <td width=189 valign=top style='width:113.5pt;border:1px solid black;padding:0cm 5.4pt 0cm 5.4pt'>
        <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;text-align:
        justify;line-height:normal'><span>Biotecnología</span></p>
        </td>
        <td width=103 valign=top style='width:62.0pt;border:1px solid black;
        padding:0cm 5.4pt 0cm 5.4pt'>
        <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;text-align:
        justify;line-height:normal'><span>$sec6</span></p>
        </td>
        <td width=343 valign=top style='width:205.55pt;border:1px solid black;
        padding:0cm 7.1pt 0cm 5.4pt'>
        <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;text-align:
        justify;line-height:normal'><span>Tecnologías
        de la Información (software, Multimedia, etc.)</span></p>
        </td>
        <td width=95 valign=top style='width:2.0cm;border:1px solid black;
        padding:0cm 5.4pt 0cm 5.4pt'>
        <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;text-align:
        justify;line-height:normal'><span>$sec16</span></p>
        </td>
        </tr>
        <tr>
        <td width=189 valign=top style='width:113.5pt;border:1px solid black;
        border-top:none;padding:0cm 5.4pt 0cm 5.4pt'>
        <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;text-align:
        justify;line-height:normal'><span>Construcción</span></p>
        </td>
        <td width=103 valign=top style='width:62.0pt;border:1px solid black;
        padding:0cm 5.4pt 0cm 5.4pt'>
        <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;text-align:
        justify;line-height:normal'><span >$sec7</span></p>
        </td>
        <td width=343 valign=top style='width:205.55pt;border:1px solid black;
        padding:0cm 5.4pt 0cm 5.4pt'>
        <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;text-align:
        justify;line-height:normal'><span >Tecnologías
        del Aprendizaje</span></p>
        </td>
        <td width=95 valign=top style='width:2.0cm;border:1px solid black;
        padding:0cm 5.4pt 0cm 5.4pt'>
        <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;text-align:
        justify;line-height:normal'><span >$sec17</span></p>
        </td>
        </tr>
        <tr>
        <td width=189 valign=top style='width:113.5pt;border:1px solid black;
        border-top:none;padding:0cm 5.4pt 0cm 5.4pt'>
        <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;text-align:
        justify;line-height:normal'><span>Cosmetología</span></p>
        </td>
        <td width=103 valign=top style='width:62.0pt;border:1px solid black;
        padding:0cm 5.4pt 0cm 5.4pt'>
        <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;text-align:
        justify;line-height:normal'><span >$sec8</span></p>
        </td>
        <td width=343 valign=top style='width:205.55pt;border:1px solid black;
        padding:0cm 5.4pt 0cm 5.4pt'>
        <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;text-align:
        justify;line-height:normal'><span>Turismo</span></p>
        </td>
        <td width=95 valign=top style='width:2.0cm;border:1px solid black;
        padding:0cm 5.4pt 0cm 5.4pt'>
        <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;text-align:
        justify;line-height:normal'><span >$sec18</span></p>
        </td>
        </tr>
        <tr>
        <td width=189 valign=top style='width:113.5pt;border:1px solid black;
        border-top:none;padding:0cm 5.4pt 0cm 5.4pt'>
        <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;text-align:
        justify;line-height:normal'><span>Desarrollo
        Social</span></p>
        </td>
        <td width=103 valign=top style='width:62.0pt;border:1px solid black;
        padding:0cm 5.4pt 0cm 5.4pt'>
        <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;text-align:
        justify;line-height:normal'><span>$sec9</span></p>
        </td>
        <td width=343 valign=top style='width:205.55pt;border:1px solid black;
        padding:0cm 5.4pt 0cm 5.4pt'>
        <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;text-align:
        justify;line-height:normal'><span>Deporte</span></p>
        </td>
        <td width=95 valign=top style='width:2.0cm;border:1px solid black;
        padding:0cm 5.4pt 0cm 5.4pt'>
        <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;text-align:
        justify;line-height:normal'><span>$sec19</span></p>
        </td>
        </tr>
        <tr>
        <td width=189 valign=top style='width:113.5pt;border:1px solid black;padding:0cm 5.4pt 0cm 5.4pt'>
        <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;text-align:
        justify;line-height:normal'><span>Electrónica</span></p>
        </td>
        <td width=103 valign=top style='width:62.0pt;border:1px solid black;
        padding:0cm 5.4pt 0cm 5.4pt'>
        <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;text-align:
        justify;line-height:normal'><span >$sec10</span></p>
        </td>
        <td width=343 valign=top style='width:205.55pt;border:1px solid black;
        padding:0cm 5.4pt 0cm 5.4pt'>
        <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;text-align:
        justify;line-height:normal'><span >Otro </span></p>
        </td>
        <td width=95 valign=top style='width:2.0cm;border:1px solid black;
        padding:0cm 5.4pt 0cm 5.4pt'>
        <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;text-align:
        justify;line-height:normal'><span></span></p>
        </td>
        </tr>
        <tr>
        <td width=730 colspan=4 valign=top style='width:437.75pt;border:1px solid black;
        border-top:none;padding:0cm 5.4pt 0cm 5.4pt'>
        <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;text-align:
        justify;line-height:normal'><span >Especifique</span></p>
        </td>
        </tr>
        </table>

        </div>

        <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
        normal'><span >&nbsp;</span></p>

        <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
        normal'><span >&nbsp;</span></p>

        <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
        normal'><span >Por qué medio por el que se
        enteró del UPINNEM: </span></p>

        <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
        normal'><span >&nbsp;</span></p>

        <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
        normal'><span >( $medio1 ) Universidad
        Politécnica de Pachuca</span></p>

        <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
        normal'><span >&nbsp;</span></p>

        <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
        normal'><span > (Especificar, propaganda,
        cursos, otro emprendedor, etcétera):</span></p>

        <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
        normal'><span >&nbsp;</span></p>

        <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
        normal'><span>( $medio2 ) Secretaría de
        Desarrollo Económico (análoga)                 </span></p>

        <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
        normal'><span>&nbsp;</span></p>

        <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
        normal'><span>( $medio3 ) Otro (especificar):</span></p>

        <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
        normal'><span>&nbsp;</span></p>

        <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
        normal'><span >&nbsp;</span></p>

        <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
        normal'><span>Documentación de
        identificación:</span></p>

        <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
        normal'><span>&nbsp;</span></p>

        <table class=MsoNormalTable border=0 cellspacing=0 cellpadding=0
        style='margin-left:12.5pt;border-collapse:collapse'>
        <tr>
        <td width=59 valign=top style='width:35.45pt;border:1px solid black;
        padding:0cm 5.4pt 0cm 5.4pt'>
        <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
        normal'><span>&nbsp;X</span></p>
        </td>
        <td width=378 valign=top style='width:8.0cm;border:none;padding:0cm 5.4pt 0cm 5.4pt'>
        <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
        normal'><span>Identificación oficial</span></p>
        <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
        normal'><span>&nbsp;</span></p>
        </td>
        </tr>
        <tr>
        <td width=59 valign=top style='width:35.45pt;border:1px solid black;
        border-top:none;padding:0cm 5.4pt 0cm 5.4pt'>
        <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
        normal'><span>&nbsp;X</span></p>
        </td>
        <td width=378 valign=top style='width:8.0cm;border:none;padding:0cm 5.4pt 0cm 5.4pt'>
        <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
        normal'><span>Comprobante de domicilio
        (Preferentemente dónde se tendrá el domicilio fiscal)</span></p>
        </td>
        </tr>
        </table>

        <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
        normal'><span >&nbsp;</span></p>

        <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
        normal'><span >&nbsp;</span></p>

        <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;line-height:
        normal'><span >Nota: Estos documentos se
        utilizan solamente para autentificación del proyecto y los procesos que se
        realicen, no será utilizado para otro tipo de propósito.</span></p>



        </div>
        ");


        $mpdf->WriteHTML("</body>");


        $mpdf->WriteHTML("</html>");//fin del documento
        $mpdf->AddPage();
        //$pagecount = $mpdf->SetSourceFile('prueba.pdf');
        //$tplId = $mpdf->ImportPage($pagecount);
        //$mpdf->UseTemplate($tplId);
        $mpdf->Output();
}


 ?>
