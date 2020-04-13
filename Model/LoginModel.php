<?php
require_once("../Config/Conexion.php");

class LoginModel {

    public function Registrar(string $nombre,string $email,string $pass,$token) {
     
        $path = '/rascanubes';
        $protocol = isset($_SERVER["HTTPS"]) ? 'https' : 'http';
        $default = $protocol."://".$_SERVER['HTTP_HOST'].$path.'/img/usuarios/default.png';
        $return = array();
        try {
            $db=Conectar::conexion();
            $resultadoTotal = "select  id from usuarios where correo ='" . $email . "'";
            $consulta= $db->query($resultadoTotal);
            $data = $consulta->fetch_assoc();
           
            $id = $data["id"];
            $id = $id * 1;
           
            if ($id != 0) {
                $return['mensaje']="El usuario ya existe";
                $return["id"]=-1;
                $return["status"] = 'warning';
                $return["flag"] = '0';
                $return["token"] = $token;
                return $return ;
            } else {
                $db->query("BEGIN");
                //creacion de usuario
                $sql = "INSERT INTO usuarios(`nombre`,`correo`,`password`, `ruta_imagen`,`estado`) VALUES ('" . $nombre."','".$email."','".$pass."','".$default."',2)";

                $result1 = $db->query($sql);
               
                if (!$result1) {
                    $return['id'] = 0;
                    $return['mensaje'] ="Hubo un error inesperado, intentelo de nuevo";
                    $return["status"] = 'error';
                    $return["flag"] = '0';
                    $return["token"] = $token;
                    return $return;
                    //Alguna o las dos consultas han fallado, y le indicamos al motor de la base de datos que restablezca la base de datos tal y como estaba antes de iniciar la transacción
                    $db->query("ROLLBACK");
                } else {
                    //Las dos consultas se han realizado correctamente, y le indicamos al motor de la base de datos que puede grabar los datos     
                    $db->query("COMMIT");
                }
                
            }
        } catch (Exception $e) {
            $return['id'] = 0;
            $return['mensaje'] =$e->getMessage() ;
            $return["status"] = 'error';
            $return["flag"] = '0';
            $return["token"] = $token;
            return $return;
        }
     
        $return['id'] = $db->insert_id;
        $return['mensaje'] ="Transacción realizada con éxito";
        $return["status"] = 'success';
        return  $return;
    }

    public function Actualizar($usuario, $pass,$token) {
        $return = array();
        $db=Conectar::conexion();
        try{
            $sqlCount = "select count(id) as total  from usuarios  where  correo = '" . $usuario . "'";
            $resultadoTotal = $db->query($sqlCount);
            if ($resultadoTotal) {
               $sql = "UPDATE  usuarios SET  `password`= '".$pass."',`cambioContrasena` = 1  where  correo = '" . $usuario . "'";
                $db->query($sql);
                $return['mensaje'] ="Transacción realizada con éxito";
                $return["status"] = 'success';
            }else{
                $return['mensaje'] ="Correo no registrado";
                $return["status"] = 'error';
                $return["flag"] = '0';
                $return["token"] = $token;
            }
            
        }catch(Exception $ex){
            $return['mensaje'] ="Ha ocurrido un error.";
            $return["status"] = 'error';
            $return["flag"] = '0';
            $return["token"] = $token;
        }
        
        return  $return;
        
        //var_dump($data);
    }

    public function Cambio($id, $pass,$token) {
        $return = array();
        $db=Conectar::conexion();
        try{
               $sql = "UPDATE  usuarios SET  `password`= '".$pass."',`cambioContrasena` = 0  where  id = " . $id ;
                $db->query($sql);
                $return['mensaje'] ="Transacción realizada con éxito";
                $return["status"] = 'success';
                $_SESSION['cambio'] = 0;

        }catch(Exception $ex){
            $return['mensaje'] ="Ha ocurrido un error.";
            $return["status"] = 'error';
            $return["flag"] = '0';
            $return["token"] = $token;
        }
        
        return  $return;
        
        //var_dump($data);
    }

    public function login($usuario, $pass,$token) {
        $return = array();
        $db=Conectar::conexion();
        $sqlCount = "select count(id) as total  from usuarios  where  correo = '" . $usuario . "'";
        $resultadoTotal = $db->query($sqlCount);
        if (!$resultadoTotal) {
            $return['mensaje'] ="Hubo un error inesperado, intentelo de nuevo";
            $return["status"] = 'error';
            return $return;
        }
        $sql = "SELECT id, nombre, correo,estado, password,fechaCreacion, cambioContrasena FROM  usuarios  where  correo = '" . $usuario . "'";
        $resultadoTotal = $db->query($sql);
        $data["datos"] = array();
        while ($row = $resultadoTotal->fetch_array()) {
            $data["datos"][] = $row;
        }
        if (count($data["datos"]) != 0) {
            $isPasswordCorrect = password_verify($pass,$data['datos'][0]['password'] );
            if($isPasswordCorrect){
                loginModel::session($data);
                $return["status"] = 'ok';
                return $return;
            }
            else{
                $return['mensaje'] ="Correo electrònico y/o contraseña no coinciden.";
                $return["status"] = 'warnning';
                $return["flag"] = '0';
                $return["token"] = $token;
                return $return;
            }
        }else{
            $return['mensaje'] ="Correo electrònico y/o contraseña no coinciden.";
            $return["status"] = 'warnning';
            $return["flag"] = '0';
            $return["token"] = $token;
            return $return;
        }
        
        //var_dump($data);
    }

    public function session($data) {
        $_SESSION['id']=$data['datos'][0]['id'];
        $_SESSION['nombre']=$data['datos'][0]['nombre'];
        $_SESSION['correo']=$data['datos'][0]['correo'];
		$_SESSION['estado']=$data['datos'][0]['estado'];
        $_SESSION['cambio']=$data['datos'][0]['cambioContrasena'];
    }

    public function Cerrar() {
        // session_start();
        session_unset();
        session_destroy();
        $return["status"] = 'success';
        $return["confirmar"] = "1";
        return $return;
    }


public function loginGmail(string $nombre,string $email,string $imagen) {
     
    $path = '/rascanubes';
    $protocol = isset($_SERVER["HTTPS"]) ? 'https' : 'http';
    $default = $protocol."://".$_SERVER['HTTP_HOST'].$path.'/img/usuarios/default.png';
    $return = array();
    try {
        $db=Conectar::conexion();
        $resultadoTotal = "select  id from usuarios where correo ='" . $email . "'";
        $consulta= $db->query($resultadoTotal);
        $data = $consulta->fetch_assoc();
        
        $id = $data["id"];
        $id = $id * 1;
       
        if ($id != 0) {
            $aux["datos"] = array();
            $aux['datos'][0]['nombre']= $nombre;
            $aux['datos'][0]['correo']= $email;
            $aux['datos'][0]['id']= $id;
            loginModel::session($aux);
            $return["status"] = 'ok';
            return $return;
        } else {
            $db->query("BEGIN");
            //creacion de usuario
            $sql = "INSERT INTO usuarios(`nombre`,`correo`, `ruta_imagen`,`estado`) VALUES ('" . $nombre."','".$email."','".$imagen."',2)";

            $result1 = $db->query($sql);
           
            if (!$result1) {
                $return['id'] = 0;
                $return['mensaje'] ="Hubo un error inesperado, intentelo de nuevo";
                $return["status"] = 'error';
                return $return;
                //Alguna o las dos consultas han fallado, y le indicamos al motor de la base de datos que restablezca la base de datos tal y como estaba antes de iniciar la transacción
                $db->query("ROLLBACK");
            } else {
                //Las dos consultas se han realizado correctamente, y le indicamos al motor de la base de datos que puede grabar los datos     
                $db->query("COMMIT");
            }
            
        }
    } catch (Exception $e) {
        $return['id'] = 0;
        $return['mensaje'] =$e->getMessage() ;
        $return["status"] = 'error';
        return $return;
    }
 
    $return['id'] = $db->insert_id;
    $return['mensaje'] ="Transacción realizada con éxito";
    $return["status"] = 'success';
    return  $return;
}
}