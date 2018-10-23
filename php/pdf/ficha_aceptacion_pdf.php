	<?php 

	require_once __DIR__ . '/vendor/autoload.php';
	require 'php/conexion.php';

	global $mysqli;
	
	if(!empty($_GET)) {

	$folio =$_GET['folio'];
	$sql = "SELECT nombre,Pnombre FROM registroproyecto WHERE folio='$folio'";
	$result = $mysqli->query($sql);

	$row = $result->fetch_assoc();

	$nombre_pers = $row['nombre'];
	$nombre_proyecto = $row['Pnombre'];

	$mpdf = new \Mpdf\Mpdf();
	$mpdf->allow_charset_conversion=true; 
	
	$mpdf->charset_in='UTF-8';
	$mpdf->useOddEven = 1;




	//header del documento

	$mpdf->SetHTMLHeader('<img src="imass/header_logos.jpg">
						<h4 align=center> Carta de Aceptación </h4>
						','O');

	
	$mpdf->WriteHTML("<html>
	<head>
	<meta http-equiv=Content-Type content='text/html; charset=utf-8'>
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
		margin-bottom:8.0pt;
		margin-left:0cm;
		line-height:107%;
		font-size:11.0pt;
		font-family:'Calibri',sans-serif;}
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
	text-align:right'><b><span lang=ES style='font-family:'Cambria',serif'>Zempoala,
	Hidalgo a 29 de Abril de 2018.</span></b></p>

	<p class=MsoNormal align=right style='margin-bottom:0cm;margin-bottom:.0001pt;
	text-align:right'><b><span lang=ES style='font-family:'Cambria',serif'>&nbsp;</span></b></p>

	<p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;text-align:
	justify'><b><span lang=ES style='font-family:'Cambria',serif'>&nbsp;</span></b></p>

	<p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;text-align:
	justify'><b><span lang=ES style='font-family:'Cambria',serif'>&nbsp;</span></b></p>

	<p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;text-align:
	justify'><b><span lang=ES style='font-family:'Cambria',serif'> $nombre_pers </span></b></p>

	<p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;text-align:
	justify'><b><span lang=ES style='font-family:'Cambria',serif'> $nombre_proyecto </span></b></p>

	<p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;text-align:
	justify'><b><span lang=ES style='font-family:'Cambria',serif'>P R E S E N T E.</span></b></p>

	<p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;text-align:
	justify'><b><span lang=ES style='font-family:'Cambria',serif'>&nbsp;</span></b></p>

	<p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;text-align:
	justify'><b><span lang=ES style='font-family:'Cambria',serif'>&nbsp;</span></b></p>

	<p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;text-align:
	justify;line-height:150%'><span lang=ES style='font-family:'Cambria',serif'>En
	respuesta a su solicitud y conforme a la evaluación realizada en la Reunión de
	Comité de Evaluación de Proyectos, de la Universidad Politécnica de Pachuca, le
	informo que el Proyecto denominado <b> $nombre_proyecto</b>, presentado por usted,
	cuenta con el potencial suficiente  para ser incubado.</span></p>

	<p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;text-align:
	justify;line-height:150%'><span lang=ES style='font-family:'Cambria',serif'>&nbsp;</span></p>

	<p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;text-align:
	justify;line-height:150%'><span lang=ES style='font-family:'Cambria',serif'>&nbsp;</span></p>

	<p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;text-align:
	justify;line-height:150%'><span lang=ES style='font-family:'Cambria',serif'>Seguro
	de contar con su participación, le envío un cordial saludo.</span></p>

	<p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;text-align:
	justify;line-height:150%'><span lang=ES style='font-family:'Cambria',serif'>&nbsp;</span></p>

	<p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;text-align:
	justify'><span lang=ES style='font-family:'Cambria',serif'>&nbsp;</span></p>

	<p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;text-align:
	justify'><span lang=ES style='font-family:'Cambria',serif'>&nbsp;</span></p>

	<p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;text-align:
	justify'><b><span lang=ES style='font-family:'Cambria',serif'>A T E N T A M E N
	T E</span></b></p>

	<p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;text-align:
	justify'><b><span lang=ES style='font-family:'Cambria',serif'>&nbsp;</span></b></p>

	<p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;text-align:
	justify'><b><span lang=ES style='font-family:'Cambria',serif'>&nbsp;</span></b></p>

	<p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;text-align:
	justify'><b><span lang=ES style='font-family:'Cambria',serif'>&nbsp;</span></b></p>

	<p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;text-align:
	justify'><b><span lang=ES style='font-family:'Cambria',serif'>&nbsp;</span></b></p>

	<p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;text-align:
	justify'><b><span lang=ES style='font-family:'Cambria',serif'>Departamento de
	Incubadora de Empresas </span></b></p>

	<p class=MsoNormal style='margin-bottom:0cm;margin-bottom:.0001pt;text-align:
	justify'><span lang=ES style='font-family:'Cambria',serif'>Universidad
	Politécnica de Pachuca</span></p>



	</div>

	</body>

	</html>
	");


	$mpdf->SetHTMLFooter('<p align=right><img src="imass/footer_logo.jpg"> </p>');
	$mpdf->Output();

	}

 ?>