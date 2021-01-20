<?php

namespace App\src\core;

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

    /**
     * Router constructor.
     * @param Request $request
     * @param Response $response
     * @param Templating $template
     * @param UserRepository $userRepository
     * @param MessageRepository $messageRepository
     */
    public function __construct(Request $request,Response $response,Templating $template,UserRepository $userRepository,MessageRepository $messageRepository) {
        $this->request = $request;
        $this->response = $response;
        $this->template = $template;
        $this->userRepository = $userRepository;
        $this->messageRepository = $messageRepository;
    }

    /**
     * @param $path
     * @param $callBack
     */
    public function get($path, $callBack)
    {
        $this->routes['get'][$path] = $callBack;
    }

    /**
     * @param $path
     * @param $callBack
     */
    public function post($path,$callBack) {
        $this->routes['post'][$path] = $callBack;
    }

    /**
     * @return mixed|void
     */
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
                Application::$app->controller = new $callBack[0]();
                $callBack[0] = Application::$app->controller;
        }

        return call_user_func($callBack,$this->request);
    }


}