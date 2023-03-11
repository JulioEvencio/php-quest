<?php

    class Application {

        public function execute() {
            $url = isset($_GET['url']) ? explode('/', $_GET['url'])[0] : 'Home';
            $url = ucfirst($url);
            $url .= 'Controller';

            if (file_exists('./app/controllers/'.$url.'.php')) {
                require_once('./app/controllers/'.$url.'.php');

                $controller = new $url();
                $controller->execute();
            } else {
                require_once('./app/controllers/HomeController.php');
                $controller = new HomeController();
                $controller->execute();
            }
        }

    }

?>