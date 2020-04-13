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

require_once(dirname(__FILE__) . "/../Model/PlotterModel.php");
switch ($post['tipo']) {
    case "CoordenadasPlotter" :
        CoordenadasPlotter($post);
        break;
    default: echo('Error, no existe el dato "TIPO" en el objeto POST');
        break;
}


function CoordenadasPlotter($post){

    $id = $post['idTipo'];
    $data = PlotterModel::CoordenadasPlotter($id);
    echo json_encode($data);
}