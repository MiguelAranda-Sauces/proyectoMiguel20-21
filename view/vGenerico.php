<!DOCTYPE html>
<!-- Generamos El cuerpo del html-->
<html>
    <head>
        <title>Proyecto Miguel 20-21</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel = "stylesheet" type = "text/css" href = "../webroot/css/style.css">
    </head>
    <section id="nav">
        <article>
            <div id='tituloVista'>
                <p>
                    Aplicacion Miguel 20-21
                </p>
            </div>
            <form id='bNav' name="logout" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                
                <input class="botonNav" type="submit" value="registro" name="registro"><!-- Si punsamos Registrarse mandaremos el valor de Registro a la variable controladorActual de sesion y volveremos a cargar el index -->
                <input class="botonNav" type="submit" value="Registrarse" name="registro"><!-- Si punsamos Registrarse mandaremos el valor de Registro a la variable controladorActual de sesion y volveremos a cargar el index -->
            </form>
        </article>
    </section>
    <section id="contenedor"> 
    </section>
    <footer>
        <div class="pie">
            <a href="../../index.html" class="nombre">Miguel Ángel Aranda García <br> 19/01/2021</a>
            <a href="https://github.com/MiguelAranda-Sauces" target="_blank" class="git" ><img class="git" src="webroot/media/img/git.png"></a>
            <a href="documentacion/index.html" target="_blank" class="phpdoc" ><img class="git" src="webroot/media/img/phpdoc.png"></a>
        </div>

    </footer>
</body>
</html>