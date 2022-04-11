<?php
//echo "test"; exit;
//error_reporting(-1);
include "controller/home_controller.php";
$homeController = new homeController;
$request = $_SERVER['REQUEST_URI'];

$urlExplode=explode('/', $request);
//echo "<pre>";
//print_r($urlExplode); exit;

if($urlExplode[1]=='tweets'){
    switch ($urlExplode[2]) {
        case 'add' :
            $homeController->addTweet();
            break;
        case 'edit' :
            $homeController->updateTwet($urlExplode[3]);
            break;
        case 'delete' :
            $homeController->deleteTwit($urlExplode[3]);
            break;
        default:
            http_response_code(404);
            break;
    }
} else if(is_numeric($urlExplode[1])) { //pagination
    $homeController->index($urlExplode[1]);
} 
else{
switch ($request) {
    case '/' :
        $homeController->index();
        break;
    case '/register' :
        $homeController->register();
        break;
    case '/login' :
        $homeController->login();
        break;
    case '/logout' :
        $homeController->logout();
        break;
    default:
        http_response_code(404);
        break;
}
}
?>