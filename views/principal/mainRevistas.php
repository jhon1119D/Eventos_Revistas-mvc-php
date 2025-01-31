<div class="contenedor">

   <!-- -----------------------MENÚ DE NAVEGACIÓN -->
   <header class="header">
      <nav class="nav">
         <!-- imagen logo utpl menú -->
         <img class="imagenM" src="/build/img/Logo-utpl.svg" alt="Logo utpl">

         <div>
            <a href="/">
               <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="return" viewBox="0 0 16 16">
                  <path fill-rule="evenodd" d="M14.5 1.5a.5.5 0 0 1 .5.5v4.8a2.5 2.5 0 0 1-2.5 2.5H2.707l3.347 3.346a.5.5 0 0 1-.708.708l-4.2-4.2a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 8.3H12.5A1.5 1.5 0 0 0 14 6.8V2a.5.5 0 0 1 .5-.5" />
               </svg>
            </a>
         </div>


      </nav>
      <a>
         <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-moon-stars-fill toggle-dark-mode" viewBox="0 0 16 16">
            <path d="M6 .278a.77.77 0 0 1 .08.858 7.2 7.2 0 0 0-.878 3.46c0 4.021 3.278 7.277 7.318 7.277q.792-.001 1.533-.16a.79.79 0 0 1 .81.316.73.73 0 0 1-.031.893A8.35 8.35 0 0 1 8.344 16C3.734 16 0 12.286 0 7.71 0 4.266 2.114 1.312 5.124.06A.75.75 0 0 1 6 .278" />
            <path d="M10.794 3.148a.217.217 0 0 1 .412 0l.387 1.162c.173.518.579.924 1.097 1.097l1.162.387a.217.217 0 0 1 0 .412l-1.162.387a1.73 1.73 0 0 0-1.097 1.097l-.387 1.162a.217.217 0 0 1-.412 0l-.387-1.162A1.73 1.73 0 0 0 9.31 6.593l-1.162-.387a.217.217 0 0 1 0-.412l1.162-.387a1.73 1.73 0 0 0 1.097-1.097zM13.863.099a.145.145 0 0 1 .274 0l.258.774c.115.346.386.617.732.732l.774.258a.145.145 0 0 1 0 .274l-.774.258a1.16 1.16 0 0 0-.732.732l-.258.774a.145.145 0 0 1-.274 0l-.258-.774a1.16 1.16 0 0 0-.732-.732l-.774-.258a.145.145 0 0 1 0-.274l.774-.258c.346-.115.617-.386.732-.732z" />
         </svg>
      </a>
   </header>
   <!-- -----------------------MENÚ DE NAVEGACIÓN -->


   <h1>Revistas</h1>



   <!-- -----------------------ALERTAS -->
   <?php
   include_once __DIR__ . "../../plantillas/alertas.php";
   ?>
   <!-- -----------------------ALERTAS -->

   <!-- -----------------------advertencia de uso-->
   <div class="advertencia">
      <p>En esta página, puedes gestionar todas las revistas registradas en el sistema. En la parte de abajo, encontrarás una lista de todas las revistas registradas, donde puedes previsualizarlas y descargarlas según sea necesario. Esta funcionalidad te permite mantener la información actualizada y gestionar las revistas de manera eficiente.</p>
   </div>
   <!-- -----------------------advertencia de uso-->

<!-- -----------------------titulos de la tabla-->
   <table class="borde">
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

               <td>
                  <div class="openSource">
                     <?php echo s($revista->nombre); ?>
                     <?php if ($revista->accesibilidad == 'si'): ?>
                        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="currentColor" class="visualizar" viewBox="0 0 16 16">
                           <path d="M11 1a2 2 0 0 0-2 2v4a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V9a2 2 0 0 1 2-2h5V3a3 3 0 0 1 6 0v4a.5.5 0 0 1-1 0V3a2 2 0 0 0-2-2" />
                        </svg>
                  </div>
               <?php endif; ?>
               </td>


               <td><?php echo s($revista->categoria); ?></td>
               <td> <a href="<?php echo s($revista->enlace); ?>" target="_blank">
                     <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="enlace" viewBox="0 0 16 16">
                        <path d="M4.715 6.542 3.343 7.914a3 3 0 1 0 4.243 4.243l1.828-1.829A3 3 0 0 0 8.586 5.5L8 6.086a1 1 0 0 0-.154.199 2 2 0 0 1 .861 3.337L6.88 11.45a2 2 0 1 1-2.83-2.83l.793-.792a4 4 0 0 1-.128-1.287z" />
                        <path d="M6.586 4.672A3 3 0 0 0 7.414 9.5l.775-.776a2 2 0 0 1-.896-3.346L9.12 3.55a2 2 0 1 1 2.83 2.83l-.793.792c.112.42.155.855.128 1.287l1.372-1.372a3 3 0 1 0-4.243-4.243z" />
                     </svg>
                  </a>
               </td>
               <td><?php echo s($revista->pais); ?></td>
               <td><?php echo s($revista->tipo_revista); ?></td>
               <td>
                  <?php if (!empty(trim($revista->documento_url))): ?>
                     <?php $documento_url = trim($revista->documento_url); ?>
                     <?php $extension = strtolower(pathinfo($documento_url, PATHINFO_EXTENSION)); ?>
                     <a href="documentos/revistas/<?php echo s($revista->documento_url); ?>" download>
                        <?php if ($extension === 'zip'): ?>
                           <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="descargar-zip" viewBox="0 0 16 16">
                              <path d="M8.5 9.438V8.5h-1v.938a1 1 0 0 1-.03.243l-.4 1.598.93.62.93-.62-.4-1.598a1 1 0 0 1-.03-.243" />
                              <path d="M4 0h8a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2m2.5 8.5v.938l-.4 1.599a1 1 0 0 0 .416 1.074l.93.62a1 1 0 0 0 1.109 0l.93-.62a1 1 0 0 0 .415-1.074l-.4-1.599V8.5a1 1 0 0 0-1-1h-1a1 1 0 0 0-1 1m1-5.5h-1v1h1v1h-1v1h1v1H9V6H8V5h1V4H8V3h1V2H8V1H6.5v1h1z" />
                           </svg>
                        <?php else: ?>
                           <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="descargar" viewBox=" 0 0 16 16">
                              <path d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0M9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1M5.485 6.879l1.036 4.144.997-3.655a.5.5 0 0 1 .964 0l.997 3.655 1.036-4.144a.5.5 0 0 1 .97.242l-1.5 6a.5.5 0 0 1-.967.01L8 9.402l-1.018 3.73a.5.5 0 0 1-.967-.01l-1.5-6a.5.5 0 1 1 .97-.242z" />
                           </svg>
                        <?php endif; ?>
                     </a>
                  <?php else: ?>
                     <!-- Mensaje cuando no hay archivo -->
                     <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="eliminar" viewBox="0 0 16 16">
                        <path d="M15 8a6.97 6.97 0 0 0-1.71-4.584l-9.874 9.875A7 7 0 0 0 15 8M2.71 12.584l9.874-9.875a7 7 0 0 0-9.874 9.874ZM16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0" />
                     </svg>
                  <?php endif; ?>
                  <!-- Visualizar los documentos -->
                  <?php if (!empty(trim($revista->documento_url)) && $extension !== 'zip'): ?>
                     <a href="#" onclick="onGetFile('documentos/revistas/<?php echo s($revista->documento_url); ?>'); return false;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="visualizar" viewBox="0 0 16 16">
                           <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0" />
                           <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8m8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7" />
                        </svg>
                     </a>
                     <!-- Modal -->
                     <div id="myModal" class="modal">
                        <div class="modal-content">
                           <span class="close" onclick="document.getElementById('myModal').style.display='none'">&times;</span>
                           <div id="modal-contenedor"></div>
                        </div>
                     </div>
                  <?php endif; ?>
               </td>
            </tr>
         <?php endforeach; ?>
      </tbody>
   </table>
</div>