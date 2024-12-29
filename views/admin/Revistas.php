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
   <h1>Administrador de revistas</h1>
   <div class="contenedor-sm">


      <?php
      include_once __DIR__ . "../../plantillas/alertas.php";
      ?>

      <p class="descripcion-pagina">Registro de revistas:</p>

      <form class="formulario" method="POST" action="/Revistas" enctype="multipart/form-data" id="formRegistro">


         <!-- ----------------------------- -->
         <div class="campo">
            <label for="nombre">Nombre:</label>
            <input
               type="text"
               id="nombre"
               name="nombre"
               placeholder="Nombre de la revista"
               value="<?php echo s($revistas->nombre); ?>" />
         </div>
         <!-- ------------------------------------- -->

         <!-- ------------------------------ -->

         <div class="campo">
            <label for="categoria">Categoría:</label>
            <select id="categoria" name="categoria">
               <option value="" disabled <?php echo empty($revistas->categoria) ? 'selected' : ''; ?>>--Elegir categoría--</option>
               <option value="<?php echo s('Q1'); ?>" <?php echo $revistas->categoria == 'Q1' ? 'selected' : ''; ?>>Q1</option>
               <option value="<?php echo s('Q2'); ?>" <?php echo $revistas->categoria == 'Q2' ? 'selected' : ''; ?>>Q2</option>
               <option value="<?php echo s('Q3'); ?>" <?php echo $revistas->categoria == 'Q3' ? 'selected' : ''; ?>>Q3</option>
               <option value="<?php echo s('Q4'); ?>" <?php echo $revistas->categoria == 'Q4' ? 'selected' : ''; ?>>Q4</option>
            </select>
         </div>

         <!-- --------------------------------- -->

         <!-- --------------------------------- -->

         <div class="campo">
            <label for="enlace">Enlace:</label>
            <input
               type="enlace"
               id="enlace"
               name="enlace"
               placeholder="Enlace de revista"
               value="<?php echo s($revistas->enlace); ?>" />
         </div>
         <!-- ------------------------------------- -->

         <div class="campo">
            <label for="pais">País:</label>
            <select id="pais" name="pais">
               <option value="" disabled <?php echo empty($revistas->pais) ? 'selected' : ''; ?>>--Elegir país--</option>
               <?php
               $paises = paises();
               foreach ($paises as $pais): ?>
                  <option value="<?php echo s($pais); ?>" <?php echo $revistas->pais == $pais ? 'selected' : ''; ?>>
                     <?php echo s($pais); ?>
                  </option>
               <?php endforeach; ?>
            </select>
         </div>


         <div class="campo">
            <label for="tipo_revista">Área:</label>
            <select id="tipo_revista" name="tipo_revista">
               <option value="" disabled <?php echo empty($revistas->tipo_revista) ? 'selected' : ''; ?>>--Elegir--</option>
               <option value="<?php echo s('Educación'); ?>" <?php echo $revistas->tipo_revista == 'Educación' ? 'selected' : ''; ?>>Educación</option>
               <option value="<?php echo s('E-learning'); ?>" <?php echo $revistas->tipo_revista == 'E-learning' ? 'selected' : ''; ?>>E-learning</option>
               <option value="<?php echo s('Tecnología'); ?>" <?php echo $revistas->tipo_revista == 'Tecnología' ? 'selected' : ''; ?>>Tecnología</option>
               <option value="<?php echo s('Redes de datos'); ?>" <?php echo $revistas->tipo_revista == 'redes de datos' ? 'selected' : ''; ?>>Redes de datos</option>
            </select>
         </div>

         <div class="campo">
            <label for="accesibilidad">Acceso:</label>
            <select id="accesibilidad" name="accesibilidad">
               <option value="" disabled <?php echo empty($revistas->accesibilidad) ? 'selected' : ''; ?>>--Elegir--</option>
               <option value="<?php echo s('Público'); ?>" <?php echo $revistas->accesibilidad == 'Público' ? 'selected' : ''; ?>>Público</option>
               <option value="<?php echo s('Privado'); ?>" <?php echo $revistas->accesibilidad == 'Privado' ? 'selected' : ''; ?>>Privado</option>
            </select>
         </div>

         <div class="campo">
            <label for="archivo">Subir plantilla:</label>
            <input type="file" id="archivo" name="archivo" accept=".pdf, .doc, .docx">
         </div>



         <input type="submit" class="boton" value="Añadir revista">

      </form>


   </div>


   <table class="borde">
      <h1 id="fucus1">Lista de Revistas</h1>

      <!-- -------/buscar_revista----------------FILTRADOR DE DATOS -->
      <?php
      $form_action = '/buscar_revistas_admin';
      include_once __DIR__ . "/../plantillas/buscador_revistas.php";
      ?>
      <!-- -----------------------FILTRADOR DE DATOS -->

      <thead class="encabezado-datos">
         <tr>
            <th>Nombre</th>
            <th>Categoria</th>
            <th>Enlace</th>
            <th>Acceso</th>
            <th>País</th>
            <th>Área</th>
            <th>Documento</th>
            <th>Actualizar</th>
         </tr>
      </thead>
      <tbody class="informacion-datos"> <?php foreach ($datos as $revista): ?>
            <tr>
              
               <td><?php echo s($revista->nombre); ?></td>
               <td><?php echo s($revista->categoria); ?></td>
               <td> <a href="<?php echo s($revista->enlace); ?>" target="_blank"> <?php echo s($revista->enlace); ?> </a> </td>
               <td><?php echo s($revista->accesibilidad); ?></td>
               <td><?php echo s($revista->pais); ?></td>
               <td><?php echo s($revista->tipo_revista); ?></td>
               <td>
                  <?php if (!empty(trim($revista->documento_url))): ?>
                     <a href="#<?php echo s($revista->documento_url); ?>" title="<?php echo s($revista->documento_url); ?>">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="editar" viewBox="0 0 16 16">
                           <path d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0M9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1m-1 4v3.793l1.146-1.147a.5.5 0 0 1 .708.708l-2 2a.5.5 0 0 1-.708 0l-2-2a.5.5 0 0 1-.708-.708L7.5 11.293V7.5a.5.5 0 0 1 1 0" />
                        </svg>
                     </a>
                  <?php else: ?>
                     <!-- Mensaje cuando no hay archivo -->
                     <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="eliminar" viewBox="0 0 16 16">
                        <path d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0M9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1M5.884 6.68 8 9.219l2.116-2.54a.5.5 0 1 1 .768.641L8.651 10l2.233 2.68a.5.5 0 0 1-.768.64L8 10.781l-2.116 2.54a.5.5 0 0 1-.768-.641L7.349 10 5.116 7.32a.5.5 0 1 1 .768-.64" />
                     </svg>
                  <?php endif; ?>
               </td>






               <td>
                  <a href="/editar?id=<?php echo $revista->id; ?>">
                     <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="editar" viewBox="0 0 16 16">
                        <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001" />
                     </svg>
                  </a>
                  <a class="eliminar-E" href="/eliminar?id=<?php echo $revista->id; ?>" onclick="return confirmDelete(this);">
                     <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="eliminar" viewBox="0 0 16 16">
                        <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47M8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5" />
                     </svg>
                  </a>

               </td>
            </tr>
         <?php endforeach; ?>
      </tbody>



   </table>


</div>

<?php
$script = "
  <script src='build/js/app.js'></script>
";
?>