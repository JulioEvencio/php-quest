<?php

    ob_start();

    require_once('./config/constants.php');
    require_once('./config/Router.php');
    require_once('./Application.php');

    $app = new Application();
    $app->execute();

    ob_end_flush();

?>