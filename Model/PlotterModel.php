<?php
require_once("../Config/Conexion.php");
class PlotterModel {

    public function CoordenadasPlotter($id){

        $condicion="";
        if($id==1 || $id==2){
            $condicion=" AND fer.idtipologia=".$id;
        }
        $return = array();
        $db=Conectar::conexion();
        $sql = "SELECT fer.telefono,fer.longitud as 'longitud',fer.latitud as 'latitud',fer.nombre as 'nombre',fer.correo,fer.direccion,fer.descripcion,fer.foto,tip.icon as 'icono'
        FROM plotterferreteria fer 
        INNER JOIN tipologia tip ON fer.idtipologia = tip.id
        WHERE fer.estado = 1 ".$condicion;
        $resultadoTotal = $db->query($sql);
        $i = 0;
        
        while ($row = mysqli_fetch_array($resultadoTotal)) {
            $data["datos"][$i] = $row;
            $i++;
        }
        return $data;
    }
}