<?php

    require_once('./app/views/MainView.php');
    require_once('./app/models/UserModel.php');

    class LoginController {

        private $view;
        private $user;

        public function __construct() {
            $this->view = new MainView('login');
            $this->user = new UserModel();
        }

        public function execute() {
            $message = array('message' => 'none');

            if (isset($_POST['email']) && isset($_POST['password'])) {
                if ($this->user->login($_POST['email'], $_POST['password'])) {
                    $message['message'] = 'failure';
                } else {
                    $user = $this->user->findByEmail($_POST['email']);

                    if (session_status() == PHP_SESSION_NONE) {
                        session_start();
                    }

                    $_SESSION['user_id'] = $user['id'];
                    $_SESSION['user_username'] = $user['username'];

                    // session_write_close();

                    header('Location: ./');
                    exit;
                }
            }

            $this->view->render($message);
        }

    }

?>