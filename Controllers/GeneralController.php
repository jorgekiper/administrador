<?php

include_once("lib/general/cGeneral.php");
include_once("Model/UserAuth.php");
class GeneralController extends cGeneral{
    
    public $cGeneral;

    function __construct(){
        $General = new cGeneral();
        #$this->$General = $this;
    }

    public function login(){
        if(($this->postRequest()) && !empty($this->postRequest())){
            #Hay datos por verificar
            $data = $this->postRequest();
            
            $_response = UserAuth::validEmailRegis($data["email"]);
            $response = json_decode($_response,true);
            
            if($response["code"] == 1){
                $_response = UserAuth::verifLogueo($data["email"], $data["psw"]);
                $response = json_decode($_response,true);
                
                if($response['code'] == 1){
                    #Inicio de Sesion correcto
                    $this->redirect("admin", "index");
                }
            }
            else{
                return $response["msg"];
            }
            
        }
        else {
            $this->getLayoutRender("_public");
            #Solo se muestra la vista
        }
    }
    
    public function error_404(){
            $this->getLayoutRender("_public");
    }
    
    public function logout(){
        session_start();

        $_SESSION = array();
        session_destroy();
        $this->redirect("", "");
    }
    
}
?>
