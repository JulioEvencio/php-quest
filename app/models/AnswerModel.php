<?php

    require_once('./MySQL.php');

    class AnswerModel {

        public function findAllByQuestionId($id) {
            try {
                $pdo = MySQL::getConnection();

                $sql = "SELECT * FROM tb_answer WHERE question_id = ? ORDER BY id DESC";

                $stmt = $pdo->prepare($sql);
                $stmt->execute(array($id));

                $result = $stmt->fetchAll();

                $answers = [];

                foreach ($result as $key => $value) {
                    $answers[] = array('body' => $value['body']);
                }

                return $answers;
            } catch (Exception $e) {
                return [];
            } finally {
                $pdo = null;
            }
        }

        public function create($body, $user_id, $question_id) {
            try {
                $pdo = MySQL::getConnection();

                $sql = "INSERT INTO tb_answer (id, body, user_id, question_id) VALUES (null, ?, ?, ?)";

                $stmt = $pdo->prepare($sql);
                $stmt->execute(array($body, $user_id, $question_id));

                return false;
            } catch (Exception $e) {
                return true;
            } finally {
                $pdo = null;
            }
        }

    }

?>