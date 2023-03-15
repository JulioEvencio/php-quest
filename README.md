# php-quest
Um site de perguntas e respostas feito em PHP puro usando o padrão MVC

## Rotas
```
/php-quest/
```

```
/php-quest/home
```

```
/php-quest/login
```

```
/php-quest/logout
```

```
/php-quest/signup
```

```
/php-quest/question
```

```
/php-quest/questionview
```

## Banco de dados

### Comandos

#### Importar o banco usando o arquivo .sql
```
SOURCE /caminho_do_arquivo/php-quest/database/database.sql
```

#### Criar banco de dados
```
CREATE DATABASE IF NOT EXISTS db_php_quest;
```

#### Criar tabela da role
```
CREATE TABLE IF NOT EXISTS tb_role (
    id BIGINT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(5) NOT NULL UNIQUE
)ENGINE=InnoDB AUTO_INCREMENT=1;
```

#### Criar tabela do usuário
```
CREATE TABLE IF NOT EXISTS tb_user (
    id BIGINT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(20) NOT NULL UNIQUE,
    email VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL UNIQUE
)ENGINE=InnoDB AUTO_INCREMENT=1;
```

#### Criar tabela de relação entre usuário e role
```
CREATE TABLE IF NOT EXISTS tb_user_role (
    id BIGINT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    user_id BIGINT NOT NULL,
    role_id BIGINT NOT NULL,
    FOREIGN KEY (user_id) REFERENCES tb_user (id),
    FOREIGN KEY (role_id) REFERENCES tb_role (id)
)ENGINE=InnoDB AUTO_INCREMENT=1;
```

#### Criar tabela da pergunta
```
CREATE TABLE IF NOT EXISTS tb_question (
    id BIGINT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(100) NOT NULL,
    body TEXT NOT NULL,
    user_id BIGINT NOT NULL,
    FOREIGN KEY (user_id) REFERENCES tb_user (id)
)ENGINE=InnoDB AUTO_INCREMENT=1;
```

#### Criar tabela de voto da pergunta
```
CREATE TABLE IF NOT EXISTS tb_question_vote (
    id BIGINT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    vote BOOLEAN,
    user_id BIGINT NOT NULL,
    question_id BIGINT NOT NULL,
    FOREIGN KEY (user_id) REFERENCES tb_user (id),
    FOREIGN KEY (question_id) REFERENCES tb_question (id)
)ENGINE=InnoDB AUTO_INCREMENT=1;
```

#### Criar tabela da resposta
```
CREATE TABLE IF NOT EXISTS tb_answer (
    id BIGINT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    body TEXT NOT NULL,
    user_id BIGINT NOT NULL,
    question_id BIGINT NOT NULL,
    FOREIGN KEY (user_id) REFERENCES tb_user (id),
    FOREIGN KEY (question_id) REFERENCES tb_question (id)
)ENGINE=InnoDB AUTO_INCREMENT=1;
```

#### Criar tabela de voto da resposta
```
CREATE TABLE IF NOT EXISTS tb_answer_vote (
    id BIGINT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    vote BOOLEAN,
    user_id BIGINT NOT NULL,
    answer_id BIGINT NOT NULL,
    FOREIGN KEY (user_id) REFERENCES tb_user (id),
    FOREIGN KEY (answer_id) REFERENCES tb_answer (id)
)ENGINE=InnoDB AUTO_INCREMENT=1;
```