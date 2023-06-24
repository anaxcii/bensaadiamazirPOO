<?php
class DefaultController{
    public function notFound(){
        http_response_code(404);
        require 'View/errors/404.php';
    }
}