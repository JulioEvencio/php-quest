<?php

    class MainView {

        private $fileName;
        private $header;
        private $footer;

        public function __construct($fileName, $header = PAGE_TEMPLATES_HEADER, $footer = PAGE_TEMPLATES_FOOTER) {
            $this->fileName = $fileName;
            $this->header = $header;
            $this->footer = $footer;
        }

        public function render($arr = []) {
            require_once($this->header);
            require_once($this->fileName);
            require_once($this->footer);
        }

    }

?>