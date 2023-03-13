<?php

    require_once('./MySQL.php');

    class QuestionModel {

        public function findAll() {
            try {
                $pdo = MySQL::getConnection();

                $sql = "SELECT * FROM tb_question ORDER BY id DESC LIMIT 10";

                $stmt = $pdo->prepare($sql);
                $stmt->execute();

                $result = $stmt->fetchAll();

                $questions = [];

                foreach ($result as $key => $value) {
                    $questions[] = array('title' => $value['title'], 'id' => $value['id']);
                }

                return $questions;
            } catch (Exception $e) {
                return [];
            } finally {
                $pdo = null;
            }
        }

        public function create($title, $body, $user_id) {
            try {
                $pdo = MySQL::getConnection();

                $sql = "INSERT INTO tb_question (id, title, body, user_id) VALUES (null, ?, ?, ?)";

                $stmt = $pdo->prepare($sql);
                $stmt->execute(array($title, $body, $user_id));

                return false;
            } catch (Exception $e) {
                return true;
            } finally {
                $pdo = null;
            }
        }

    }

?>