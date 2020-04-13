<?php
require_once("../Config/Conexion.php");
class GaleriaModel {

    public function FotosGaleria(int $perfil){
        $return = array();
        $db=Conectar::conexion();
        $sql = "SELECT * FROM `imagenes_galaeria` WHERE idGaleria=".$perfil;
        $resultadoTotal = $db->query($sql);
        $i = 0;
        while ($row = mysqli_fetch_array($resultadoTotal)) {
            $data["datos"][$i] = $row;
            $i++;
        }
        
        return $data;
    }

 

    public function Listar(int $perfil){
        $return = array();
        $db=Conectar::conexion();
        $sql = "SELECT a.id,c.ruta,a.descripcion,a.fechaCreacion,a.nombre FROM galerias a INNER JOIN imagenes_galaeria c ON a.id = c.idGaleria INNER JOIN ( SELECT DISTINCT id , Min(fechaCreacion) maxDate FROM imagenes_galaeria GROUP BY idGaleria ) b ON c.id = b.id AND c.fechaCreacion = b.maxDate WHERE a.estado=1 AND a.idUsuario =".$perfil." ORDER BY a.id";
        $resultadoTotal = $db->query($sql);
        $i = 0;
        while ($row = mysqli_fetch_array($resultadoTotal)) {
            $data["datos"][$i] = $row;
            $i++;
        }
        
        return $data;
    }


    public function Registrar(int $perfil,string $nombre,string $descripcion,$fotos) {
        
        
        try {
            $db=Conectar::conexion();
                $db->query("BEGIN");
                //creacion de usuario
                $sql = "INSERT INTO `galerias`(`descripcion`, `nombre`, `idUsuario`, `estado`) VALUES ('" . $descripcion."','".$nombre."',".$perfil.",2)";
                $result1 = $db->query($sql);
                if (!$result1) {
                    $return['id'] = 0;
                    $return['mensaje'] ="Hubo un error inesperado, intentelo de nuevo";
                    $return["status"] = 'error';
                    return $return;
                    //Alguna o las dos consultas han fallado, y le indicamos al motor de la base de datos que restablezca la base de datos tal y como estaba antes de iniciar la transacción
                    $db->query("ROLLBACK");
                } else {
                    $id = $db->insert_id;
                    foreach($fotos as $valor){
                        $sql = "INSERT INTO `imagenes_galaeria`(`nombre`, `ruta`, `idGaleria`) VALUES  ('".$valor['nombre']."','".$valor['ruta']."',".$id.")";
                        $result2 = $db->query($sql);
                        if (!$result2) {
                            $return['id'] = 0;
                            $return['mensaje'] ="Hubo un error inesperado, intentelo de nuevo";
                            $return["status"] = 'error';
                            $db->query("ROLLBACK");
                            return $return;
                            break;
                        }
                    }
                    $db->query("COMMIT");
                }
        } catch (Exception $e) {
            $db->query("ROLLBACK");
            $return['id'] = 0;
            $return['mensaje'] =$e->getMessage() ;
            $return["status"] = 'error';
            return $return;
        }
        $return['mensaje'] ="Transacción realizada con éxito";
        $return["status"] = 'success';
        return  $return;
    }


    public function DetalleGaleria(int $perfil){
        $return = array();
        $db=Conectar::conexion();
        $sql = "SELECT * FROM galerias where id= ".$perfil;
        $resultadoTotal = $db->query($sql);
        $data = $resultadoTotal->fetch_assoc();
        /*
        while ($row = $resultadoTotal->fetch_array()) {
            $data["datos"] = $row;
        }*/
        return $data;
    }


    public function EditarGaleria(int $id_galeria,string $descripcion,$fotos) {   
        try {
            $db=Conectar::conexion();
                $db->query("BEGIN");
                //creacion de usuario
                $sql = "UPDATE galerias SET descripcion='".$descripcion."' WHERE id=".$id_galeria.";";
                $result1 = $db->query($sql);
                if (!$result1) {
                    $return['mensaje'] ="Hubo un error inesperado, intentelo de nuevo 1";
                    $return["status"] = 'error';
                    return $return;
                    //Alguna o las dos consultas han fallado, y le indicamos al motor de la base de datos que restablezca la base de datos tal y como estaba antes de iniciar la transacción
                    $db->query("ROLLBACK");
                } else {
                    $sql = "DELETE FROM `imagenes_galaeria` WHERE  idGaleria=".$id_galeria.";";
                $result1 = $db->query($sql);
                if (!$result1) {
                    $return['mensaje'] ="Hubo un error inesperado, intentelo de nuevo 2";
                    $return["status"] = 'error';
                    return $return;
                    //Alguna o las dos consultas han fallado, y le indicamos al motor de la base de datos que restablezca la base de datos tal y como estaba antes de iniciar la transacción
                    $db->query("ROLLBACK");
                }       
                    $id = $id_galeria;
                    foreach($fotos as $valor){
                        $sql = "INSERT INTO `imagenes_galaeria`(`nombre`, `ruta`, `idGaleria`, `estado`) VALUES  ('".$valor['nombre']."','".$valor['ruta']."',".$id.",2);";
                        $result2 = $db->query($sql);
                        if (!$result2) {
                            $return['mensaje'] ="Hubo un error inesperado, intentelo de nuevo 3";
                            $return["status"] = 'error';
                            $db->query("ROLLBACK");
                            return $return;
                            break;
                        }
                    }
                    $db->query("COMMIT");
                }
        } catch (Exception $e) {
            $db->query("ROLLBACK");
            $return['id'] = 0;
            $return['mensaje'] =$e->getMessage() ;
            $return["status"] = 'error';
            return $return;
        }
        $return['mensaje'] ="Transacción realizada con éxito";
        $return["status"] = 'success';
        return  $return;
    }

    public function ListarGaleriasIndex(){
        $return = array();
        $db=Conectar::conexion();
        $sql = "SELECT a.id,c.ruta,a.descripcion,a.fechaCreacion,a.nombre,a.Categoria, c.muestra_Home FROM galerias_servicios a INNER JOIN imagenes_nube_servicios_interiores_jardines c ON a.id = c.id_galerias_servicios WHERE a.estado=1 && c.muestra_Home = 1  ORDER BY RAND();";
        $resultadoTotal = $db->query($sql);
        $i = 0;
        while ($row = mysqli_fetch_array($resultadoTotal)) {
            $data["datos"][$i] = $row;
            $i++;
        }
        
        return $data;
    }

    public function ListarGalerias(){
        $return = array();
        $db=Conectar::conexion();
        $sql = "SELECT a.id,c.ruta,a.descripcion,a.fechaCreacion,a.nombre FROM galerias a INNER JOIN imagenes_galaeria c ON a.id = c.idGaleria INNER JOIN ( SELECT DISTINCT id , Min(fechaCreacion) maxDate FROM imagenes_galaeria GROUP BY idGaleria ) b ON c.id = b.id AND c.fechaCreacion = b.maxDate WHERE a.estado=1  ORDER BY RAND();";
        $resultadoTotal = $db->query($sql);
        $i = 0;
        while ($row = mysqli_fetch_array($resultadoTotal)) {
            $data["datos"][$i] = $row;
            $i++;
        }
        
        return $data;
    }

    public function EliminarGaleria(int $id_galeria,int $estado) {   
        try {
            $db=Conectar::conexion();
                $db->query("BEGIN");
                //creacion de usuario
                echo $id_galeria;
                $sql = "UPDATE galerias SET estado=".$estado." WHERE id=".$id_galeria.";";
                $result1 = $db->query($sql);
                if (!$result1) {
                    $return['mensaje'] ="Hubo un error inesperado, intentelo de nuevo 1";
                    $return["status"] = 'error';
                    return $return;
                    //Alguna o las dos consultas han fallado, y le indicamos al motor de la base de datos que restablezca la base de datos tal y como estaba antes de iniciar la transacción
                    $db->query("ROLLBACK");
                } 
                    $db->query("COMMIT");
               
        } catch (Exception $e) {
            $db->query("ROLLBACK");
            $return['id'] = 0;
            $return['mensaje'] =$e->getMessage() ;
            $return["status"] = 'error';
            return $return;
        }
        $return['mensaje'] ="Transacción realizada con éxito";
        $return["status"] = 'success';
        return  $return;
    }
}


