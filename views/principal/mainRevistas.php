<div class="contenedor">

   <!-- -----------------------MENÚ DE NAVEGACIÓN -->
   <?php
   $menu_links = ' 
   <li class="li__links">
   <a href="/buscar_revistas_publico" class="link">Revistas</a>
   </li> 
   <li class="li__links">
   <a href="/buscar_eventos_publico" class="link">Eventos</a>
   </li> <li class="li__links">
   <a href="/" class="link--entrar">Login</a>
   </li> 
   ';
   include_once __DIR__ . "../../plantillas/Menu.php";
   ?>
   <!-- -----------------------MENÚ DE NAVEGACIÓN -->

   <table class="borde">

      <h1>Revistas</h1>
      <!-- -----------------------ALERTAS -->
      <?php
      include_once __DIR__ . "../../plantillas/alertas.php";
      ?>
      <!-- -----------------------ALERTAS -->


      <!-- -----------------------FILTRADOR DE DATOS -->
      <?php
      $form_action = '/buscar_revistas_publico';
      include_once __DIR__ . "../../plantillas/buscador_revistas.php";
      ?>
      <!-- -----------------------FILTRADOR DE DATOS -->

      <thead class="encabezado-datos">
         <tr>
            <th>Nombre</th>
            <th>Categoria</th>
            <th>Enlace</th>
            <th>País</th>
            <th>Área</th>
            <th>Descarga</th>
         </tr>
      </thead>
      <tbody class="informacion-datos"> <?php foreach ($datos as $revista): ?>
            <tr>

               <td> <?php echo s($revista->nombre); ?>
                  <?php if ($revista->accesibilidad == 'Privado'): ?> <img src="img/candado-cerrado.svg" alt="privado" class="toggle">
                  <?php else: ?> <img src="img/candado-abierto.svg" alt="publico" class="toggle"> <?php endif; ?>
               </td>
               <td><?php echo s($revista->categoria); ?></td>
               <td> <a href="<?php echo s($revista->enlace); ?>" target="_blank"> <?php echo s($revista->enlace); ?> </a> </td>
               <td><?php echo s($revista->pais); ?></td>
               <td><?php echo s($revista->tipo_revista); ?></td>
               <td>
                  <?php if (!empty(trim($revista->documento_url)) && trim($revista->documento_url) != 'documentos/revistas/'): ?>
                     <!-- Enlace de descarga -->
                     <a href="documentos/revistas/<?php echo s($revista->documento_url); ?>" download>
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
            </tr>
         <?php endforeach; ?>
      </tbody>
   </table>
</div>