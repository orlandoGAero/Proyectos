﻿<!DOCTYPE HTML PUBLIC "- / / W3C / / DTD HTML 4.01 Transitional / / EN""Http://www.w3.org/TR/html4/loose.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="es">
	<head>
		<title>Subir Documento</title>
		<link rel="shortcut icon" type="image/x-icon" href="../../imagenes/inventarioiapem2.png" />
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<link type="text/css" href="../../css/style_divs.css" rel="stylesheet" />
		<link type="text/css" href="../../css/stylemenu.css" rel="stylesheet" />
		<link type="text/css" href="../../css/style_menu_vert.css" rel="stylesheet"/><style type="text/css">._css3m{display:none}</style>
		<link type="text/css" href="../../css/estiloform.css" rel="stylesheet" />
		<script type="text/javascript" src="../../librerias/jquery-1.4.2.min.js"></script>
		<?php @session_start();
			if ($_SESSION['acceso'] == "" or $_SESSION['IDusuario'] == "")
			{
				print  "<meta http-equiv = Refresh content = \"0; url = ../../index.php\">";
			}
			$acceso = $_COOKIE ['acceso'];
			$idu = $_COOKIE ['IDusuario'];
			$tipo = $_COOKIE ['tipo'];
			if($acceso != '1')
			{
				print  "<meta http-equiv = Refresh content = \"0; url = ../../index.php\">";
			}
			include '../../librerias/conexion.php';
			$consulta = " 	SELECT *
							FROM usuarios
							WHERE IDusuario = '$idu' ";
			$ejecutar = mysql_query ($consulta) or die (mysql_error());
				$usuario = mysql_result ($ejecutar, 0, 'usuario');
				$nombre = mysql_result ($ejecutar, 0, 'nombre');
				$nombre = utf8_encode($nombre);
				$ap = mysql_result ($ejecutar, 0, 'appat');
				$ap = utf8_encode($ap);
				$am = mysql_result ($ejecutar, 0, 'ammat');
				$am = utf8_encode($am);
				$nombreUs = "$nombre $ap $am";
		?>
		<script>
			!window.jQuery && document.write('<script src="../../librerias/jquery-1.4.3.min.js"><\/script>');
		</script>
		<script type = "text/javascript" src = "../../librerias/jquery.fancybox-1.3.4.pack.js"></script>
		<link rel="stylesheet" type="text/css" href="../../css/jquery.fancybox-1.3.4.css" media = "screen" />	
			<script type = "text/javascript">
			$(document).ready(function() 
			{
				$("#iapem").fancybox();
			});
			</script>
		<script language = "JavaScript">
			<!-- Begin
			function popUp(URL) 
			{
				day = new Date();
				id = day.getTime();
				eval("page" + id + " = window.open(URL, '" + id + "', 'toolbar=1 ,scrollbars=1,location=1,statusbar=1,menubar=1,resizable=0,width=100,height=300,left = 0,top = 0');");
			}
			// End -->
		</script>
		
		<script type="text/javascript">
			$(function (e) {
				$('#idIn').change(function (e) {
					$('#resultado').load("Select_verEst_adq.php?idInm=" + this.options[this.selectedIndex].value)
				})
			})
		</script>
	</head>
	<body>
		<div id="contenedor">
			<div id="banner">
				<img src="../../imagenes/encab-iapem1.png" width='100%' class='bordeimagen'/>
			</div>
		
			<div id="cssmenu">
				<ul class="menu">
					<li  class='active'><a href="../index_usuario.php">Inicio</a></li>
					
					<li class='has-sub'><a href="#">Coordinación</a>
						<ul>
							<li><a href="../registro_coordinacion.php">Registrar</a></li>
							<li><a href="../buscar_coordinacion.php">Buscar</a></li>
						</ul>
					</li>
					
					<li class='has-sub'><a href="#">Responsable</a>
						<ul>
							<li><a href="../registro_responsable.php">Registrar</a></li>
							<li><a href="../buscar_responsable.php">Buscar</a></li>
						</ul>
					</li>
					
					<li class='has-sub'><a href="#">Usuarios</a>
						<ul>
							<li><a href="../buscar_usuario.php">Buscar</a></li>
						</ul>
					</li>
					
					<li class='has-sub'><a href="#">Reportes</a>
						<ul>
							<li><a href="../reportespdf/reporte_responsables.php">Responsable</a></li>
							<li><a href="../reportespdf/reporte_coordinaciones.php">Coordinación</a></li>
						</ul>
					</li>
					
					<li>
						<div style="display: none;">
							<div id = "about" style = "width:500px;height:300;overflow:auto;background:transparent;">
								<img src = '../../imagenes/Acerca.png' height = '300' width = '500'>
							</div>
						</div>
						<a id = 'iapem' href = '#about'>Acerca de</a>
					</li>
					
					<li class = 'has-sub'><a href="#"> <?php echo "$usuario" ?> </a>
						<ul>
							<li><a href="../cambiar_contrasena.php">Cambiar Contraseña</a></li>
							<li><a href="../../logout.php">Salir</a></li>
						<ul>
					</li>
				</ul>
			</div>
			
			<div id="contenido">

				<div id="izquierda6">
					<ul id="css3menu1" class="topmenu">
						<li class="topfirst"><a href="#" style="width:139px;"><span>Bienes Muebles</span></a>
							<ul>
								<li class="subfirst"><a href="../muebles/registrar_muebles.php"><img src="data:image/png;base64,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" alt=""/>Registrar</a></li>
								<li><a href="../muebles/buscar_muebles.php"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAB/ElEQVR42mNkoBAwwhizZs3i1dEzLH3x6a/v1+/f+Rh/frpw68rZvqampqMEDZg/f76wmKLOoT88cloSwvwMbCxMDH/+/GN4//LR30VTWzKXLF40G68BO/YcmMUoop0qKcIHFGFiYGVhZmBkZGT4+/cfw8tHN7/HBrnqPn369C5WA6KiohiTs4rfSytp8f9nANr8/z/Db6DtrCwsDOzsrAw/vn9nKEkOqNi1a1cnVgP8/PzYWtp7fojJKjH+Y2QGCwLNYPgFNOQfkP4PdGRSoMPEQ4cOFeD0wpmzZ2+qahuq/fkPCVOQRhD+85eB4eWL5wwBLhbZjx49mobTgBkzZqQFhEbM5OHnB9oIcQHQAQy/f/9lmDd90vuailL9v3//PsZpgKSkJGNwcHBnUmpqkYKSEjMHJyfDo0dPGHZs3fLj76+fbM+ePSvrBQK86QBqkKGqqmogkCn88uXL67dv394kICBQ5O7unu/h4dFz8ODBsnnz5v3HaQA2ICQkxCgoKDjH3t4+ydPTc+mZM2cSOzs7fxNtAAjIyckxCwsLr7SxsQkGumT31atXg8vKyj4TbQAI6OjosAFds9na2trN1dX13MWLF70LCwtfEG0ACAA1c/Py8u62srKyVFFR3hMVFe1KkgEg4OXlJSgiIjKHnZ390ezZswtJNgAdAACVFsIRiWFEbwAAAABJRU5ErkJggg==" alt=""/>Buscar</a></li>
							</ul>
						</li>
						
						<li class="topmenu"><a href="#" style="width:139px;"><span>Bienes Inmuebles</span></a>
							<ul>
								<li class="subfirst"><a href="registrar_Inmuebles.php"><img src="data:image/png;base64,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" alt=""/>Registrar</a></li>
								<li><a href="buscar_Inmuebles.php"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAB/ElEQVR42mNkoBAwwhizZs3i1dEzLH3x6a/v1+/f+Rh/frpw68rZvqampqMEDZg/f76wmKLOoT88cloSwvwMbCxMDH/+/GN4//LR30VTWzKXLF40G68BO/YcmMUoop0qKcIHFGFiYGVhZmBkZGT4+/cfw8tHN7/HBrnqPn369C5WA6KiohiTs4rfSytp8f9nANr8/z/Db6DtrCwsDOzsrAw/vn9nKEkOqNi1a1cnVgP8/PzYWtp7fojJKjH+Y2QGCwLNYPgFNOQfkP4PdGRSoMPEQ4cOFeD0wpmzZ2+qahuq/fkPCVOQRhD+85eB4eWL5wwBLhbZjx49mobTgBkzZqQFhEbM5OHnB9oIcQHQAQy/f/9lmDd90vuailL9v3//PsZpgKSkJGNwcHBnUmpqkYKSEjMHJyfDo0dPGHZs3fLj76+fbM+ePSvrBQK86QBqkKGqqmogkCn88uXL67dv394kICBQ5O7unu/h4dFz8ODBsnnz5v3HaQA2ICQkxCgoKDjH3t4+ydPTc+mZM2cSOzs7fxNtAAjIyckxCwsLr7SxsQkGumT31atXg8vKyj4TbQAI6OjosAFds9na2trN1dX13MWLF70LCwtfEG0ACAA1c/Py8u62srKyVFFR3hMVFe1KkgEg4OXlJSgiIjKHnZ390ezZswtJNgAdAACVFsIRiWFEbwAAAABJRU5ErkJggg==" alt=""/>Buscar</a></li>
							</ul>
						</li>
						
						<li class="topmenu"><a href="#" style="width:139px;"><span>Bienes Informáticos</span></a>
							<ul>
								<li class="subfirst"><a href="../tecnologias/registrar_tecnologias.php"><img src="data:image/png;base64,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" alt=""/>Registrar</a></li>
								<li><a href="../tecnologias/buscar_artInformaticos.php"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAB/ElEQVR42mNkoBAwwhizZs3i1dEzLH3x6a/v1+/f+Rh/frpw68rZvqampqMEDZg/f76wmKLOoT88cloSwvwMbCxMDH/+/GN4//LR30VTWzKXLF40G68BO/YcmMUoop0qKcIHFGFiYGVhZmBkZGT4+/cfw8tHN7/HBrnqPn369C5WA6KiohiTs4rfSytp8f9nANr8/z/Db6DtrCwsDOzsrAw/vn9nKEkOqNi1a1cnVgP8/PzYWtp7fojJKjH+Y2QGCwLNYPgFNOQfkP4PdGRSoMPEQ4cOFeD0wpmzZ2+qahuq/fkPCVOQRhD+85eB4eWL5wwBLhbZjx49mobTgBkzZqQFhEbM5OHnB9oIcQHQAQy/f/9lmDd90vuailL9v3//PsZpgKSkJGNwcHBnUmpqkYKSEjMHJyfDo0dPGHZs3fLj76+fbM+ePSvrBQK86QBqkKGqqmogkCn88uXL67dv394kICBQ5O7unu/h4dFz8ODBsnnz5v3HaQA2ICQkxCgoKDjH3t4+ydPTc+mZM2cSOzs7fxNtAAjIyckxCwsLr7SxsQkGumT31atXg8vKyj4TbQAI6OjosAFds9na2trN1dX13MWLF70LCwtfEG0ACAA1c/Py8u62srKyVFFR3hMVFe1KkgEg4OXlJSgiIjKHnZ390ezZswtJNgAdAACVFsIRiWFEbwAAAABJRU5ErkJggg==" alt=""/>Buscar</a></li>
							</ul>
						</li>
						
						<li class="topmenu"><a href="#" style="width:139px;"><span>Planta Vehicular</span></a>
							<ul>
								<li class="subfirst"><a href="../vehiculos/registrar_plantaVehicular.php"><img src="data:image/png;base64,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" alt=""/>Registrar</a></li>
								<li><a href="../vehiculos/buscar_vehiculo.php"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAB/ElEQVR42mNkoBAwwhizZs3i1dEzLH3x6a/v1+/f+Rh/frpw68rZvqampqMEDZg/f76wmKLOoT88cloSwvwMbCxMDH/+/GN4//LR30VTWzKXLF40G68BO/YcmMUoop0qKcIHFGFiYGVhZmBkZGT4+/cfw8tHN7/HBrnqPn369C5WA6KiohiTs4rfSytp8f9nANr8/z/Db6DtrCwsDOzsrAw/vn9nKEkOqNi1a1cnVgP8/PzYWtp7fojJKjH+Y2QGCwLNYPgFNOQfkP4PdGRSoMPEQ4cOFeD0wpmzZ2+qahuq/fkPCVOQRhD+85eB4eWL5wwBLhbZjx49mobTgBkzZqQFhEbM5OHnB9oIcQHQAQy/f/9lmDd90vuailL9v3//PsZpgKSkJGNwcHBnUmpqkYKSEjMHJyfDo0dPGHZs3fLj76+fbM+ePSvrBQK86QBqkKGqqmogkCn88uXL67dv394kICBQ5O7unu/h4dFz8ODBsnnz5v3HaQA2ICQkxCgoKDjH3t4+ydPTc+mZM2cSOzs7fxNtAAjIyckxCwsLr7SxsQkGumT31atXg8vKyj4TbQAI6OjosAFds9na2trN1dX13MWLF70LCwtfEG0ACAA1c/Py8u62srKyVFFR3hMVFe1KkgEg4OXlJSgiIjKHnZ390ezZswtJNgAdAACVFsIRiWFEbwAAAABJRU5ErkJggg==" alt=""/>Buscar</a></li>
							</ul>
						</li>
					</ul>
				</div>
				
				<div id="derecha6">
					<div id="botones_sec">
						<a href="registrar_inmuebles.php"><img src='../../imagenes/inmueble.png' ALT="Registrar Inmueble" TITLE="Registrar Inmueble" vspace=4 hspace=4/></a>
						<a href="subirDocumentos_Inm.php"><img src='../../imagenes/documento.png' ALT="Subir documento" TITLE="Subir documento" vspace=4 hspace=4/></a>
					</div>
					
					<?php
						include '../../librerias/conexion.php';
						include '../../librerias/quitar.php';
						
						/*paso 5 : SOLAMENTE SE RECIBEN CON POST LAS VARIABLES QUE NO SON DE TIPO FILE*/
						
						$idDocInm = mysql_real_escape_string(quitar($_POST['iddoc']));
						$idInm = mysql_real_escape_string(quitar($_POST['idInm']));
						$band=0;
						
						if($idInm=="Seleccione...")
						{
							echo"<center><table><tr><td><img src='../../imagenes/icon_advertencia.png'/></td><td><font size='4' face='Constantia Italic' text color='#ff8816'>Selecciona el nombre del inmueble</font></td></tr></table></center>";
							$band=1;
						}
						else
						{
							/*PASO 6: SE OBTIENE EL PATH DE DONDE SE ESTA EJECUTANDO LA APLICACION*/
							define('DIR_BASE', dirname(__FILE__).'/');
							/*DEFINE UNA VARIABLE Y LE ASIGNO EL VALOR DE 30000000 EN BYTES*/
							define('MAX_FILE_SIZE', 30000000);
							/* ISSET= SI EL ARCHIVO TIENE UN NOMBRE VALIDO */
							/*SI EL ARCHIVO DONDE ALOJAR ES UNA RUTA VALIDA*/
							/*SI ARCHIVO NO SUPERA EL MAXIMO DE TAMAÑO ASIGNADO */
							/*SI EL ARCHIVO TIENE UNA EXTENCION VALIDA*/
							
							if(isset($_FILES['archivo']['name']) && is_uploaded_file($_FILES['archivo']['tmp_name']) && $_FILES['archivo']['size'] <= MAX_FILE_SIZE && preg_match('/.[a-z0-9]+$/', $_FILES['archivo']['name'], $ext))
							{
								/*convierte a minusculas la extension del archivo ejmplo .jpg*/
								$ext[0] = strtolower($ext[0]);
								/*si la extension es .jpg entonces que haga la transferencia*/
								if ($ext[0]== '.pdf'  or $ext[0]== '.jpg' or $ext[0]== '.png')
								{
									/*creo una variable ruta que va a guardar  la ruta donde almacena el archivo*/
									$ruta = '../../EstadoAdquisicion/'. $_FILES['archivo']['name'];
									$ruta = utf8_decode($ruta);
									/*mover el archivo de donde tu lo tomaste a la posicion de la ruta de la carpeta de fotos */
									move_uploaded_file($_FILES['archivo']['tmp_name'],$ruta );
									/*en ruta 1 se guarda el nombre del archivo*/
									$ruta1 = $_FILES['archivo']['name'];
									$ruta1 = utf8_decode($ruta1);/*Nombre del archivo*/
									/*en ruta11 se pone la ruta con todo y la carpeta*/
									$ruta = utf8_encode($ruta);
									$ruta11 = $ruta;
									$ruta11 = utf8_decode($ruta11);/*Ruta del archivo*/
								}
								else
								{
									echo"<center>
											<table border='0'>
												<tr>
													<td>
														<img src='../../imagenes/tache.png' vspace=10/>
													</td>
													<td>
														<font size='4' face='Candara Italic' text color='#f40b0b'>Archivo no valido</font>
													</td>
												</tr>
											</table>
										</center>";	
									$band=1;
								}
							}
							else
							{
								echo"<center><table><tr><td><img src='../../imagenes/icon_advertencia.png'/></td><td><font size='4' face='Constantia Italic' text color='#ff8816'>Selecciona un archivo</font></td></tr></table></center>";
								$band=1;
							}
						}
						
						if($band==0)
						{
							$consulta = "SELECT * FROM documentos_inmuebles WHERE nombre='$ruta1' AND IDdoc_inmuebles!='$idDocInm'";
							$ejecutar = mysql_query($consulta) or die (mysql_error());
							$filas = mysql_num_rows($ejecutar);
								if($filas !=0)
								{
									echo"<center><table><tr><td><img src='../../imagenes/icon_advertencia.png'/></td><td><font size='4' face='Constantia Italic' text color='#ff8816'>El nombre del archivo ya existe</font></td></tr></table></center>";
									$band = 1;
								}
						}
						
						if($band==1)
						{
							echo"<br/><a href='subirDocumentos_Inm.php'><img src='../../imagenes/reintentar.png'/></a>";
						}
						
						if($band==0)
						{	
							$consulta2 = "INSERT INTO documentos_inmuebles(IDinmueble,nombre,ruta,fecha_ingreso)
										 VALUES ($idInm,'$ruta1','$ruta11',NOW())";
							$ejecutar2 = mysql_query($consulta2) or die(mysql_error());
							
							
							$ruta1 = utf8_encode($ruta1);/*Nombre del archivo*/
							$ruta11 = utf8_encode($ruta11);/*Ruta del archivo*/
							
							echo"<br/><img src='../../imagenes/palomita.png' vspace=10/><br/>";							
							echo"<font size='4' face='Constantia Italic' text color='#8edc48'>Registro guardado correctamente</font>";
						}
					?>
					
				</div>
			</div>

			<div id="pie">
				Sistema de Inventario IAPEM
			</div>
		</div>
	</body>
</html>