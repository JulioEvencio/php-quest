<?php

    require_once('./app/views/MainView.php');
    require_once('./app/models/UserModel.php');

    class SignupController {

        private $view;
        private $user;

        public function __construct() {
            $this->view = new MainView('signup');
            $this->user = new UserModel();
        }

        public function execute() {
            $message = array('message' => 'none');

            if (isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password'])) {
                if ($this->user->findByUsername($_POST['username']) != null) {
                    $message['message'] = 'failure - username';
                } else if ($this->user->findByEmail($_POST['email']) != null) {
                    $message['message'] = 'failure - email';
                } else if (!$this->user->create($_POST['username'], $_POST['email'], $_POST['password'])) {
                    $message['message'] = 'success';
                }
            }

            $this->view->render($message);
        }

    }

?>