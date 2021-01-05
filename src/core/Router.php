<?php

namespace App\src\core;

use App\src\controllers\Controller;
use App\src\controllers\LoginController;
use App\src\core\Request;
use App\src\core\Response;
use App\src\repository\MessageRepository;
use App\src\repository\RegistrationRepository;
use App\src\repository\UserRepository;

class Router {

    /**
     * @var array
     */
    public  $routes = [];

    public $repos = ['App\src\controllers\LoginController','App\src\controllers\MessageController','App\src\controllers\HomeController'];

     /**
     * @var Request
     */
    public  $request;

    /**
     * @var Response
     */
    public  $response;

    /**
     * @var Templating
     */
    public $template;

    /**
     * @var UserRepository
     */
    public $userRepository;

    /**
     * @var MessageRepository
     */
    public $messageRepository;

    public function __construct(Request $request,Response $response,Templating $template,UserRepository $userRepository,MessageRepository $messageRepository) {
        $this->request = $request;
        $this->response = $response;
        $this->template = $template;
        $this->userRepository = $userRepository;
        $this->messageRepository = $messageRepository;
    }

    public function get($path, $callBack)
    {
        $this->routes['get'][$path] = $callBack;
    }

    public function post($path,$callBack) {
        $this->routes['post'][$path] = $callBack;
    }

    public function resolve() {
        $path = $this->request->getPath();
        $method = $this->request->Method();
        $callBack = $this->routes[$method][$path] ?? false;

        if($callBack === false) {
           Application::$app->response->setStatusCode(404);
           return $this->template->renderView("_404", []);
        }

        if(is_string($callBack)) {
            $this->render($callBack);
        }

        if(is_array($callBack)) {
            if($callBack[0] === "App\src\controllers\LoginController") {
                Application::$app->controller = new $callBack[0]($this->userRepository);
                $callBack[0] = Application::$app->controller;
            }
            else if($callBack[0] === "App\src\controllers\MessageController") {
                Application::$app->controller = new $callBack[0]($this->messageRepository);
                $callBack[0] = Application::$app->controller;
            }
            else if($callBack[0] === "App\src\controllers\HomeController") {
                Application::$app->controller = new $callBack[0]();
                $callBack[0] = Application::$app->controller;
            }
        }

        return call_user_func($callBack,$this->request);

    }


}