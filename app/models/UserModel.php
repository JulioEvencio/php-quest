<?php

    require_once('./MySQL.php');

    class UserModel {

        public function login($email, $password) {
            try {
                $pdo = MySQL::getConnection();

                $sql = "SELECT password FROM tb_user WHERE email = ?";

                $stmt = $pdo->prepare($sql);
                $stmt->execute(array($email));

                $result = $stmt->fetch();

                if ($result) {
                    if (password_verify($password, $result['password'])) {
                        return false;
                    }
                }

                return true;
            } catch (Exception $e) {
                return true;
            } finally {
                $pdo = null;
            }
        }

        public function findByUsername($username) {
            try {
                $pdo = MySQL::getConnection();

                $sql = "SELECT * FROM tb_user WHERE username = ?";

                $stmt = $pdo->prepare($sql);
                $stmt->execute(array($username));

                $result = $stmt->fetch();

                if ($result) {
                    $user = array(
                        'id' => $result['id'],
                        'username' => $result['username'],
                        'email' => $result['email']
                    );

                    return $user;
                }

                return null;
            } catch (Exception $e) {
                return null;
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
                    $user = array(
                        'id' => $result['id'],
                        'username' => $result['username'],
                        'email' => $result['email']
                    );

                    return $user;
                }

                return null;
            } catch (Exception $e) {
                return null;
            } finally {
                $pdo = null;
            }
        }

        public function create($username, $email, $password) {
            try {
                $pdo = MySQL::getConnection();

                $hashed_password = password_hash($password, PASSWORD_DEFAULT);
                // $hashed_password = password_hash($password, PASSWORD_BCRYPT);

                $sql = "INSERT INTO tb_user (id, username, email, password) VALUES (null, ?, ?, ?)";

                $stmt = $pdo->prepare($sql);
                $stmt->execute(array($username, $email, $hashed_password));

                return false;
            } catch (Exception $e) {
                return true;
            } finally {
                $pdo = null;
            }
        }

    }

?>