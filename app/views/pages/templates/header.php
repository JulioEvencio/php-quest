<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./public/css/style.css">
    <link rel="stylesheet" href="./public/css/header.css">
    <link rel="stylesheet" href="./public/css/footer.css">
    <title>PHP Quest</title>
</head>
<body>
    <header class="header">
        <div class="header__container container">
            <a class="logo" href="./?url=home">PHP Quest</a>

            <nav id="navigation" class="navigation">
                <button id="button-mobile" class="button-mobile" aria-label="Abrir Menu" aria-haspopup="true" aria-controls="menu" aria-expanded="false">&#9776;</button>

				<ul class="menu" role="menu">
					<li class="menu__item">
                        <a class="menu__link" href="./?url=home">Home</a>
					</li>

                    <li class="menu__item">
                        <a class="menu__link" href="./?url=login">Entrar</a>
					</li>

                    <li class="menu__item">
                        <a class="menu__link" href="./?url=signup">Criar conta</a>
					</li>
				</ul>
            </nav>
        </div>
    </header>