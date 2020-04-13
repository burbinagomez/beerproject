<?php
require_once("../Config/Conexion.php");
class ProfesionalesModel {

    public function ListarProfesionalesIndex(){
        $return = array();
        $db=Conectar::conexion();
        $sql = "SELECT * FROM usuarios WHERE estado = 1 ORDER BY RAND() LIMIT 4;";
        $resultadoTotal = $db->query($sql);
        $i = 0;
        
        while ($row = mysqli_fetch_array($resultadoTotal)) {
            $data["datos"][$i] = $row;
            $i++;
        }
        return $data;
    }
    
    public function ListarProfesionales(){
        $return = array();
        $db=Conectar::conexion();
        $sql = "SELECT IFNULL(ci.descripcion,'') as 'ciudad', usuarios.id as id, `nombre`, `correo`, `telefono`, `ruta_imagen`,`nombre_imagen`, usuarios.descripcion as descripcion FROM `usuarios`  LEFT JOIN ciudad ci ON usuarios.idCiudad = ci.id WHERE usuarios.estado = 1 ORDER BY RAND()";
        $resultadoTotal = $db->query($sql);
        $i = 0;
        
        while ($row = mysqli_fetch_array($resultadoTotal)) {
            $data["datos"][$i] = $row;
            $i++;
        }
        return $data;
    }

    public function ListarProfesionalesBuscar($searched){
        $data = array();
        $db=Conectar::conexion();
        $sql = "SELECT `id`, `nombre`, `correo`, `ruta_imagen`, `descripcion`,`telefono` FROM `usuarios` WHERE nombre like '%".$searched."%' AND usuarios.estado = 1 ORDER BY RAND()";
        $resultadoTotal = $db->query($sql);
        $i = 0;
        
        while ($row = mysqli_fetch_array($resultadoTotal)) {
            $data["datos"][$i] = $row;
            $i++;
        }
        return $data;
    }


    public function ListarProfesinalesPorServicio($idServicio){
        $data = array();
        $db=Conectar::conexion();
        $sql = "SELECT DISTINCT us.id AS id, us.nombre, us.ruta_imagen, us.descripcion from usuarios us INNER JOIN galerias ga ON us.id = ga.idUsuario WHERE ga.Categoria = ".$idServicio." AND us.estado = 1 AND ga.estado = 1 ORDER BY RAND() ";
        
        $resultadoTotal = $db->query($sql);
        $i = 0;
        while ($row = mysqli_fetch_array($resultadoTotal)) {
            $data["datos"][$i] = $row;
            $i++;
        }
        
        return $data;
    }

    public function TraerProfesionalesDirServicio($ciudad,$ocupacion,$checked){

         $where = "1 = 1 ";
        if($ciudad !="" && $ciudad != 0  && $ciudad != "0"){
            $where =$where." AND di.Idciudad = ".$ciudad ;
        }

        if($ocupacion !="" && $ocupacion != 0 && $ocupacion != "0" ) {
            $where =$where." AND di.idOcupacion = ".$ocupacion ;
        }
        $orderBy = " ";
        if($checked == "0"){
         $orderBy="ORDER BY RAND()";
        }

        if($checked == "1"){
            $orderBy="ORDER BY di.fechaCreacion DESC";
           }

           if($checked == "2"){
            $orderBy="ORDER BY di.fechaCreacion ASC";
           }

        $data = array();
        $db=Conectar::conexion();
        $sql = "SELECT di.id as id,di.Nombre,di.Foto,concat (ci.descripcion,', ',pa.descripcion) as ciudad,di.descripcion as Descripcion,oc.descripcion as ocupacion
        FROM `directorio_servicios` di
        INNER JOIN ocupacion oc ON di.idOcupacion = oc.id
        inner join ciudad ci ON di.Idciudad = ci.id
        INNER JOIN departamento dep ON ci.iddepartamento = dep.id
        INNER JOIN pais pa ON dep.idPais = pa.id 
        WHERE ".$where." AND di.estado = 1  ".$orderBy." LIMIT 10";
        
        $resultadoTotal = $db->query($sql);
        $i = 0;
        while ($row = mysqli_fetch_array($resultadoTotal)) {
            $data["datos"][$i] = $row;
            $i++;
        }
        
        return $data;
    }


        public function TraerProfesionalesDirServicioBuscar($searched){

        $data = array();
        $db=Conectar::conexion();
        $sql = "SELECT `id`, `Nombre`,`Foto`,`Telefono`,`Correo`, `Descripcion` FROM `directorio_servicios` 
        WHERE Nombre like '%".$searched."%' AND estado = 1";
        
        $resultadoTotal = $db->query($sql);
        $i = 0;
        while ($row = mysqli_fetch_array($resultadoTotal)) {
            $data["datos"][$i] = $row;
            $i++;
        }
        
        return $data;
    }


    public function GaleriasPorDirectorio($id){
        $data = array();
        $db=Conectar::conexion();
        $sql = "SELECT * from imagenes_galerias_servicio where idGaleria_Servicio = ".$id." ORDER BY RAND() LIMIT 3";
        
        $resultadoTotal = $db->query($sql);
        $i = 0;
        while ($row = mysqli_fetch_array($resultadoTotal)) {
            $data["datos"][$i] = $row;
            $i++;
        }
        
        return $data;
    }


    public function Listar_Ciudad(){
        $data = array();
        $db=Conectar::conexion();
        $sql = "SELECT id,descripcion from ciudad where estado = 1 order by descripcion asc";
        $resultadoTotal = $db->query($sql);
        $i = 0;
        while ($row = mysqli_fetch_array($resultadoTotal)) {
            $data["datos"][$i] = $row;
            $i++;
        }
        
        return $data;
    }


    public function List_Ocupacion(){
        $data = array();
        $db=Conectar::conexion();
        $sql = "SELECT id,descripcion from ocupacion where estado = 1 order by descripcion asc";
        $resultadoTotal = $db->query($sql);
        $i = 0;
        while ($row = mysqli_fetch_array($resultadoTotal)) {
            $data["datos"][$i] = $row;
            $i++;
        }
        
        return $data;
    }
    
    
}