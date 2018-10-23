<?php
require_once __DIR__ . '/../../vendor/autoload.php';
require '../conexion.php';

global $mysqli;


if(!empty($_GET))
{

    $folio =$_GET['id'];
	$sql = "SELECT nombre,Pnombre FROM registroproyecto WHERE folio='$folio'";
	$result = $mysqli->query($sql);

	$row = $result->fetch_assoc();

	$nombre_pers = $row['nombre'];
	$nombre_proyecto = $row['Pnombre'];

    $mpdf = new \Mpdf\Mpdf();
    $mpdf->allow_charset_conversion=false;
    $mpdf->charset_in='UTF-8';
    $mpdf->useOddEven = 1;

    //header del documento

    $mpdf->SetHTMLHeader('<img src="../../img/header_logos.jpeg">
                        <h4 align=center> Carta Intención </h4>
                        ','O');

    $mpdf->WriteHTML("
    <html>

    <head>
    <meta http-equiv=Content-Type content='text/html; charset=windows-1252'>
    <meta name=Generator content='Microsoft Word 15 (filtered)'>
    <style>
    <!--
    /* Font Definitions */
    @font-face
        {font-family:'Cambria Math';
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
        margin-bottom:10.0pt;
        margin-left:0cm;
        line-height:115%;
        font-size:11.0pt;
        font-family:'Calibri',sans-serif;}
    .MsoChpDefault
        {font-family:'Calibri',sans-serif;}
    .MsoPapDefault
        {margin-bottom:8.0pt;
        line-height:107%;}
    @page WordSection1
        {size:612.0pt 792.0pt;
        margin:70.85pt 3.0cm 70.85pt 3.0cm;}
    div.WordSection1
        {page:WordSection1;}
    -->
    </style>

    </head>

    <body lang=ES-MX>

    <div class=WordSection1>

    <p class=MsoNormal align=center style='text-align:center'>&nbsp;</p>
	<p class=MsoNormal align=center style='text-align:center'>&nbsp;</p>

    <p class=MsoNormal align=right style='margin-bottom:0cm;margin-bottom:.0001pt;
    text-align:right'><b><span lang=ES style='font-family:'Cambria',serif'>&nbsp;</span></b></p>

    <p class=MsoNormal align=right style='margin-bottom:0cm;margin-bottom:.0001pt;
    text-align:right'><b><span lang=ES style='font-family:'Cambria',serif'>Zempoala,
    Hidalgo a --fecha actual-- </span></b></p>

    <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;text-align:
    justify'><span lang=ES style='font-family:'Cambria',serif'>&nbsp;</span></p>

    <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;text-align:
    justify'><span lang=ES style='font-family:'Cambria',serif'>&nbsp;</span></p>

    <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;text-align:
    justify'><b><span lang=ES style='font-family:'Cambria',serif'>Martha Patricia
    Robles Gutiérrez</span></b></p>

    <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;text-align:
    justify'><span lang=ES style='font-family:'Cambria',serif'>Departamento de
    Incubadora de Empresas</span></p>

    <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;text-align:
    justify'><span lang=ES style='font-family:'Cambria',serif'>Universidad
    Politécnica de Pachuca</span></p>

    <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;text-align:
    justify'><b><span lang=ES style='font-family:'Cambria',serif'>P R E S E N T E</span></b></p>

    <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;text-align:
    justify'><span lang=ES style='font-family:'Cambria',serif'>&nbsp;</span></p>

    <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;text-align:
    justify;line-height:150%'><span lang=ES style='font-family:'Cambria',serif'>&nbsp;</span></p>

    <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;text-align:
    justify;line-height:150%'><span lang=ES style='font-family:'Cambria',serif'>Por
    medio de la presente y con el conocimiento de las actividades que realiza la
    Incubadora de Empresas de la <i>Universidad Politécnica de Pachuca</i> <b>UPINNEM</b>
    el cual usted representa, le solicitamos considere este comunicado como <b><i>CARTA
    DE INTENCIÓN</i></b> que muestra nuestro interés y formalidad a pertenecer a
    dicho Centro como Proyecto candidato a ser incubado, con el fin de contribuir
    al desarrollo de nuestro Estado y Región.</span></p>

    <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;text-align:
    justify;line-height:150%'><span lang=ES style='font-family:'Cambria',serif'>&nbsp;</span></p>

    <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;text-align:
    justify;line-height:150%'><span lang=ES style='font-family:'Cambria',serif'>Consideramos
    que, con su respuesta favorable, podremos iniciar esta relación de cooperación
    de beneficio para ambas partes.</span></p>

    <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;text-align:
    justify;line-height:150%'><span lang=ES style='font-family:'Cambria',serif'>&nbsp;</span></p>

    <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;text-align:
    justify;line-height:150%'><span lang=ES style='font-family:'Cambria',serif'>Sin
    más por el momento y en espera de su respuesta, reciba un cordial saludo </span></p>

    <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;text-align:
    justify;line-height:150%'><span lang=ES style='font-family:'Cambria',serif'>&nbsp;</span></p>

    <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;text-align:
    justify;line-height:150%'><b><span lang=ES style='font-family:'Cambria',serif'>&nbsp;</span></b></p>

    <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;text-align:
    justify;line-height:150%'><b><span lang=ES style='font-family:'Cambria',serif'>Atentamente</span></b></p>

    <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;text-align:
    justify'><b><span lang=ES style='font-family:'Cambria',serif'>&nbsp;</span></b></p>

    <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;text-align:
    justify'><b><span lang=ES style='font-family:'Cambria',serif'>&nbsp;</span></b></p>

    <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;text-align:
    justify'><b><span lang=ES style='font-family:'Cambria',serif'>&nbsp;</span></b></p>

    <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;text-align:
    justify'><b><span lang=ES style='font-family:'Cambria',serif'>&nbsp;</span></b></p>

    <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;text-align:
    justify'><b><span lang=ES style='font-family:'Cambria',serif'>$nombre_pers</span></b></p>

    <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;text-align:
    justify'><b><span lang=ES style='font-family:'Cambria',serif'>$nombre_proyecto</span></b></p>

    <p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;text-align:
    justify'><b><span lang=ES style='font-family:'Cambria',serif'>Candidato a
    incubar</span></b></p>

    <p class=MsoNormal>&nbsp;</p>

    </div>

    </body>

    </html>


    ");

    $mpdf->SetHTMLFooter('<p align=right><img src="../../img/footer_logo.jpeg"> </p>');
	$mpdf->Output();
}

?>
