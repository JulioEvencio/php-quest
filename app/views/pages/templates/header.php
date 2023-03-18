<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/php-quest/public/css/style.css">
    <link rel="stylesheet" href="/php-quest/public/css/header.css">
    <link rel="stylesheet" href="/php-quest/public/css/footer.css">
    <title>PHP Quest</title>
</head>
<body>
    <header class="header">
        <div class="header__container container">
            <a class="logo" href="/php-quest/home">PHP Quest</a>

            <nav id="navigation" class="navigation">
                <button id="button-mobile" class="button-mobile" aria-label="Abrir Menu" aria-haspopup="true" aria-controls="menu" aria-expanded="false">&#9776;</button>

				<ul class="menu" role="menu">
					<li class="menu__item">
                        <a class="menu__link" href="/php-quest/home">Home</a>
					</li>

                    <?php
                        if (session_status() == PHP_SESSION_NONE) {
                            session_start();
                        }

                        if (isset($_SESSION['user_id'])) {
                            echo "
                                <li class=\"menu__item\">
                                    <a class=\"menu__link\" href=\"/php-quest/user\">Perfil</a>
                                </li>

                                <li class=\"menu__item\">
                                    <a class=\"menu__link\" href=\"/php-quest/logout\">Sair</a>
                                </li>
                            ";
                        } else {
                            echo "
                                <li class=\"menu__item\">
                                    <a class=\"menu__link\" href=\"/php-quest/login\">Entrar</a>
                                </li>
            
                                <li class=\"menu__item\">
                                    <a class=\"menu__link\" href=\"/php-quest/signup\">Criar conta</a>
                                </li>
                            ";
                        }
                    ?>
				</ul>
            </nav>
        </div>
    </header>