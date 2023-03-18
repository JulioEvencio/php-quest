<link rel="stylesheet" href="<?php CSS_QUESTION_CREATE ?>">

<main>
    <div class="container">
        <h1>Criar Pergunta</h1>
        <hr>

        <section class="question">
            <?php
                if ($arr['message'] == 'failure') {
                    echo "
                        <span class=\"question__message--error\">Erro ao enviar pergunta!</span><br><br>
                    ";
                }
            ?>

            <form class="question__form" action="<?php echo URL_QUESTION ?>" method="post">
                <label>
                    Título:<br>
                    <input type="text" name="title" required><br>
                </label>

                <label>
                    Explique melhor:<br>
                    <textarea name="body" rows="20" required></textarea><br>
                </label>

                <button class="question__button" type="submit">Enviar</button>
            </form>
        </section>
    </div>
</main>