<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo CSS_STYLE ?>">
    <link rel="stylesheet" href="<?php echo CSS_HEADER ?>">
    <link rel="stylesheet" href="<?php echo CSS_FOOTER ?>">
    <title>PHP Quest</title>
</head>
<body>
    <header class="header">
        <div class="header__container container">
            <a class="logo" href="<?php echo URL_HOME ?>">PHP Quest</a>

            <nav id="navigation" class="navigation">
                <button id="button-mobile" class="button-mobile" aria-label="Abrir Menu" aria-haspopup="true" aria-controls="menu" aria-expanded="false">&#9776;</button>

				<ul class="menu" role="menu">
					<li class="menu__item">
                        <a class="menu__link" href="<?php echo URL_HOME ?>">Home</a>
					</li>

                    <?php
                        if (session_status() == PHP_SESSION_NONE) {
                            session_start();
                        }

                        if (isset($_SESSION['user_id'])) {
                            echo "
                                <li class=\"menu__item\">
                                    <a class=\"menu__link\" href=\"".URL_USER."\">Perfil</a>
                                </li>

                                <li class=\"menu__item\">
                                    <a class=\"menu__link\" href=\"".URL_LOGOUT."\">Sair</a>
                                </li>
                            ";
                        } else {
                            echo "
                                <li class=\"menu__item\">
                                    <a class=\"menu__link\" href=\"".URL_LOGIN."\">Entrar</a>
                                </li>
            
                                <li class=\"menu__item\">
                                    <a class=\"menu__link\" href=\"".URL_SIGNUP."\">Criar conta</a>
                                </li>
                            ";
                        }
                    ?>
				</ul>
            </nav>
        </div>
    </header>