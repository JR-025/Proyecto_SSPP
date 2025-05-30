<h1 class="nombre-pagina" >Recuperar Password</h1>
<p class="descripcion-pagina">Ingresa Tu nuevo Password a Continuacion.</p>

<!--Iterar sobre el arreglo de alertas para mostrarlas en la vita-->
<?php 
    include_once __DIR__ . "/../templates/alertas.php";
?>
<!--Error nos permite validar si el token es invalido para no mostrar el campo de password-->
<?php if($error) return;?>
<form class="formulario" method = "POST">

    <div class="campo">
    <label for="password">Password</label>
        <input 
            type="password"
            id="password"
            name="password"
            placeholder="Tu Nuevo Password"
        />
    </div>

    <input type="submit" class="boton" value="Restablecer Password">

</form>

<div class="acciones">
    <a href="/">¿Ya tienes una cuenta? Inicia Sesion</a>
    <a href="/crear-cuenta">¿Aun no tienes una cuenta? Crear Una</a>
</div>