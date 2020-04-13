<?php
session_start();
header("Content-Type: text/html;charset=utf-8");
ob_start();

if (!isset($_POST)) {
    die('Error, no exite el objeto POST.');
}
$post = $_POST;

if (!isset($post["tipo"])) {
    die('Error, no existe el dato "TIPO" el objeto POST.');
}

require_once(dirname(__FILE__) . "/../Model/PerfilUsuarioModel.php");
switch ($post['tipo']) {
    case "TraerInformacion" :
        TraerInformacion($post);
        break;
        case "upload" :
            Upload($post);
            break;
        case "ActualizarInformacion":
            Actualizar($post);
            break;
        case "MostrarArquitecto":
            MostrarArquitecto($post);
        break;
        case "TraerProfesionalesDirServicio":
            TraerProfesionalesDirServicio();
        break;
    default: echo('Error, no existe el dato "TIPO" en el objeto POST');
        break;
}

function TraerProfesionalesDirServicio(){}


function MostrarArquitecto($post) {
    $id = $post['id'];
    $data = PerfilUsuarioModel::MostrarArquitecto($id);
    echo json_encode($data);
}



function TraerInformacion($post) {
    $id = $post['id'];
    $data = PerfilUsuarioModel::TraerInformacion($id);
    echo json_encode($data);
}

function Upload($post){
    move_uploaded_file($_FILES['file']['tmp_name'], '../Upload/Temp/' . $_FILES['file']['name']);
     $path = '';
    $protocol = isset($_SERVER["HTTPS"]) ? 'https' : 'http';
    $data['Path'] = $protocol."://".$_SERVER['HTTP_HOST'].'/Upload/Temp/' . $_FILES['file']['name'];
    $data['Name'] = $_FILES['file']['name'];
    $data['status'] = 200;
    $data['state'] = true;
    $data['data'] = $data;
    echo json_encode($data); 
}

function   Actualizar($post){
    $telefono = $post['telefono'];
    $descripcion =$post['descripcion'];
    $ruta_hoja_vida =$post['hoja_vida'];
    $ruta_imagen = $post['foto'];
    $nombre_hoja_vida = $post['nombre_hoja_vida'];
    $nombre_imagen =  $post['nombre_imagen'];
    $nombre = $post['nombre'];
    $id =$post['id'];
    $id_ciudad = $post['idCiudad'];
    //HOJA DE VIDA
    if($post['cambio_hoja'] ==1){
        $path = '';
        $ruta = dirname(__FILE__) .'/../uploads/hoja_de_vida/'.$post['id'].'.pdf';
        copy(dirname(__FILE__) .'/../Upload/Temp/'.$post['nombre_hoja_vida'],$ruta);
        $protocol = isset($_SERVER["HTTPS"]) ? 'https' : 'http';
        $ruta_hoja_vida = $protocol."://".$_SERVER['HTTP_HOST'].'/uploads/hoja_de_vida/' .$post['id'].'.pdf';    
        $nombre_hoja_vida =$post['id'].'.pdf';  
    }
   
    //FOTO DE PERFIL
    if($post['cambio_img'] ==1){
        $formato = explode(".",$post['nombre_imagen']);
        $ruta = dirname(__FILE__) .'/../uploads/imagen_perfil/'.$post['id'].'.'.$formato[1];
        copy(dirname(__FILE__) .'/../Upload/Temp/'.$post['nombre_imagen'],$ruta);
        $path = '';
        $protocol = isset($_SERVER["HTTPS"]) ? 'https' : 'http';
        $ruta_imagen = $protocol."://".$_SERVER['HTTP_HOST'].'/uploads/imagen_perfil/' .$post['id'].'.'.$formato[1];
        $nombre_imagen =$post['id'].'.'.$formato[1];
    }

    $data = PerfilUsuarioModel::Actualizar($id, $nombre,$nombre_imagen,$nombre_hoja_vida,$ruta_imagen,$ruta_hoja_vida,$descripcion,$telefono,$id_ciudad);
    echo json_encode($data);
}