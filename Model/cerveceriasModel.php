<?php
require_once("../Config/Conexion.php");

class cerveceriasModel {

    public function Listar(){
        $return = array();
        $db=Conectar::conexion();
        $sql = "SELECT id,ruta_foto FROM  usuarios";
        $resultadoTotal = $db->query($sql);
        $i = 0;
        
        while ($row = mysqli_fetch_array($resultadoTotal)) {
            $data["datos"][$i] = $row;
            $i++;
        }
        return $data;
    }
}

