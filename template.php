<!DOCTYPE php>
<php lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Handball Baires</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Anton&family=Black+Ops+One&family=PT+Sans:wght@400;700&family=Poppins:wght@300;400;700&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="build/css/app.css" />
</head>

<body>
    <header class="site-header bg-bordo">
        <div class="contenido-header  contenedor">
            <img src="/build/img/logo-baires.webp" alt="logotipo" class="logotipo"/>
            <div class="menu-responsive">
                <img src="/build/img/menu-hamburger-nav-svgrepo-com.svg" alt="menu hamburguesa" class="menu-hamburguer">
            </div>
            <nav class="navegacion-principal menu">
                <a href="/">INICIO</a>
                <div class="contenedor-sub-menu">
                    <button class="btn-sub-menu">NOSOTROS</button>
                    <ul class="sub-menu"> 
                        <li class="sub-menu-link"><a href="misionyvision.php">Mision y Visión</a></li>
                        <li class="sub-menu-link"><a href="historia.php">Historia</a></li>
                    </ul>
                </div>
                <div class="contenedor-sub-menu">
                    <button class="btn-sub-menu">TORNEOS</button>
                    <ul class="sub-menu"> 
                        <li class="sub-menu-link"><a href="participa.php">COMO PARTICIPO</a></li>
                        <li class="sub-menu-link"><a href="torneos.php">TORNEOS</a></li>
                        <li class="sub-menu-link"><a href="beneficios.php">BENEFICIOS</a></li>
                        <li class="sub-menu-link"><a href="protocolocovid.php">PROTOCOLO COVID-19</a></li>
                    </ul>
                </div>
                <a href="noticias.php">NOTICIAS</a>
                <div class="contenedor-sub-menu">
                    <button class="btn-sub-menu">TRIBUNAL DE DISCIPLINA</button>
                    <ul class="sub-menu"> 
                        <li class="sub-menu-link"><a href="#">REGLAMENTO</a></li>
                        <li class="sub-menu-link"><a href="#">SANCIONES</a></li>
                    </ul>
                </div>
                <a href="#">EVENTOS</a>
                <a href="contacto.php">CONTACTO</a>
            </nav>
        </div><!--.contenido-header -->
    </header><!--.site-header -->      

























    <footer class="site-footer">
        <div class="contenido-footer contenedor">
            <ul class="informacion-footer">
                <li class="logo">
                    <a href="/">
                        <picture>
                            <source srcset="/build/img/logo-baires.avif" type="image/avif">
                            <source srcset="/build/img/logo-baires.webp" type="image/webp">
                            <img loading="lazy" src="/build/img/logo-baires.webp" alt="" class="logo-footer">
                        </picture>
                    </a>
                </li>
                <li class="numero">
                    <picture>
                        <source srcset="/build/img/telefono.avif" type="image/avif">
                        <source srcset="/build/img/telefono.webp" type="image/webp">
                        <img loading="lazy" src="/build/img/telefono.png" alt="icono telefono">
                    </picture>
                     <p>15 38 47 75 12</p>
                </li>
                <li class="email">handballBaires@gmail.com</li>
                <li class="redes-sociales-footer">
                    <a href="#">
                        <picture>
                            <source srcset="/build/img/twitter.avif" type="image/avif">
                            <source srcset="/build/img/twitter.webp" type="image/webp">
                            <img loading="lazy" src="/build/img/twitter.png" alt="icono red social">
                        </picture>
                    </a>
                    <a href="#">
                        <picture>
                            <source srcset="/build/img/instagram.avif" type="image/avif">
                            <source srcset="/build/img/instagram.webp" type="image/webp">
                            <img loading="lazy" src="/build/img/instagram.png" alt="icono red social">
                        </picture>
                    </a>
                    <a href="#">
                        <picture>
                            <source srcset="/build/img/facebook.avif" type="image/avif">
                            <source srcset="/build/img/facebook.webp" type="image/webp">
                            <img loading="lazy" src="/build/img/facebook.png" alt="icono red social">
                        </picture>
                    </a>
                    <a href="#">
                        <picture>
                            <source srcset="/build/img/youtube.avif" type="image/avif">
                            <source srcset="/build/img/youtube.webp" type="image/webp">
                            <img loading="lazy" src="/build/img/youtube.png" alt="icono red social">
                        </picture>
                    </a>
                </li>
            </ul>
        </div>
    </footer>
    <script src="build/js/app.js"></script>
</body>

</php>