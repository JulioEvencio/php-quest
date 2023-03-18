<?php

    require_once('./app/views/MainView.php');
    require_once('./app/models/QuestionModel.php');

    class HomeController {

        private $view;
        private $question;

        public function __construct() {
            $this->view = new MainView(PAGE_HOME);
            $this->question = new QuestionModel();
        }

        public function execute() {
            $this->view->render($this->question->findAll());
        }

    }

?>