<?php

    require_once('./MySQL.php');

    class QuestionModel {

        public function findById($id) {
            try {
                $pdo = MySQL::getConnection();

                $sql = "SELECT tb_question.id as id, tb_question.title as title, tb_question.body as body, tb_user.username as username FROM tb_question, tb_user WHERE tb_question.id = ?  AND tb_question.user_id = tb_user.id";

                $stmt = $pdo->prepare($sql);
                $stmt->execute(array($id));

                $result = $stmt->fetch();

                if ($result) {
                    $question = array(
                        'id' => $result['id'],
                        'title' => $result['title'],
                        'body' => $result['body'],
                        'user_username' => $result['username']
                    );

                    return $question;
                }

                return null;
            } catch (Exception $e) {
                return null;
            } finally {
                $pdo = null;
            }
        }

        public function findAll() {
            try {
                $pdo = MySQL::getConnection();

                $sql = "SELECT tb_question.id as id, tb_question.title as title, tb_question.body as body, tb_user.username as username FROM tb_question, tb_user where tb_question.user_id = tb_user.id ORDER BY tb_question.id DESC LIMIT 10";

                $stmt = $pdo->prepare($sql);
                $stmt->execute();

                $result = $stmt->fetchAll();

                $questions = [];

                foreach ($result as $key => $value) {
                    $questions[] = array('title' => $value['title'], 'id' => $value['id'], 'user' => $value['username']);
                }

                return $questions;
            } catch (Exception $e) {
                return [];
            } finally {
                $pdo = null;
            }
        }

        public function findAllQuestionByUserId($user_id) {
            try {
                $pdo = MySQL::getConnection();

                $sql = "SELECT * FROM tb_question WHERE user_id = ? ORDER BY id DESC LIMIT 10";

                $stmt = $pdo->prepare($sql);
                $stmt->execute(array($user_id));

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