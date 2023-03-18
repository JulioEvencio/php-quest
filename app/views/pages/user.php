<link rel="stylesheet" href="<?php echo CSS_USER ?>">

<main>
    <div class="container">
        <h1>Olá, <?php echo $arr['username'] ?></h1>
        <a href="<?php echo URL_QUESTION ?>"><button class="button-question">Criar uma pergunta</button></a>
        <hr>

        <h2>Minhas perguntas</h2>

        <section class="question">
            <?php

                foreach ($arr['questions'] as $question) {
                    echo "
                        <form class=\"question__form\" action=\"".URL_QUESTIONVIEW."\" method=\"post\">
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