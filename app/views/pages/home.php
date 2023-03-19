<link rel="stylesheet" href="<?php echo CSS_HOME ?>">

<main>
    <div class="container">
        <h1>Perguntas</h1>
        <a href="<?php echo URL_QUESTION_CREATE ?>"><button class="button-question">Criar uma pergunta</button></a>
        <hr>

        <section class="question">
        <?php

            foreach ($arr as $question) {
                echo "
                    <form class=\"question__form\" action=\"".URL_QUESTION_VIEW."\" method=\"post\">
                        <input type=\"text\" name=\"question\" value=".$question['id']." hidden>
                            <h2>".$question['title']."</h2>
                            <hr>
                            <p class=\"question__paragraph\"><strong>Autor:</strong> ".$question['user']."</p>

                            <button type=\"submit\">Visualizar</button>
                    </form>
                ";
            }

        ?>
        </section>
    </div>
</main>