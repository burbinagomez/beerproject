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

require_once(dirname(__FILE__) . "/../Model/LoginModel.php");
switch ($post['tipo']) {
    case "Registrar" :
        Registrar($post);
        break;
    case "Recuperar" :
        Recuperar($post);
        break;
    case "Cambio" :
        Cambio($post);
        break;
    case "Login" :
        Login($post);
        break;
        case "loginGmail" :
            LoginGmail($post);
            break;
        case "Cerrar" :
        Cerrar();
        break;
    default: echo('Error, no existe el dato "TIPO" en el objeto POST');
        break;
}

function Registrar($post){	
    $nombre=$post['nombre'];
    $telefono = $post['telefono'];
    $ciudad = $post['ciudad'];
	$correo = $post['correo'];
    $pass =  password_hash($post['pass'],PASSWORD_DEFAULT) ;
    // if(captcha($token,$action)){
        $data = LoginModel::Registrar($correo,$pass,$nombre,$telefono,$ciudad);
        echo json_encode($data);
    // }else{
    //     $return["status"] = "error";
    // $return["mensaje"] = "Por favor recargue la pagina";
    // $return["id"]="0";
    // $return["token"]=$token;
    // echo json_encode($return);

    // }
    

   // var_dump( $data['mensaje']);
	
}

function Recuperar($post){  

    try{
        require_once(dirname(__FILE__) . "/../class/Mailer/envio.php");
        $email = $post['correo'];
        $token = $post['token'];
        $action = 'login';
        $rpass= randomPassword();
       
        $pass =  password_hash($rpass,PASSWORD_DEFAULT) ;
        if(captcha($token,$action)){
        $data = LoginModel::Actualizar($email,$pass,$token);
        if ($data['status'] == 'success') {
            ob_start();
            EnvioModel::envio($email,$rpass);
            ob_end_clean();
        }}else{
            $return["status"] = "error";
            $return["mensaje"] = "Por favor recargue la pagina";
            $return["id"]="0";
            $return["token"]=$token;
            echo json_encode($return);
        }
        
    }catch(exception $ex){
        $data = null;
    }
    echo json_encode($data);
}


function Cambio($post){  

    try{
        $id = $post['id'];       
        $pass =  password_hash($post['pass'],PASSWORD_DEFAULT) ;
        $token = $post['token'];
        $action = 'login';
        if(captcha($token,$action)){
            $data = LoginModel::Cambio($id,$pass,$token);
        }else{
            $return["status"] = "error";
            $return["mensaje"] = "Por favor recargue la pagina";
            $return["id"]="0";
            $return["token"]=$token;
            echo json_encode($return);
        }
                
    }catch(exception $ex){
        $data = null;
    }
    echo json_encode($data);
}

function randomPassword() {
    $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890@';
    $pass = array(); //remember to declare $pass as an array
    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
    for ($i = 0; $i < 8; $i++) {
        $n = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }
    return implode($pass); //turn the array into a string
}


function Login($post) {
    $email = $post['correo'];
    $pass = $post['pass'];


// if(captcha($token,$action)){
    $data = LoginModel::login($email, $pass);
    echo json_encode($data);
// }else{
//     $return["status"] = "error";
//     $return["mensaje"] = "Por favor recargue la pagina";
//     $return["id"]="0";
//     $return["token"]=$token;
//     echo json_encode($return);
// }

 
}

function captcha($token,$action){
    define("RECAPTCHA_V3_SECRET_KEY", '6LdoJcQUAAAAAIFFWhivPNnhPBSZCfGySiOOeINh');
    // call curl to POST request
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,"https://www.google.com/recaptcha/api/siteverify");
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query(array('secret' => RECAPTCHA_V3_SECRET_KEY, 'response' => $token)));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
curl_close($ch);
$arrResponse = json_decode($response, true);

// verify the response
if($arrResponse["success"] == '1' && $arrResponse["action"] == $action && $arrResponse["score"] >= 0.5) {
    // valid submission
    return True;
} else {
    return False;
}
}

function Cerrar() {
    $data = LoginModel::Cerrar();
    
    echo json_encode($data);
}

function LoginGmail($post) {
    $name = $post['name'];
    $email = $post['email'];
    $image = $post['image'];
    $data = LoginModel::loginGmail($name, $email,$image);
    echo json_encode($data);
}