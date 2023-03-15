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
            if (isset($_POST['question'])) {
                $question = $this->question->findById($_POST['question']);
                $answer = $this->answer->findAllByQuestionId($_POST['question']);

                if ($question != null) {
                    $message = array(
                        'message' => 'none',
                        'question' => $question,
                        'answers' => $answer
                    );
                    $this->view->render($message);
                } else {
                    header('Location: ./');
                    exit;
                }
            } else {
                header('Location: ./');
                exit;
            }
        }

    }

?>