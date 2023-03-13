<link rel="stylesheet" href="./public/css/home.css">

<main>
    <div class="container">
        <h1>Perguntas</h1>
        <a href="./question"><button class="button-question">Criar uma pergunta</button></a>
        <hr>

        <?php

            foreach ($arr as $question) {
                echo "
                    <section class=\"question\">
                        <h2>".$question['title']."</h2>
                        <hr>

                        <a href=\"".$question['id']."\"><button>Responder</button></a>
                    </section>
                ";
            }

        ?>
    </div>
</main>