<?php

    class MySQL {

        public static function getConnection() {
            $host = 'localhost';
            $dbname = 'db_php_quest';
            $username = 'app';
            $password = '123';

            $dns = 'mysql:host='.$host.';dbname='.$dbname.';charset=utf8mb4';

            return new PDO($dns, $username, $password);
        }

    }

?>