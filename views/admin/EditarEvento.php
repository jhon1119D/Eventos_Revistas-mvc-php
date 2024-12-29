<div class="contenedor">


    <?php
    $menu_links = ' 
       <li class="li__links">
       <a href="/Revistas" class="link">Revistas</a>
       </li> 
       <li class="li__links">
       <a href="/Eventos" class="link">Eventos</a>
       </li> <li class="li__links">
       <a href="/logout" class="link--salir">Salir</a>
       </li> 
       ';
    include_once __DIR__ . "../../plantillas/Menu.php";
    ?>
    <h1>Actualizar evento</h1>
    <div class="contenedor-sm">

        <?php
        include_once __DIR__ . "../../plantillas/alertas.php";
        ?>


        <p class="descripcion-pagina">Registro del evento</p>
        <form class="formulario" method="POST" enctype="multipart/form-data">



            <div class="campo">
                <label for="titulo">Título:</label>
                <input
                    type="text"
                    id="titulo"
                    name="titulo"
                    placeholder="Título del evento"
                    value="<?php echo s($eventos->titulo); ?>" />
            </div>
            <!-- ------------------------------------- -->
            <div class="campo">
                <label for="acronimo">Acrónimo:</label>
                <input
                    type="text"
                    id="acronimo"
                    name="acronimo"
                    placeholder="Acrónimo"
                    value="<?php echo s($eventos->acronimo); ?>" />
            </div>


            <div class="campo">
                <label for="ranking">Ranking:</label>
                <select id="ranking" name="ranking">
                    <option value="" disabled <?php echo empty($eventos->ranking) ? 'selected' : ''; ?>>--Elegir ranking--</option>
                    <option value="<?php echo s('A*'); ?>" <?php echo $eventos->ranking == 'A*' ? 'selected' : ''; ?>>A*</option>
                    <option value="<?php echo s('A'); ?>" <?php echo $eventos->ranking == 'A' ? 'selected' : ''; ?>>A</option>
                    <option value="<?php echo s('B'); ?>" <?php echo $eventos->ranking == 'B' ? 'selected' : ''; ?>>B</option>
                    <option value="<?php echo s('C'); ?>" <?php echo $eventos->ranking == 'C' ? 'selected' : ''; ?>>C</option>
                    <option value="<?php echo s('Unranked'); ?>" <?php echo $eventos->ranking == 'Unranked' ? 'selected' : ''; ?>>Unranked</option>
                </select>
            </div>

            <div class="campo">
                <label for="enlace">Enlace:</label>
                <input
                    type="enlace"
                    id="enlace"
                    name="enlace"
                    placeholder="Enlace de evento"
                    value="<?php echo s($eventos->enlace); ?>" />
            </div>
            <!-- ------------------------------------- -->

            <div class="campo">
                <label for="fecha">Fecha:</label>
                <input
                    type="date"
                    id="fecha"
                    name="fecha"
                    value="<?php echo s($eventos->fecha); ?>" />
            </div>

            <div class="campo">
                <label for="archivo">Subir plantilla:</label>
                <input type="file" id="archivo" name="archivo" accept=".pdf, .doc, .docx">
            </div>



            <input type="submit" class="boton" value="Actualizar evento">

        </form>
    </div>