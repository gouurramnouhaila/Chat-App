<?php

namespace App\src\core;

use App\src\controllers\Controller;
use App\src\core\Request;
use App\src\core\Response;
use App\src\core\Router;
use App\src\repository\MessageRepository;
use App\src\repository\RegistrationRepository;
use App\src\repository\UserRepository;


class Application {
    
    /**
     * @var Router
     */
    public  $router;

    /**
     * @var Request
     */
    public  $request;

    /**
     * @var Response
     */
    public  $response;

    /**
     * @var
     */
    public static  $ROOT_DIR;

    /**
     * @var Application
     */
    public static  $app;

    /**
     * @var Controller
     */
    public $controller;

    /**
     * @var Templating
     */
    public $template;

    /**
     * @var Database
     */
    public $db;

    /**
     * @var DbModel
     */
    public $model;

    /**
     * @var MessageRepository
     */
    public $messageRepository;

    /**
     * @var UserRepository
     */
    public  $userRepository;


    public function __construct(string $rootPath) {
        $this->request = new  Request();
        $this->response = new Response();
        $this->template = new Templating();
        $this->controller = new Controller();
        $this->userRepository = new UserRepository();
        $this->messageRepository = new MessageRepository();
        $this->router = new Router($this->request,$this->response,$this->template,$this->userRepository,$this->messageRepository);
        $this->db = new Database();
        self::$app = $this;
        self::$ROOT_DIR = $rootPath;
    }

    /**
     * @return Controller
     */
    public function getController() : Controller
    {
        return $this->controller;
    }

    /**
     * @param Controller $controller
     */
    public function setController(Controller $controller): void
    {
        $this->controller = $controller;
    }

    public function run() {
        $this->router->resolve();
    }

}