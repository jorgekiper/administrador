<?php

include_once("lib/general/cGeneral.php");
class UserAuth extends cGeneral {
    
    public function isLogged(){
        if(isset($_SESSION['UserAuth']["idUser"]) && !empty($_SESSION['UserAuth']["idUser"])){
            #Verifico si es una sesion valida
            try {
                if($this->validSessionNow() == true){
                    return true;
                }
                else{
                  throw new Exception("Error. Session is not valid for system.");
                }
                return false;
            } catch (Exception $e) {
                echo $e->getMessage();
                die();
            }
            
            
        }
        else{
            
        }
            
    }
    
    public function validSessionNow(){
        global $General;
        $conexion = $General->getConexion(MOD_AMBIENT);
        $sql_validSessionNow = "SELECT id_users, token_user FROM users WHERE id_users =".$_SESSION['UserAuth']["idUser"]." AND token_user ='".$_SESSION['UserAuth']["token_user"]."'";
        $resultado = mysqli_query($conexion,$sql_validSessionNow);

        try{
            if (!$resultado) {
                throw new Exception("Error de BD, no se pudo consultar la base de datos");
                $General->closeConexcionDB($conexion);
                return false;
            }
            else{
                $General->closeConexcionDB($conexion);
                return true;
            }
        }
        catch(Exception $e){
            echo $e->getMessage();
            die();
        }

    }
    
    public function validEmailRegis($email){
        global $General;
        $conexion = $General->getConexion(MOD_AMBIENT);
        $sql_validEmailRegis = "SELECT username, status FROM users WHERE username ='".$email."'";
        $resultado = mysqli_query($conexion,$sql_validEmailRegis);

        try{
            if (!$resultado) {
                throw new Exception("Error de BD, no se pudo consultar la base de datos");
                return false;
            }
            else{
                $fila = array();
                $fila =mysqli_fetch_array($resultado, MYSQLI_ASSOC);
                if(count($fila) > 0){
                    switch ($fila["status"]){
                        case 0:
                            $response['code'] = 0;
                            $response["msg"]  = "Tu cuenta se encuentra inactiva. Contacta al administrador";
                            break;
                        case 1:
                            $response['code'] = 1;
                            $response["msg"]  = "Ok";
                            break;
                        case 2:
                            $response['code'] = 0;
                            $response["msg"]  = "La cuenta no existe.";
                            break;
                        case 3:
                            $response['code'] = 0;
                            $response["msg"]  = "Tu cuenta ha sido bloqueada por el administrador.";
                            break;
                    }
                }
                else{
                    $response['code'] = 0;
                    $response["msg"]  = "El usuario no existe. Corrobora tus datos";
                }
                
                
                #print_r($fila);
                #exit;
                $General->closeConexcionDB($conexion);
                return json_encode($response);
            }
        }
        catch(Exception $e){
            echo $e->getMessage();
            die();
        }

    }
    
    public function verifLogueo($email,$psw){
        global $General;
        $conexion = $General->getConexion(MOD_AMBIENT);
        $sql_validEmailRegis = "SELECT * FROM users WHERE username ='".$email."'";
        $resultado = mysqli_query($conexion,$sql_validEmailRegis);

        try{
            if (!$resultado) {
                throw new Exception("Error de BD, no se pudo consultar la base de datos");
                return false;
            }
            else{
                $fila = array();
                $fila =mysqli_fetch_array($resultado, MYSQLI_ASSOC);
                if(count($fila) > 0){
                    if($fila['password'] == $General->MakeHashPasw($psw)){
                        #Inicio de sesion correcto
                        $token_user = $General->MakeTokenUSerSesion();
                        $update = " UPDATE users  SET  token_user = '".$token_user."'   WHERE id_users= ".$fila["id_users"].";";
                        mysqli_query($conexion, $update);
                        
                        #Formo la SESION
                        $_SESSION["UserAuth"]["idUser"]     = $fila["id_users"];
                        $_SESSION["UserAuth"]["token_user"] = $token_user;
                        $_SESSION["UserAuth"]["UserRolId"]  = $fila["id_rol_user"];
                        $_SESSION["User"]["name"]           = $fila["name"];
                        $_SESSION["User"]["first_name"]     = $fila["first_name"];
                        
                        $response['code'] = 1;
                        $response["msg"]  = "Ok";
                        
                    }
                    else{
                        $response['code'] = 0;
                        $response["msg"]  = "Contraseña incorrecta";
                    }
                }
                else{
                    $response['code'] = 0;
                    $response["msg"]  = "El usuario no existe. Corrobora tus datos";
                }
                
                
                #print_r($fila);
                #exit;
                $General->closeConexcionDB($conexion);
                return json_encode($response);
            }
        }
        catch(Exception $e){
            echo $e->getMessage();
            die();
        }

    }
    
    
    
    
    /*public function getLayoutRender(){
        $sql_getLayoutRender = "SELECT id_users, token_user FROM users WHERE id_users =".$_SESSION['UserAuth']["idUser"]." AND token_user =".$_SESSION['UserAuth']["token_user"];
        $resultado = mysqli_query(CONEXION,$sql_validSessionNow);

        try{
            if (!$resultado) {
                throw new Exception("Error de BD, no se pudo consultar la base de datos");
                return false;
            }
            else{
                return true;
            }
        }
        catch(Exception $e){
            echo $e->getMessage();
            die();
        }

    }*/
    
    public function getInfoSession(){
        try{
            if(isset($_SESSION["UserAuth"]) && !empty($_SESSION["UserAuth"])){
                return $_SESSION["UserAuth"];
            }
        } catch (Exception $ex) {
            return null;
        }
        
    }
     
     
 }

