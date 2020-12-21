<?php

namespace App\src\core;


class Templating {

    public  function renderView($view,$params) {

        return $this->renderViewContent($view,$params);
    }


    public function renderViewContent($view,$params) {

        foreach ($params as $key => $value) {
            $$key = $value;
        }
        ob_start();
        require Application::$ROOT_DIR.'./../src/views/'.$view.'.php';
        $content = ob_get_clean();

        $layout = Application::$app->controller->layout;
        require Application::$ROOT_DIR.'./../src/views/Layouts/'.$layout.'.php';
    }
}