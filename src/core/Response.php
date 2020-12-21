<?php


namespace App\src\core;

class Response {

    public function setStatusCode($code) {
        http_response_code($code);
    }
}