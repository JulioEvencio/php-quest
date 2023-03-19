<?php

    require_once('./app/views/MainView.php');
    require_once('./app/models/QuestionModel.php');
    require_once('./app/models/AnswerModel.php');

    class QuestionController {

        public function execute() {
            Router::execute('question/view/', function () {
                self::view();
            });

            Router::execute('question/create/', function () {
                self::create();
            });

            header('Location: ' . URL_HOME);
            exit;
        }

        public function view() {
            $view = new MainView(PAGE_QUESTION_VIEW);
            $question = new QuestionModel();
            $answer = new AnswerModel();

            $message = ['message' => 'none'];

            if (!isset($_POST['question'])) {
                header('Location: ' . URL_HOME);
                exit;
            }

            $question = $question->findById($_POST['question']);

            if ($question == null)  {
                header('Location: ' . URL_HOME);
                exit;
            }

            if (isset($_POST['body'])) {
                if (session_status() == PHP_SESSION_NONE) {
                    session_start();
                }

                if (isset($_SESSION['user_id'])) {
                    if ($answer->create($_POST['body'], $_SESSION['user_id'], $_POST['question'])) {
                        $message['message'] = 'failure';
                    } else {
                        $message['message'] = 'success';
                    }
                } else {
                    $message['message'] = 'failure-login';
                }
            }

            $answers = $answer->findAllByQuestionId($_POST['question']);

            $message['question'] = $question;
            $message['answers'] = $answers;

            $view->render($message);
        }

        public function create() {
            $view = new MainView(PAGE_QUESTION_CREATE);
            $question = new QuestionModel();

            $message = array('message' => 'none');

            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }

            if (isset($_SESSION['user_id'])) {
                if (isset($_POST['title']) && isset($_POST['body'])) {
                    if ($question->create($_POST['title'], $_POST['body'], $_SESSION['user_id'])) {
                        $message['message'] = 'failure';
                    } else {
                        header('Location: ' . URL_HOME);
                        exit;
                    }
                }

                $view->render($message);
            } else {
                header('Location: ' . URL_LOGIN);
                exit;
            }
        }

    }

?>