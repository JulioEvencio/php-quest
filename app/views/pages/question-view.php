<link rel="stylesheet" href="./public/css/question-view.css">

<main>
    <div class="container">
        <?php

            switch ($arr['message']) {
                case 'failure-login':
                    echo "
                        <span class=\"answer__message--error\">Você precisa fazer o login para enviar uma resposta!</span><br><br>
                    ";
                    break;

                case 'success':
                    echo "
                        <span class=\"answer__message--success\">Resposta adicionada!</span><br><br>
                    ";
                    break;

                case 'failure':
                    echo "
                        <span class=\"answer__message--error\">Erro ao enviar resposta!</span><br><br>
                    ";
                    break;
            }

            echo "
                <h1>".$arr['question']['title']."</h1>
                <br>
                <p><strong>Autor:</strong> ".$arr['question']['user_username']."</p>
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
                            <p class=\"answer__paragraph\"><strong>Autor:</strong> ".$answer['user']."</p>
                            <hr>
                            <p>
                                ".$answer['body']."
                            </p>
                        </div>
                    ";
                }

            ?>

            <form class="responses__form" action="./Questionview" method="post">
                <?php
                    echo "<input type=\"text\" name=\"question\" value=".$arr['question']['id']." hidden>";
                ?>

                <label>
                    Responda:<br>
                    <textarea name="body" rows="10" required></textarea><br>
                </label>

                <button class="responses__button" type="submit">Enviar</button>
            </form>
        </section>
    </div>
</main>