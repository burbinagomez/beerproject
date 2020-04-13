<?php
require_once("../Config/Conexion.php");

class HomeModel {

    public function ImagenesHome(){
        $return = array();
        $db=Conectar::conexion();
        $sql = "SELECT a.id,c.ruta,a.descripcion,a.fechaCreacion,a.nombre FROM galerias a INNER JOIN imagenes_galaeria c ON a.id = c.idGaleria INNER JOIN ( SELECT DISTINCT id , Min(fechaCreacion) maxDate FROM imagenes_galaeria GROUP BY idGaleria ) b ON c.id = b.id AND c.fechaCreacion = b.maxDate WHERE a.estado=1   ORDER BY a.id LIMIT 12";
        $resultadoTotal = $db->query($sql);
        $i = 0;
        $data["datos"] = array();
        while ($row = mysqli_fetch_array($resultadoTotal)) {
            $data["datos"][$i] = $row;
            $i++;
        }
        
        return $data;
    }

    public function ImagenesInteriores(){
        $return = array();
        $db=Conectar::conexion();
        $sql = "SELECT a.id,c.ruta,a.descripcion,a.fechaCreacion,a.nombre, c.muestra_Home,a.idservicio FROM galerias_servicios a INNER JOIN imagenes_nube_servicios_interiores_jardines c ON a.id = c.id_galerias_servicios  WHERE a.estado=1 && c.muestra_Home = 1  AND a.idservicio = 2 ORDER BY a.id LIMIT 12";
        $resultadoTotal = $db->query($sql);
        $i = 0;
        $data["datos"] = array();
        while ($row = mysqli_fetch_array($resultadoTotal)) {
            $data["datos"][$i] = $row;
            $i++;
        }
        
        return $data;
    }

    public function ImagenesJardineria(){
        $return = array();
        $db=Conectar::conexion();
        $sql = "SELECT a.id,c.ruta,a.descripcion,a.fechaCreacion,a.nombre, c.muestra_Home,a.idservicio FROM galerias_servicios a INNER JOIN imagenes_nube_servicios_interiores_jardines c ON a.id = c.id_galerias_servicios  WHERE a.estado=1 && c.muestra_Home = 1  AND a.idservicio = 1 ORDER BY a.id LIMIT 12";
        $resultadoTotal = $db->query($sql);
        $i = 0;
        $data["datos"] = array();
        while ($row = mysqli_fetch_array($resultadoTotal)) {
            $data["datos"][$i] = $row;
            $i++;
        }
        
        return $data;
    }
}