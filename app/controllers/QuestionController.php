<?php

    require_once('./app/views/MainView.php');
    require_once('./app/models/QuestionModel.php');

    class QuestionController {

        private $view;
        private $question;

        public function __construct() {
            $this->view = new MainView('question-create');
            $this->question = new QuestionModel();
        }

        public function execute() {
            $message = array('message' => 'none');

            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }

            if (isset($_SESSION['user_id'])) {
                if (isset($_POST['title']) && isset($_POST['body'])) {
                    if ($this->question->create($_POST['title'], $_POST['body'], $_SESSION['user_id'])) {
                        $message['message'] = 'failure';
                    } else {
                        header('Location: ./');
                        exit;
                    }
                }

                $this->view->render($message);
            } else {
                header('Location: ./login');
                exit;
            }
        }

    }

?>