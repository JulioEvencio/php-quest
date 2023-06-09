<?php

    class LogoutController {

        public function execute() {
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }

            session_unset();
            session_destroy();

            header('Location: ' . URL_LOGIN);
            exit;
        }

    }

?>