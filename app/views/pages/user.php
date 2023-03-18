<link rel="stylesheet" href="/php-quest/public/css/user.css">

<main>
    <div class="container">
        <h1>Olá, <?php echo $arr['username'] ?></h1>
        <a href="/php-quest/question"><button class="button-question">Criar uma pergunta</button></a>
        <hr>

        <h2>Minhas perguntas</h2>

        <section class="question">
            <?php

                foreach ($arr['questions'] as $question) {
                    echo "
                        <form class=\"question__form\" action=\"/php-quest/questionview\" method=\"post\">
                            <input type=\"text\" name=\"question\" value=".$question['id']." hidden>
                                <h2>".$question['title']."</h2>
                                <hr>

                                <button type=\"submit\">Visualizar</button>
                        </form>
                    ";
                }

            ?>
        </section>
    </div>
</main>