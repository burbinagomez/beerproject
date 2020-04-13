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

require_once(dirname(__FILE__) . "/../Model/HomeModel.php");
switch ($post['tipo']) {
    case "ImagenesHome" :
        ImagenesHome();
        break;
        case "MarcaDeAgua" :
            MarcaDeAgua($post);
            break;
        case "ImagenesInteriores":
            ImagenesInteriores();
        break;
        case "ImagenesJardineria":
            ImagenesJardineria();
        break;
    default: echo('Error, no existe el dato "TIPO" en el objeto POST');
        break;
}

function ImagenesJardineria(){
    $data = HomeModel::ImagenesJardineria();   
	echo json_encode($data);
}

function ImagenesInteriores(){
    $data = HomeModel::ImagenesInteriores();   
	echo json_encode($data);
}


function Bmarcadeagua($img_original, $img_marcadeagua, $img_nueva, $calidad)
{
	// obtener datos de la fotografia 
	$info_original = getimagesize($img_original);
	$anchura_original = $info_original[0];
	$altura_original = $info_original[1];
	// obtener datos de la "marca de agua" 
	$info_marcadeagua = getimagesize($img_marcadeagua);
	$anchura_marcadeagua = $info_marcadeagua[0];
	$altura_marcadeagua = $info_marcadeagua[1];
	// calcular la posición donde debe copiarse la "marca de agua" en la fotografia 
	$horizmargen = ($anchura_original - $anchura_marcadeagua)/2;
	$vertmargen = ($altura_original - $altura_marcadeagua)/2;
	// crear imagen desde el original 
	$original = ImageCreateFromJPEG($img_original);
	ImageAlphaBlending($original, true);
	// crear nueva imagen desde la marca de agua 
	$marcadeagua = ImageCreateFromPNG($img_marcadeagua);
	// copiar la "marca de agua" en la fotografia 
	ImageCopy($original, $marcadeagua, $horizmargen, $vertmargen, 0, 0, $anchura_marcadeagua, $altura_marcadeagua);
	// guardar la nueva imagen 
	ImageJPEG($original, $img_nueva, $calidad);
	// cerrar las imágenes 
	ImageDestroy($original);
	ImageDestroy($marcadeagua);
}

function MarcaDeAgua($post){
$marcadeagua=("../img/Iconos/Marca.png");
$origen=$post["url"];
$destino='../Upload/Temp/'.date('YmdHis').'.jpg';
$destino_temporal=tempnam("../Upload/Temp/","tmp");
Bmarcadeagua($origen, $marcadeagua, $destino_temporal, 100);
 
// guardamos la imagen
$fp=fopen($destino,"w");
fputs($fp,fread(fopen($destino_temporal,"r"),filesize($destino_temporal)));
fclose($fp);
header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename='.basename($destino));
    header('Content-Transfer-Encoding: binary');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($destino));
    ob_clean();
    flush();
    readfile($destino);
    exit;
}

/*
function MarcaDeAgua($post){
   
    // Primero crearemos nuestra imagen de la estampa manualmente desde GD
    $estampa = imagecreatetruecolor(220, 70);
    imagefilledrectangle($estampa, 0, 0, 99, 69, 0x0000FF);
    imagefilledrectangle($estampa, 9, 9, 90, 60, 0xFFFFFF);
    $im = imagecreatefromjpeg($post["url"]);

    imagestring($estampa, 3, 20, 40, 'https://rascanube.com/User', 0x0000FF);
    // Establecer los márgenes para la estampa y obtener el alto/ancho de la imagen de la estampa
    $margen_dcho = 10;
    $margen_inf = 10;
    $sx = imagesx($estampa);
    $sy = imagesy($estampa);

    // Fusionar la estampa con nuestra foto con una opacidad del 50%
    imagecopymerge($im, $estampa, imagesx($im) - $sx - $margen_dcho, imagesy($im) - $sy - $margen_inf, 0, 0, imagesx($estampa), imagesy($estampa), 100);

    $nombre = '../Upload/Temp/'.date('YmdHis').'.png' ;
    // Guardar la imagen en un archivo y liberar memoria
    imagepng($im, $nombre);
    file_put_contents($nombre,file_get_contents($im));
    imagedestroy($im);

    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename='.basename($nombre));
    header('Content-Transfer-Encoding: binary');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($nombre));
    ob_clean();
    flush();
    readfile($nombre);
    exit;
}
*/
function ImagenesHome(){
    $data = HomeModel::ImagenesHome();

   
	echo json_encode($data);
}