<?php
include("Model/UserAuth.php");

class cGeneral{
    public $viewVars = array();
    public function ConfigMySQL($ambiente){
        if(!file_exists( "app/database.php")){ 
            echo "<h1>No se encontro la configuración para el sistema</h1>";
            exit;
        }
        else{
            include_once('app/database.php');
            // Create connection
            $conexion = mysqli_connect(HOSTNAME, USERNAME, SECRET, DATABASE);
            // Check connection
            if (mysqli_connect_errno()){
                echo "<h1>Failed to connect to MySQL: ".mysqli_connect_error()."</h1>";
                exit;
            }
            else{
                return $conexion;
            }
        }        
    }
   

    public function getConexion($Conexion){
        switch ($Conexion) {
            case "Developer":
                $ambiente = "Developer";
                break;
            case "Testing":
                $ambiente = "Testing";
                break;
            case "Production":
                $ambiente = "Production";
                break;
        }        
        $AbrirConexion = $this->ConfigMySQL($ambiente);
        return $AbrirConexion;
    }

    
    public function url_entities($string) {
        return strtr(
                $string,
                array(
                        "'" => "%27",
                        "&" => "%26",
                        "/" => "%2F",
                        "." => "%2E"
                )
        );
    }
    public function namefile_entities($string) {
        return strtr(
                $string,
                array(
                        "'" => "",
                        '"' => "",
                )
        );
    }
    
    public function content(){
        $UserAuth = new UserAuth;
        $data_sesion = $UserAuth->getInfoSession();

            include("Views/".THIS_CONTROLLER."/".THIS_ACTION.".php");

    }

    
    public function includeHeadScript($name_file){
        try{
            if(!empty($name_file)){
                $include_script = '<script type="text/javascript" src="'.PATH_ROOT.$name_file.'.js"></script>';
                return $include_script; 
            }
        } catch (Exception $ex) {
            echo $e->getMessage();
            die();
        }
    }
    
    public function includeHeadStyle($name_file){
        try{
            if(!empty($name_file)){
                $include_script = '<link rel="stylesheet" type="text/css" href="'.PATH_ROOT.$name_file.'.css">';
                return $include_script; 
            }
        } catch (Exception $ex) {
            echo $e->getMessage();
            die();
        }
    }
    
    public function thisController(){
        switch (MOD_AMBIENT) {
	case 'Developer':
		$position = 1;
		break;
	case 'Testing':
		$position = 3;
		break;        
        }
        $uriSegments = explode("/", parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
        if(isset($uriSegments[$position]) && !empty($uriSegments[$position])){
            return $uriSegments[$position];
        }
        else{ 
            return "Home";
        }
    }
    
    public function thisAction(){
        switch (MOD_AMBIENT) {
	case 'Developer':
		$position = 2;
		break;
	case 'Testing':
		$position = 4;
		break;        
        }
        $uriSegments = explode("/", parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
        if(isset($uriSegments[$position]) && !empty($uriSegments[$position])){
            return $uriSegments[$position];
        }
        else{ 
            return "index";
        }
    }
    
    public function redirect($controller,$action = ""){
        $location = "";
        if(!empty($controller))
           $location .= $controller;
        if(!empty($action))
            $location .= "/".$action;
        header('Location: /'.$location);
    }
    
    public function getRequest(){
        foreach($_GET as $key =>$val){
            $data[$key] = $val;
        }
        
        return $data;
    }
    
    public function postRequest(){
        try{
            $data = array();
            foreach($_POST as $key =>$val){
                $data[$key] = $val;
            }
            
            return $data;
        } catch (Exception $ex) {
            return "";
        }
    
    }
    
    public function getLayoutRender($layout_render){
        require_once("Views/layouts/".$layout_render.".php");
    }
    
    public function MakeHashPasw($psw){
        return md5($psw);
    }
    
    public function MakeTokenUSerSesion(){
        $date = date("Y-m-d H:i:s");
        $pattern = "1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"; 
        $max=strlen($pattern)-1;

        for($i = 0; $i < 5; $i++) { 

            $key .= $pattern{rand(0, $max)}; 

        } 
    
        return $key."SE".$date."VP17";
    }

    //Function para replazar los signos especiales y mostrarlos en el xml sin errores
    function xml_entities($string) {
        return strtr(
                $string,
                array(
                        "<" => "&lt;",
                        ">" => "&gt;",
                        '"' => "&quot;",
                        "'" => "&apos;",
                        "&" => "&amp;",
                )
        );
    }
    
    public function closeConexcionDB($enlace){
        return mysqli_close($enlace);
    }
    
    public function set($one, $two = null) {
        if (is_array($one)) {
                if (is_array($two)) {
                        $data = array_combine($one, $two);
                } else {
                        $data = $one;
                }
        } else {
                $data = array($one => $two);
        }
        $this->viewVars = $data + $this->viewVars;
    }

    public function monthShort($mes){
         $meses = array(
            "01" => "Ene",
            "02" => "Feb",
            "03" => "Mar",
            "04" => "Abr",
            "05" => "May",
            "06" => "Jun",
            "07" => "Jul",
            "08" => "Ago",
            "09" => "Sep",
            "10" => "Oct",
            "11" => "Nov",
            "12" => "Dic"
          );
         
         return $meses[$mes];
    }
    
    public function getConfigSite($campos){
        global $General;
        $conexion = $General->getConexion(MOD_AMBIENT);
        
        $que_campos = "";
        
        for($i=0;count($campos) > $i ; $i++){
            $que_campos .= $campos[$i].",";
        }
        $que_campos = trim($que_campos,",");
        
        #Tomo todas las fechas posteriores o igual a hoy
        $sql_validSessionNow = "SELECT ".$que_campos." FROM configuracion_site WHERE status = 1";
        $resultado = mysqli_query($conexion,$sql_validSessionNow);

        try{
            if (!$resultado) {
                throw new Exception("Error de BD, no se pudo consultar la base de datos");
                $General->closeConexcionDB($conexion);
                return false;
            }
            else{
                $fila = array();
                while ($fila =mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
                    $get_row[] =$fila;
                }
                #echo "<pre>";
                #print_r($get_row[0]); exit;
                
                $General->closeConexcionDB($conexion);
                return $get_row[0];
            }
        }
        catch(Exception $e){
            echo $e->getMessage();
            die();
        }
        
        
    }
}




?>