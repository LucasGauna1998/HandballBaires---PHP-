<?php 
    //HEADER TEMPLATE
    include 'includes/templates/header.php';

    echo "<pre>";
    var_dump($_FILES);
    echo "</pre>";
    echo $_FILES['lista_fe']['tmp_name'];
    echo "<pre>";
    var_dump($_POST);
    echo "</pre>";
?>
    <section class="hero participa fondo-hero"> 
        <div class="overlay">
            <h3>Participa</h3>
        </div>
    </section>

    <section class="formulario contenedor">
        <h4>Formulario de inscripción</h4>
        <p>1) Descarga el archivo excel para completar Tu lista de buena fe aqui.</p>
        <p>2) Completá tus datos.</p>
        <form action="enviar.php" enctype="multipart/form-data" method="POST"> 
            <label for="nombre">Nombre *</label>
            <input type="text" id="nombre" name="nombre" placeholder="Ingrese su Nombre" required>
            
            <label for="apellido">Apellido *</label>
            <input type="text" id="apellido" name="apellido" placeholder="Ingrese su apellido" required>

            <label for="email">Email *</label>
            <input type="email" id="email" name="email" placeholder="Ingrese su Email" required>

            <label for="telefono">Telefono *</label>
            <input type="tel" id="telefono" name="telefono" placeholder="Ingrese su Telefono" required>

            <label for="nombre_equipo">Nombre del equipo *</label>
            <input type="text" id="nombre_equipo" name="nombre_equipo" placeholder="Ingrese el nombre de su equipo" required>
            <label for="">Adjuntar Archivo</label>

            <input type="file" name="lista_fe" id="lista" required accept=".docx , .xls">

            <input type="submit" value="ENVIAR" class="btn-enviar">
        </form>
    </section>


























    <?php
        //FOOTER TEMPLATE
         include 'includes/templates/footer.php';
    ?>