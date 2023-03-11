<?php

    class Application {

        public function execute() {
            $url = isset($_GET['url']) ? explode('/', $_GET['url'])[0] : 'Home';

            switch ($url) {
                default:
                    echo 'Não encontrado';
            }
        }

    }

?>