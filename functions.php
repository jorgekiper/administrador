<?php
ini_set('display_errors', '1');

switch($_SERVER['SERVER_NAME']){
    case "Sitio.dev.net": //Cambiar path (URL DEV).
        $rutaProyecto = "/maqueta/";
        break;
    case "local.landingpage_blank"://Cambiar path (URL localhost).
        $rutaProyecto = "/maqueta/";
        break;
    default:
        $rutaProyecto = "/maqueta/";
}

$srvr = "http://".$_SERVER['HTTP_HOST'].$rutaProyecto;
$url = $srvr;
define("CARPETA", $url);

//Ruta path
function get_template_directory_uri($slash = '') {
    $rutaProyecto = dirname($_SERVER['PHP_SELF']);
    $srvr = "http://".$_SERVER['HTTP_HOST'].$rutaProyecto.'/';
    $url = $srvr;
    $string = implode("",explode("\\",$url));
    return stripslashes(trim($string));
    // return $url.$slash;
}

//Títulos Secciones
 function TituloSecciones() {
	$srvrPath = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
	$archivo = basename($srvrPath).'.php';
	$urlTitle = $archivo;
	$arrayUrls = array(
	    //Páginas Títulos
	    'maqueta.php'=>'Inicio',
		'inicio.php'=>'Inicio'
	    //'inicio.php'=>'Inicio',
	    //Internas Títulos
	    //'titulo-interna.php'=>'tiutlo de la Interna'
	);

	return $arrayUrls[$urlTitle];
}

function classPage() {
  $protocolCla = isset($_SERVER["HTTPS"]) ? 'https' : 'http';
	$srvrPath = $protocolCla."://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
	$archivo = basename($srvrPath);
  $urlTitle = $archivo;
  if(isset($_GET['sec']) && $_GET['sec'] != ''){
    return 'page-'.$urlTitle;
  } else {
    return 'page-inicio';
  }
}

//URL sitio
function site_url($slash = '') {
  $srvrSite = "http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']);
  $sitio = $srvrSite;
  $string = implode("",explode("\\",$sitio));
  return stripslashes(trim($string));
  // return $sitio.$slash;
}

function get_site_url() {
  $url_actual = "http://".$_SERVER['HTTP_HOST'].$_SERVER["REQUEST_URI"];
  $string = implode("",explode("\\",$url_actual));
  return stripslashes(trim($string));
  // return $url_actual;
}

?>
