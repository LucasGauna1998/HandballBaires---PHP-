<!DOCTYPE php>
<php lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Handball Baires</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
    integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
    crossorigin=""/>
    <link
        href="https://fonts.googleapis.com/css2?family=Anton&family=Black+Ops+One&family=PT+Sans:wght@400;700&family=Poppins:wght@300;400;700&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="/build/css/app.css">
</head>

<body>
    <header class="site-header bg-bordo">
        <div class="contenido-header  contenedor">
            <a href="/">
                <picture>
                    <source srcset="/build/img/http://localhost/-baires.avif" type="image/avif">
                    <source srcset="/build/img/logo-baires.webp" type="image/webp">
                    <img loading="lazy" src="/build/img/logo-baires.webp" alt="" class="logotipo">
                </picture>
            </a>
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
