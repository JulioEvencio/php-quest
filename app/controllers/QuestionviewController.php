<?php

    require_once('./app/views/MainView.php');
    require_once('./app/models/QuestionModel.php');
    require_once('./app/models/AnswerModel.php');

    class QuestionviewController {

        private $view;
        private $question;
        private $answer;

        public function __construct() {
            $this->view = new MainView('question-view');
            $this->question = new QuestionModel();
            $this->answer = new AnswerModel();
        }

        public function execute() {
            $message = ['message' => 'none'];

            if (!isset($_POST['question'])) {
                header('Location: ./');
                exit;
            }

            $question = $this->question->findById($_POST['question']);

            if ($question == null)  {
                header('Location: ./');
                exit;
            }

            if (isset($_POST['body'])) {
                if (session_status() == PHP_SESSION_NONE) {
                    session_start();
                }

                if (isset($_SESSION['user_id'])) {
                    if ($this->answer->create($_POST['body'], $_SESSION['user_id'], $_POST['question'])) {
                        $message['message'] = 'failure';
                    } else {
                        $message['message'] = 'success';
                    }
                } else {
                    $message['message'] = 'failure-login';
                }
            }

            $answers = $this->answer->findAllByQuestionId($_POST['question']);

            $message['question'] = $question;
            $message['answers'] = $answers;

            $this->view->render($message);
        }

    }

?>