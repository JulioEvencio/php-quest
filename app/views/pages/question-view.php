<link rel="stylesheet" href="./public/css/question-view.css">

<main>
    <div class="container">
        <?php
            if ($arr['message'] == 'failure') {
                echo "
                    <span class=\"answer__message--error\">Erro ao enviar resposta!</span><br><br>
                ";
            }
        ?>

        <?php
            echo "
                <h1>".$arr['question']['title']."</h1>
                <hr>
                <p class=\"question__body\">".$arr['question']['body']."</p>
            ";
        ?>

        <section class="responses">
            <h2>Respostas</h2>
            <hr>

            <?php

                foreach ($arr['answers'] as $answer) {
                    echo "
                        <div class=\"responses__answer\">
                            <p>
                                ".$answer['body']."
                            </p>
                        </div>
                    ";
                }

            ?>

            <form class="responses__form" action="./Questionview" method="post">
                <label>
                    Responda:<br>
                    <textarea name="body" rows="10" required></textarea><br>
                </label>

                <button class="responses__button" type="submit">Enviar</button>
            </form>
        </section>
    </div>
</main>