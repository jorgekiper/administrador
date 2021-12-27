<?php
session_start();
ini_set('display_errors', 1);

include("app/config.php");
include("lib/general/cGeneral.php");

#Configuración de la conexión a DB
$General = new cGeneral();
#$conexion = $General->getConexion(MOD_AMBIENT);




#print_r($uriSegments);
##$uriSegments 
            #0 =>
            #1 => controller
            #2 => action
            

#echo $_SESSION['section'] =  $uriSegments[2];
#$_SESSION['section'] =  (!isset($_SESSION["UsuarioLog"]) && empty($_SESSION["UsuarioLog"])) ? 'login' : $uriSegments;

#Defino el 
$UserAuth = new UserAuth();

switch ($General->thisController()){
    case "admin":
        $render = "_admin";
        break;
    default :
        $render = "_public";
}
#define("LAYOUT_RENDER", $UserAuth->getLayoutRender());


define("LAYOUT_RENDER", $render);
if(file_exists( DOCUMENT_ROOT."/Controllers/".ucwords($General->thisController())."Controller.php")){ 
    $controller_include = ucwords($General->thisController())."Controller.php";
    $this_controller = $General->thisController();
    
}
else{
    $controller_include = "GeneralController.php";
    $this_controller = "General";
}


define("THIS_CONTROLLER", $this_controller);
include("Controllers/".$controller_include);

$_controllerClass = $this_controller."Controller";

$Controller = new $_controllerClass;
if (file_exists(DOCUMENT_ROOT."/Views/".THIS_CONTROLLER."/".$General->thisAction().".php")) {
    $this_action = $General->thisAction();
} else {
    
    if(THIS_CONTROLLER == "Admin"){
            $this_action = "login";
    }
    else{
        if($General->thisAction() != "logout")
            $this_action = "error_404";
        else
            $this_action = $General->thisAction();
    }
}
define("THIS_ACTION", $this_action);

try{
    $Controller->$this_action();
} catch (Exception $ex) {

}

