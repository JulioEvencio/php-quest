<?php

    class MainView {

        private $fileName;
        private $header;
        private $footer;

        public function __construct($fileName, $header = 'header', $footer = 'footer') {
            $this->fileName = $fileName;
            $this->header = $header;
            $this->footer = $footer;
        }

        public function render($arr = []) {
            require_once('./app/views/pages/templates/'.$this->header.'.php');
            require_once('./app/views/pages/'.$this->fileName.'.php');
            require_once('./app/views/pages/templates/'.$this->footer.'.php');
        }

    }

?>