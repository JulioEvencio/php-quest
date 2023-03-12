<?php

    require_once('./MySQL.php');

    class UserModel {

        public function findByUsername($username) {
            try {
                $pdo = MySQL::getConnection();

                $sql = "SELECT * FROM tb_user WHERE username = ?";

                $stmt = $pdo->prepare($sql);
                $stmt->execute(array($username));

                $result = $stmt->fetch();

                if ($result) {
                    return false;
                }

                return true;
            } catch (Exception $e) {
                return true;
            } finally {
                $pdo = null;
            }
        }

        public function findByEmail($email) {
            try {
                $pdo = MySQL::getConnection();

                $sql = "SELECT * FROM tb_user WHERE email = ?";

                $stmt = $pdo->prepare($sql);
                $stmt->execute(array($email));

                $result = $stmt->fetch();

                if ($result) {
                    return false;
                }

                return true;
            } catch (Exception $e) {
                return true;
            } finally {
                $pdo = null;
            }
        }

        public function create($username, $email, $password) {
            try {
                $pdo = MySQL::getConnection();

                $sql = "INSERT INTO tb_user (id, username, email, password) VALUES (null, ?, ?, ?)";

                $stmt = $pdo->prepare($sql);
                $stmt->execute(array($username, $email, $password));

                return false;
            } catch (Exception $e) {
                return true;
            } finally {
                $pdo = null;
            }
        }

    }

?>