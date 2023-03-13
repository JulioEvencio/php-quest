<link rel="stylesheet" href="./public/css/signup.css">

<main>
    <div class="container">
        <h1>Criar Conta</h1>
        <p>Crie uma conta gratuitamente</p>
        <hr>

        <section class="signup">
            <?php
                if ($arr['message'] == 'success') {
                    echo "
                        <span class=\"signup__message--success\">Conta criada com sucesso!</span>
                    ";
                }
            ?>

            <form class="signup__form" action="./signup" method="post">
                <label>
                    Username:<br>
                    <input type="text" name="username" required><br>
                    <?php
                        if ($arr['message'] == 'failure - username') {
                            echo "
                                <span class=\"signup__message--error\">Username já existe!</span><br><br>
                            ";
                        }
                    ?>
                </label>

                <label>
                    E-mail:<br>
                    <input type="email" name="email" required><br>
                    <?php
                        if ($arr['message'] == 'failure - email') {
                            echo "
                                <span class=\"signup__message--error\">E-mail já cadastrado!</span><br><br>
                            ";
                        }
                    ?>
                </label>

                <label>
                    Senha:<br>
                    <input type="password" name="password" required><br>
                </label>

                <button class="signup__button" type="submit">Criar Conta</button>
            </form>
        </section>
    </div>
</main>