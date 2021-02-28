<!DOCTYPE html>
<!-- Generamos El cuerpo del html-->
<html>
    <head>
        <title>Proyecto Miguel 20-21</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel = "stylesheet" type = "text/css" href = "../webroot/css/style.css">

    </head>
    <body>
    <article id="nav">
        <section id="conNav">
            <div id='tituloVista'>
                <p>
                    Aplicacion Miguel 20-21
                </p>
            </div>
            <form id='bNav' name="logout" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

                <input class="botonNav" type="submit" value="Login" name="login"><!-- Si punsamos Registrarse mandaremos el valor de Registro a la variable controladorActual de sesion y volveremos a cargar el index -->
                <input class="botonNav" type="submit" value="Registrarse" name="registro"><!-- Si punsamos Registrarse mandaremos el valor de Registro a la variable controladorActual de sesion y volveremos a cargar el index -->
            </form>
        </section>
    </article>
    <article id="contenedor"> 
        <section class="carrusel">
            <div class="slider">
                <input type="radio" name="slider" title="slide1" checked="checked" class="slider__nav"/>
                <input type="radio" name="slider" title="slide2" class="slider__nav"/>
                <input type="radio" name="slider" title="slide3" class="slider__nav"/>
                <input type="radio" name="slider" title="slide4" class="slider__nav"/>
                <input type="radio" name="slider" title="slide5" class="slider__nav"/>
                <input type="radio" name="slider" title="slide6" class="slider__nav"/>
                <input type="radio" name="slider" title="slide7" class="slider__nav"/>
                <input type="radio" name="slider" title="slide8" class="slider__nav"/>
                
                <div class="slider__inner">
                    <div class="slider__contents"><i class="slider__image fa fa-codepen"></i>
                        <a href="../webroot/documentos/201127ModeloFisicoDeDatos20-21.pdf" target="_blank"><img src="../webroot/media/img/ModeloF.PNG"></a>
                        <h2 class="slider__caption">Modelo fisico</h2>     
                    </div>
                    <div class="slider__contents"><i class="slider__image fa fa-newspaper-o"></i>
                        <a href="../webroot/documentos/200113EstructuraDeAlmacenamiento.JPG" target="_blank"><img src="../webroot/media/img/200113EstructuraDeAlmacenamiento.JPG"></a>
                        <h2 class="slider__caption">Estructura de almacenamiento</h2>     
                    </div>
                    <div class="slider__contents"><i class="slider__image fa fa-television"></i>
                        <a href="../webroot/documentos/201129CatalogoDeRequisitos.pdf" target="_blank"><img src="../webroot/media/img/CatalogoDeRequisitos.PNG"></a>
                        <h2 class="slider__caption">Catalogo de requisitos</h2>     
                    </div>
                    <div class="slider__contents"><i class="slider__image fa fa-diamond"></i>
                        <a href="../webroot/documentos/210102ArbolDeNavegación.pdf" target="_blank"><img src="../webroot/media/img/arboldeNavegacion.PNG"></a>
                        <h2 class="slider__caption">Arbol de navegación</h2>     
                    </div>
                    <div class="slider__contents"><i class="slider__image fa fa-diamond"></i>
                        <a href="../webroot/documentos/210102DiagramaDeCasosDeUso.pdf" target="_blank"><img src="../webroot/media/img/diagramadecasosdeuso.PNG"></a>
                        <h2 class="slider__caption">Diagrama de casos de uso</h2>     
                    </div>
                    <div class="slider__contents"><i class="slider__image fa fa-diamond"></i>
                        <a href="../webroot/documentos/210102DiagramaDeClases.pdf" target="_blank"><img src="../webroot/media/img/diagramadeclases.PNG"></a>
                        <h2 class="slider__caption">Diagrama de clases</h2>     
                    </div>
                    <div class="slider__contents"><i class="slider__image fa fa-diamond"></i>
                        <a href="../webroot/documentos/210102DiagramaDeClasesLoginLogoff.pdf" target="_blank"><img src="../webroot/media/img/diagramadeclaseslogin.PNG"></a>
                        <h2 class="slider__caption">Diagrama de clases Login Logof</h2>     
                    </div>
                    <div class="slider__contents"><i class="slider__image fa fa-diamond"></i>
                        <a href="../webroot/documentos/210102RelacionDeFicheros.pdf" target="_blank"><img src="../webroot/media/img/relacionficheros.PNG"></a>
                        <h2 class="slider__caption">Relación de ficheros</h2>     
                    </div>
                </div>
            </div>


        </section>
    </article>
    <footer>
        <div id="enlacesMix">
            <a href="https://github.com/MiguelAranda-Sauces" target="_blank" class="git" ><img class="git" src="../webroot/media/img/git.png"></a>
            <a href="documentacion/index.html" target="_blank" class="phpdoc" ><img class="git" src="../webroot/media/img/phpdoc.png"></a>
        </div>
        <div id="pie">
            <a href="../../index.html" class="nombre">Miguel Ángel Aranda García 2020-2021</a>
        </div>

    </footer> 
</body>
</html>