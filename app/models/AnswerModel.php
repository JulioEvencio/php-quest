<?php

    require_once('./MySQL.php');

    class AnswerModel {

        public function findAllByQuestionId($id) {
            try {
                $pdo = MySQL::getConnection();

                $sql = "SELECT tb_answer.id as id, tb_answer.body as body, tb_user.username as username FROM tb_answer, tb_user WHERE tb_answer.question_id = ? AND tb_answer.user_id = tb_user.id ORDER BY tb_answer.id ASC";

                $stmt = $pdo->prepare($sql);
                $stmt->execute(array($id));

                $result = $stmt->fetchAll();

                $answers = [];

                foreach ($result as $key => $value) {
                    $answers[] = array('body' => $value['body'], 'user' => $value['username']);
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