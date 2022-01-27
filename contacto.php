<?php 
    include 'includes/templates/header.php';

?>


    <section class="seccion-contacto contenedor">
        <h3>¿Donde Estamos?</h3>

        . <div class="contenido-contacto hero">
           <div class="contacto-formulario">
                <h3>Contactanos</h3>
                <form action="" class="formulario-contacto">
                    <label for="nombre">Nombre</label>
                    <input type="text" name="nombre" id="nombre" placeholder="nombre">

                    <label for="asunto">Asunto</label>
                    <input type="text" name="asunto" id="asunto" placeholder="Asunto">

                    <label for="email">Correo</label>
                    <input type="email" name="correo" id="correo" placeholder="Ingrese su correo">

                    <label for="consulta">Tu Consulta</label>
                    <textarea name="consulta" id="consulta"></textarea>

                    <input type="submit" value="enviar" class="btn-enviar">
                </form>
           </div><!--.Contacto-->
           <div class="ubicacion">
                <h3>Ubicacion</h3>
                <ul class="redes-sociales-contacto">
                    <li class="icon"> 
                        <picture>
                            <source srcset="/build/img/telefono.avif" type="image/avif">
                            <source srcset="/build/img/telefono.webp" type="image/webp">
                            <img loading="lazy" src="/build/img/telefono.jpg" alt="imagen telefono">
                        </picture> 15 38 47 75 12
                    </li>
                    <li class="icon"> 
                       <picture>
                           <source srcset="/build/img/email.avif" type="image/avif">
                           <source srcset="/build/img/email.webp" type="image/webp">
                           <img loading="lazy" src="build/img/email.png" alt="imagen email">
                       </picture>handballBaires@gmail.com
                    </li>
                    <li class="icon"> 
                        <picture>
                            <source srcset="/build/img/pin.avif" type="image/avif">
                            <source srcset="/build/img/pin.webp" type="image/webp">
                            <img loading="lazy" src="/build/img/pin.png" alt="imagen ubicacion">
                        </picture> Ubicacion: Quintino Bocayuya
                    </li>
                </ul>

               <div class="contenedor-mapa">
                   <div class="map" id="map">
                       
                   </div>
               </div>
    
           </div><!--.ubicacion-->
        </div>
    </section>

<?php 
    include 'includes/templates/footer.php';
?>