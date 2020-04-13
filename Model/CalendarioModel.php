<?php


class CalendarioModel {
    
    public function ConsultarFechaActual(){
        require_once("../config/db.php");
        require_once("../config/Conexion.php");        
        include("../funciones.php");    
        
        $query=mysqli_query($con, "SELECT DATE_FORMAT(NOW(), '%d/%m/%Y') AS Fecha");
        $data=mysqli_fetch_array($query);
        /*
        while ($row = $resultadoTotal->fetch_array()) {
            $data["datos"] = $row;
        }*/
        return $data;
    }
}

