<?php

include_once("lib/general/cGeneral.php");
include_once("Model/UserAuth.php");
class AdminController extends cGeneral{

    public function index(){
        global $General;
        global $UserAuth;
        if($UserAuth->isLogged() == true){
            #Hay datos por verificar
            $General->getLayoutRender(LAYOUT_RENDER);
        }
        else {
            define(LAYOUT_RENDER, "_public");
            $this->redirect("general", "login");
            
        }
    }
    
    
//    public function dashboard(){
//        if(UserAuth::isLogged() == true){
//            
//            define(LAYOUT_RENDER, "_admin");
//        }
//        else {
//            define(LAYOUT_RENDER, "_public");
//            $this->redirect("general", "login");
//            
//        }
//    }
}
?>


