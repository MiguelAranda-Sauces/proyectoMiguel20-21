<!DOCTYPE html>
<!-- Generamos El cuerpo del html-->
<html>
    <head>
        <title>Proyecto Login Logoff Multicapa POO</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="webroot/css/style_1.css">
        <?php
        if ($vistaEnCurso == 'view/vInicio.php') {
            echo '<link rel = "stylesheet" type = "text/css" href = "webroot/css/stylePrograma.css">';
        } else if ($vistaEnCurso === 'view/vRegistro.php') {
            echo '<link rel = "stylesheet" type = "text/css" href = "webroot/css/styleRegistro.css">';
        } else if ($vistaEnCurso === 'view/vEditar.php') {
            echo '<link rel = "stylesheet" type = "text/css" href = "webroot/css/styleEdit.css">';
        } else {
            echo '<link rel = "stylesheet" type = "text/css" href = "webroot/css/styleLogin.css">';
        }
        ?>

    </head>
    <body>
        <?php
        require_once $vistaEnCurso
        ?>
        <footer>
            <div class="pie">
                <a href="../../index.html" class="nombre">Miguel Ángel Aranda García <br> 19/01/2021</a>
                <a href="https://github.com/MiguelAranda-Sauces" target="_blank" class="git" ><img class="git" src="webroot/media/img/git.png"></a>
                <a href="documentacion/index.html" target="_blank" class="phpdoc" ><img class="git" src="webroot/media/img/phpdoc.png"></a>
            </div>

        </footer>
    </body>
</html>