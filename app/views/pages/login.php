<link rel="stylesheet" href="/php-quest/public/css/login.css">

<main>
    <div class="container">
        <h1>Entrar</h1>
        <hr>

        <section class="login">
            <form class="login__form" action="/php-quest/login" method="post">
                <label>
                    E-mail:<br>
                    <input type="email" name="email" required><br>
                </label>

                <label>
                    Senha:<br>
                    <input type="password" name="password" required><br>
                </label>

                <?php
                    if ($arr['message'] == 'failure') {
                        echo "
                            <span class=\"login__message--error\">E-mail ou senha inválida!</span><br><br>
                        ";
                    }
                ?>

                <button class="login__button" type="submit">Entrar</button>
            </form>
        </section>
    </div>
</main>