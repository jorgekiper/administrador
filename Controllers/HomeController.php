<?php

include_once("lib/general/cGeneral.php");
class HomeController extends cGeneral{
    

    public function index(){
        global $General;        
        
        $General->getLayoutRender(LAYOUT_RENDER);
        
    }
    
    public function getSlider_fechas(){
        global $General;
        $conexion = $General->getConexion(MOD_AMBIENT);
        
        #Tomo todas las fechas posteriores o igual a hoy
        $sql_validSessionNow = "SELECT * FROM fechas_importantes WHERE status = 1 AND fecha >='".date("Y-m-d")."'";
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

                
                $General->closeConexcionDB($conexion);
                return $get_row;
            }
        }
        catch(Exception $e){
            echo $e->getMessage();
            die();
        }
        
        
    }
    
    public function getNumeralia(){
        global $General;
        $conexion = $General->getConexion(MOD_AMBIENT);
        
        #Tomo todas las fechas posteriores o igual a hoy
        $sql_validSessionNow = "SELECT * FROM numeralia WHERE status = 1";
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
                #print_r($get_row); exit;
                
                $General->closeConexcionDB($conexion);
                return $get_row;
            }
        }
        catch(Exception $e){
            echo $e->getMessage();
            die();
        }
        
        
    }
    

    
}
?>
