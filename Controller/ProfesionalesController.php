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

require_once(dirname(__FILE__) . "/../Model/ProfesionalesModel.php");
switch ($post['tipo']) {
    case "ListarProfesionalesIndex" :
    ListarProfesionalesIndex($post);
        break;
    case "ListarProfesionales" :
        ListarProfesionales($post);
        break;
    case "ListarProfesionalesBuscar" :
        ListarProfesionalesBuscar($post);
        break;
    case "ListarProfesinalesPorServicio":
        ListarProfesinalesPorServicio($post);
        break;
    case "TraerProfesionalesDirServicio":
        TraerProfesionalesDirServicio($post);
    break;
    case "TraerProfesionalesDirServicioBuscar":
        TraerProfesionalesDirServicioBuscar($post);
    break;
    case "GaleriasPorDirectorio":
        GaleriasPorDirectorio($post);
    break;
    case "LIST_CIUDADES":
        ListarCiudades();
    break;
    case "LIST_OCUPACION":
        ListarOcupacion();
    break;
    default: echo('Error, no existe el dato "TIPO" en el objeto POST');
        break;
}

function ListarOcupacion(){
    $data = ProfesionalesModel::List_Ocupacion();
    echo json_encode($data);
    
}

function ListarCiudades(){
    $data = ProfesionalesModel::Listar_Ciudad();
    echo json_encode($data);
}

function GaleriasPorDirectorio($post){
    $data = ProfesionalesModel::GaleriasPorDirectorio($post['id']);
    echo json_encode($data);
}


function TraerProfesionalesDirServicio($post){
    $ciudad = $post['idCiudad'];
    $ocupacion=$post['idOcupacion'];
    $checked = $post['check'];
    $data = ProfesionalesModel::TraerProfesionalesDirServicio($ciudad,$ocupacion,$checked);
    echo json_encode($data);
}

function TraerProfesionalesDirServicioBuscar($post){
    $searched = $post['searched'];
    $data = ProfesionalesModel::TraerProfesionalesDirServicioBuscar($searched);
    echo json_encode($data);
}

function ListarProfesinalesPorServicio($post){
    $data = ProfesionalesModel::ListarProfesinalesPorServicio($post['idServicio']);
    echo json_encode($data);
}

function ListarProfesionalesIndex($post){
    $data = ProfesionalesModel::ListarProfesionalesIndex();
    echo json_encode($data);
}
function ListarProfesionales($post){
    $data = ProfesionalesModel::ListarProfesionales();
    echo json_encode($data);
}

function ListarProfesionalesBuscar($post){
    $data = ProfesionalesModel::ListarProfesionalesBuscar($post['searched']);
    echo json_encode($data);
}
