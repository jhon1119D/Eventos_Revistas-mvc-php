<div class="contenedor">
    <h1>Código para registro de administradores</h1>

    <div class="advertencia">
        <p>En esta página, puedes generar y actualizar un código secreto que los nuevos interesados en registrarse como administradores deben ingresar. Este código se puede cambiar según sea necesario para asegurar que solo los usuarios autorizados puedan registrarse y mantener la seguridad de la plataforma.</p>
    </div>


    <div class="contenedor-sm">
    <p class="advertencia">El código actual es: <strong class="eliminar"><?php echo s($codigo); ?></strong>

        <form method="POST" action="/actualizar_codigo" class="formulario">
            <div class="campo">
                <label for="nuevoCodigo">Nuevo Código Secreto:</label>
                <input
                    type="text"
                    id="nuevoCodigo"
                    name="nuevoCodigo"
                    value="<?php echo s($codigo); ?>" />

            </div>
            <input type="submit" class="boton eliminar" value="Cambiar código">



        </form>


    </div>
</div>