<?php
require_once("../Config/Conexion.php");
class PerfilUsuarioModel {
    public function TraerInformacion(int $id){
        $return = array();
        $db=Conectar::conexion();
        $sql = "SELECT us.nombre, us.telefono, us.descripcion as udescripcion, us.ruta_imagen, us.correo, ci.descripcion as cdescripcion  FROM  usuarios us  INNER JOIN ciudad ci ON us.idCiudad = ci.id where us.id=".$id;
        $resultadoTotal = $db->query($sql);
        $data = $resultadoTotal->fetch_assoc();
        /*
        while ($row = $resultadoTotal->fetch_array()) {
            $data["datos"] = $row;
        }*/
        
        return $data;
    }

    public function Actualizar(int $id,string $nombre,string $nombre_imagen,string $nombre_hoja_vida,string $ruta_imagen,string $ruta_hoja_vida,string $descripcion, string $telefono,$idCiudad){
        $db=Conectar::conexion();
       
        $sql = "UPDATE `usuarios` SET telefono ='" . $telefono . "',nombre ='" . $nombre . "',nombre_imagen='" . $nombre_imagen . "',nombre_hoja_vida='" . $nombre_hoja_vida . "',url_hoja_vida='". $ruta_hoja_vida . "',ruta_imagen='". $ruta_imagen . "',descripcion='". $descripcion . "'"
        . ",idCiudad='". $idCiudad . "' WHERE id = " . $id ;
        $db->query($sql);
        $return['mensaje'] ="Transacción realizada con éxito";
        $return["status"] = 'success';
        return  $return;
    }

    public function MostrarArquitecto($id){
        $return = array();
        $db=Conectar::conexion();
        $sql = "SELECT usuarios.url_hoja_vida as curriculum, IFNULL(ci.descripcion,'') as 'ciudad', usuarios.id as id, `nombre`, `correo`, `telefono`, `ruta_imagen`,`nombre_imagen`, usuarios.descripcion as descripcion FROM `usuarios`  LEFT JOIN ciudad ci ON usuarios.idCiudad = ci.id WHERE usuarios.estado = 1 AND usuarios.id =".$id;
        $resultadoTotal = $db->query($sql);
        $i = 0;
        
        while ($row = mysqli_fetch_array($resultadoTotal)) {
            $data["datos"][$i] = $row;
            $i++;
        }
        return $data;
    }

}

