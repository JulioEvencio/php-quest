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

    }

?>