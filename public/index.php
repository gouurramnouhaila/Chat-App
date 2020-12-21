<?php

use App\src\controllers\HomeController;
use App\src\controllers\LoginController;
use App\src\controllers\MessageController;
use App\src\controllers\ForgotController;
use App\src\core\Application;
use App\src\core\Router;
use App\src\core\Request;

require_once __DIR__ . './../vendor/autoload.php';



$app = new Application(__DIR__);


$app->router->get('/',[HomeController::class,'home']);


$app->router->get('/sign_up',[LoginController::class,'signUp']);
$app->router->post('/sign_up',[LoginController::class,'signUp']);

$app->router->get('/sign_In',[LoginController::class,'signIn']);
$app->router->post('/sign_In',[LoginController::class,'signIn']);


$app->router->get('/chat',[MessageController::class,'chat']);
$app->router->post('/chat',[MessageController::class,'chat']);

$app->router->get('/getChat',[MessageController::class, 'getChat']);


$app->router->get('/forgot_Password',[ForgotController::class,'forgotPassword']);




$app->run();

?>