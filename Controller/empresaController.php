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

require_once(dirname(__FILE__) . "/../Model/empresaModel.php");
switch ($post['tipo']) {
    case "Listar" :
        Listar($post);
        break;
    case "Actualizar" :
        Actualizar($post);
        break;
    case "upload" :
        Upload($post);
        break;
    default: echo('Error, no existe el dato "TIPO" en el objeto POST');
        break;
}

function Listar($post){
    $id = $post['id'];
    $data = empresaModel::Listar($id);
    echo json_encode($data);
}

function Actualizar($post){
    $id = $post["id"];
    $nombre= $post["nombre"];
    $telefono = $post["telefono"];
    $correo= $post["correo"];
    $ciudad= $post["ciudad"];
    $direccion= $post["direccion"];
    $descripcion = $post["descripcion"];
    $instagram = $post["instagram"];
    $facebook= $post["facebook"];
    $twitter= $post["twitter"];
    $whatsapp= $post["whatsapp"];
    $ruta_imagen = $post["foto"];

    if($post['cambio_img'] ==1){
        $formato = explode(".",$post['nombre_imagen']);
        $ruta = dirname(__FILE__) .'/../Upload/imagen_perfil/'.$post['id'].'.'.$formato[1];
        copy(dirname(__FILE__) .'/../Upload/Temp/'.$post['nombre_imagen'],$ruta);
        $path = '/beerproject';
        $protocol = isset($_SERVER["HTTPS"]) ? 'https' : 'http';
        $ruta_imagen = $protocol."://".$_SERVER['HTTP_HOST'].$path.'/Upload/imagen_perfil/' .$post['id'].'.'.$formato[1];
        $nombre_imagen =$post['id'].'.'.$formato[1];
    }

    $data = empresaModel::Actualizar($id,$nombre,$telefono,$correo,$ciudad,$direccion,$descripcion,
    $instagram,$facebook,$twitter,$whatsapp,$ruta_imagen);
    echo json_encode($data);
}

function Upload($post){
    move_uploaded_file($_FILES['file']['tmp_name'], '../Upload/Temp/' . $_FILES['file']['name']);
     $path = '/beerproject';
    $protocol = isset($_SERVER["HTTPS"]) ? 'https' : 'http';
    $data['Path'] = $protocol."://".$_SERVER['HTTP_HOST'].$path.'/Upload/Temp/' . $_FILES['file']['name'];
    $data['Name'] = $_FILES['file']['name'];
    $data['status'] = 200;
    $data['state'] = true;
    $data['data'] = $data;
    echo json_encode($data); 
}

 