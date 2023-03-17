<link rel="stylesheet" href="./public/css/home.css">

<main>
    <div class="container">
        <h1>Perguntas</h1>
        <a href="./question"><button class="button-question">Criar uma pergunta</button></a>
        <hr>

        <section class="question">
        <?php

            foreach ($arr as $question) {
                echo "
                    <form class=\"question__form\" action=\"./questionview\" method=\"post\">
                        <input type=\"text\" name=\"question\" value=".$question['id']." hidden>
                            <h2>".$question['title']."</h2>
                            <hr>
                            <p class=\"question__paragraph\"><strong>Autor:</strong> ".$question['user']."</p>

                            <button type=\"submit\">Responder</button>
                    </form>
                ";
            }

        ?>
        </section>
    </div>
</main>