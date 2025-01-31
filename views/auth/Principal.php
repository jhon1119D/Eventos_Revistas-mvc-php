<div class="contenedor">

    <!-- -----------------------MENÚ DE NAVEGACIÓN -->
    <?php
    $menu_links = ' 

   <li class="li__links">
   <a href=https://lilianaenciso.com/#sobre-mi class="link">Página principal</a>
   </li>
  
   <li class="li__links">
   <a href="/login" class="link--entrar">Ingresar</a>
   </li> 
   ';
    include_once __DIR__ . "../../plantillas/Menu.php";
    ?>
    <!-- -----------------------MENÚ DE NAVEGACIÓN -->

    <div class="contenedor-sm">
        <h1>Información sobre eventos y revistas</h1>
        <div class="card-container">
            <div class="card">
                <img src="build/img/eventos.jpg" alt="Eventos">
                <div class="card-content">
                    <h3>Registro de eventos</h3>
                    <a href="/buscar_eventos_publico">Ver más</a>
                </div>
            </div>
            <div class="card">
                <img src="build/img/revistas.jpg" alt="Revistas">
                <div class="card-content">
                    <h3>Registro de revistas</h3>
                    <a href="/buscar_revistas_publico">Ver más</a>
                </div>
            </div>
        </div>
    </div>



    <?php
    $script = "
  <script src='build/js/app.js'></script>
";
    ?>