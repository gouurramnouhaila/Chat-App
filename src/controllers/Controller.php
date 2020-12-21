<?php


namespace App\src\controllers;

use App\src\core\Application;


class Controller {

    /**
     * @var string
     */
    public  $layout = "home";

    public function setLayout($layout) {
        $this->layout = $layout;
    }

    public function render($view,$params = []) {
        return Application::$app->template->renderView($view,$params);
    }
}