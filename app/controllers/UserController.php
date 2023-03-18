<?php

    require_once('./app/views/MainView.php');
    require_once('./app/models/QuestionModel.php');

    class UserController {

        private $view;
        private $question;

        public function __construct() {
            $this->view = new MainView('user');
            $this->question = new QuestionModel();
        }

        public function execute() {
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }

            if (!isset($_SESSION['user_id']))  {
                header('Location: /php-quest/login');
                exit;
            }

            $message['username'] = $_SESSION['user_username'];
            $message['questions'] = $this->question->findAllQuestionByUserId($_SESSION['user_id']);

            $this->view->render($message);
        }

    }

?>