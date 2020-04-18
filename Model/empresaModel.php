<?php
require_once("../Config/Conexion.php");

class empresaModel {

   function Listar($id){
    $return = array();
    $db=Conectar::conexion();
    $sql = "SELECT nombre,telefono,ciudad,correo,direccion,descripcion,instagram,facebook,twitter,whatsapp,ruta_foto
      FROM  usuarios where id=".$id;
    $resultadoTotal = $db->query($sql);
    $data = $resultadoTotal->fetch_assoc();
    /*
    while ($row = $resultadoTotal->fetch_array()) {
        $data["datos"] = $row;
    }*/
    
    return $data;
   }

   function Actualizar($id,$nombre,$telefono,$correo,$ciudad,$direccion,$descripcion,
   $instagram,$facebook,$twitter,$whatsapp,$ruta_imagen){
    $db=Conectar::conexion();
    $sql = "UPDATE usuarios SET `nombre`='".$nombre."',
    `telefono`='".$telefono."',`ciudad`='".$ciudad."',`correo`='".$correo."',`direccion`='".$direccion."',
    `descripcion`='".$descripcion."',`instagram`='".$instagram."',`facebook`='".$facebook."',`twitter`='".$twitter."',
    `whatsapp`='".$whatsapp."',`ruta_foto`='".$ruta_imagen."' WHERE id=".$id ;
    $db->query($sql);
    $return['mensaje'] ="Transacción realizada con éxito";
    $return["status"] = 'ok';
    return  $return;


   }
}