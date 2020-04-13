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

require_once(dirname(__FILE__) . "/../Model/GaleriaModel.php");
switch ($post['tipo']) {
        case "upload" :
            Upload($post);
            break;
        case "CrearGaleria":
        CrearGaleria($post);
        break;
        case "Listar":
        Listar($post);
        break;
        case "DetalleGaleria":
        DetalleGaleria($post);
        break;
        case "FotosGaleria":
        FotosGaleria($post);
        break;
        case "EditarGaleria":
        EditarGaleria($post);
        break;
        case "ListarGaleriasIndex":
        ListarGaleriasIndex($post);
        break;
        case "ListarGalerias":
            ListarGalerias($post);
            break;
        case "EliminarGaleria":
            EliminarGaleria($post);
            break;
    default: echo('Error, no existe el dato "TIPO" en el objeto POST');
        break;
}

function EliminarGaleria($post){
    $data = GaleriaModel::EliminarGaleria($post['id'],$post['estado']);
        echo json_encode($data);
}

function ListarGaleriasIndex($post){
    $data = GaleriaModel::ListarGaleriasIndex();
        echo json_encode($data);
}

function ListarGalerias($post){
    $data = GaleriaModel::ListarGalerias();
        echo json_encode($data);
}

function EditarGaleria($post){

    $ruta = dirname(__FILE__) .'/../uploads/galeria/'.$post['id'].'/'.$post['nombre'];

       $tamano = count($post["fotos"]);
       $i = 0;
       foreach ($post["fotos"] as $valor) {
           if($valor['New'] ==1){
            copy(dirname(__FILE__) .'/../Upload/Temp/'.$valor['Name'],$ruta.'/'.$valor['Name']);
           }
        $path = '';
        $protocol = isset($_SERVER["HTTPS"]) ? 'https' : 'http';
        $fotos[$i]['ruta'] = $protocol."://".$_SERVER['HTTP_HOST'].'/uploads/galeria/' .$post['id'].'/'.$post['nombre'].'/'.$valor['Name'];
        $fotos[$i]['nombre'] = $valor['Name'];
        $i++;
        }
        $data = GaleriaModel::EditarGaleria($post['id_galeria'],$post['descripcion'],$fotos);
        echo json_encode($data);
}




function FotosGaleria($post){
    $data = GaleriaModel::FotosGaleria($post['id']);
        echo json_encode($data);
}

function DetalleGaleria($post){
    $data = GaleriaModel::DetalleGaleria($post['id']);
        echo json_encode($data);
}

function TraerInformacion($post){
    $data = GaleriaModel::TraerInformacion($post['id']);
        echo json_encode($data);
}

function Listar($post){
    $data = GaleriaModel::Listar($post['id']);
        echo json_encode($data);
}

function CrearGaleria($post){

    $ruta = dirname(__FILE__) .'/../uploads/galeria/'.$post['id'].'/'.$post['nombre'];
    if(is_dir($ruta) == false){
        mkdir($ruta, 0777, true);
    }

       $tamano = count($post["fotos"]);
       $i = 0;
       foreach ($post["fotos"] as $valor) {
        copy(dirname(__FILE__) .'/../Upload/Temp/'.$valor['Name'],$ruta.'/'.$valor['Name']);
        $path = '';
        $protocol = isset($_SERVER["HTTPS"]) ? 'https' : 'http';
        $fotos[$i]['ruta'] = $protocol."://".$_SERVER['HTTP_HOST'].'/uploads/galeria/' .$post['id'].'/'.$post['nombre'].'/'.$valor['Name'];
        $fotos[$i]['nombre'] = $valor['Name'];
        $i++;
        }
        $data = GaleriaModel::Registrar($post['id'],$post['nombre'],$post['descripcion'],$fotos);
        echo json_encode($data);
}


function Upload($post){
    move_uploaded_file($_FILES  ['file']['tmp_name'], '../Upload/Temp/' . $_FILES['file']['name']);
     $path = '';
    $protocol = isset($_SERVER["HTTPS"]) ? 'https' : 'http';
    $data['Path'] = $protocol."://".$_SERVER['HTTP_HOST'].'/Upload/Temp/' . $_FILES['file']['name'];
    $data['Name'] = $_FILES['file']['name'];
    $data['status'] = 200;
    $data['state'] = true;
    $data['data'] = $data;
    echo json_encode($data); 
}