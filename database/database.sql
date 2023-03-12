-- SOURCE /path/php-quest/database/database.sql

DROP DATABASE IF EXISTS db_php_quest;

CREATE DATABASE IF NOT EXISTS db_php_quest;

USE db_php_quest;

CREATE TABLE IF NOT EXISTS tb_role (
    id BIGINT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(5) NOT NULL UNIQUE
)ENGINE=InnoDB AUTO_INCREMENT=1;

CREATE TABLE IF NOT EXISTS tb_user (
    id BIGINT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(20) NOT NULL UNIQUE,
    email VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL UNIQUE
)ENGINE=InnoDB AUTO_INCREMENT=1;

CREATE TABLE IF NOT EXISTS tb_user_role (
    id BIGINT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    user_id BIGINT NOT NULL,
    role_id BIGINT NOT NULL,
    FOREIGN KEY (user_id) REFERENCES tb_user (id),
    FOREIGN KEY (role_id) REFERENCES tb_role (id)
)ENGINE=InnoDB AUTO_INCREMENT=1;

CREATE TABLE IF NOT EXISTS tb_question (
    id BIGINT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(100) NOT NULL,
    body TEXT NOT NULL,
    user_id BIGINT NOT NULL,
    FOREIGN KEY (user_id) REFERENCES tb_user (id)
)ENGINE=InnoDB AUTO_INCREMENT=1;

CREATE TABLE IF NOT EXISTS tb_question_vote (
    id BIGINT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    vote BOOLEAN,
    user_id BIGINT NOT NULL,
    question_id BIGINT NOT NULL,
    FOREIGN KEY (user_id) REFERENCES tb_user (id),
    FOREIGN KEY (question_id) REFERENCES tb_question (id)
)ENGINE=InnoDB AUTO_INCREMENT=1;

CREATE TABLE IF NOT EXISTS tb_answer (
    id BIGINT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    body TEXT NOT NULL,
    user_id BIGINT NOT NULL,
    question_id BIGINT NOT NULL,
    FOREIGN KEY (user_id) REFERENCES tb_user (id),
    FOREIGN KEY (question_id) REFERENCES tb_question (id)
)ENGINE=InnoDB AUTO_INCREMENT=1;

CREATE TABLE IF NOT EXISTS tb_answer_vote (
    id BIGINT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    vote BOOLEAN,
    user_id BIGINT NOT NULL,
    answer_id BIGINT NOT NULL,
    FOREIGN KEY (user_id) REFERENCES tb_user (id),
    FOREIGN KEY (answer_id) REFERENCES tb_answer (id)
)ENGINE=InnoDB AUTO_INCREMENT=1;

INSERT INTO tb_role (id, name) VALUES (null, 'admin');