<?php

    require_once('./app/views/MainView.php');
    require_once('./app/models/QuestionModel.php');

    class HomeController {

        private $view;
        private $questions;

        public function __construct() {
            $this->view = new MainView('home');
            $this->questions = new QuestionModel();
        }

        public function execute() {
            $this->view->render($this->questions->findAll());
        }

    }

?>