<h1 class="nombre-pagina" >Login</h1>
<p class="descripcion-pagina">Inicia Sesion Con Tus Datos</p>

<!--Iterar sobre el arreglo de alertas para mostrarlas en la vita-->
<?php 
    include_once __DIR__ . "/../templates/alertas.php";
?>

<form action="/" class="formulario" method="POST">

    <div class="campo">
        <label for="email">Email</label>
        <input 
            type="email"
            id="email"
            placeholder="Tu Email"
            name="email"
        />
    </div>

    <div class="campo">
        <label for="password">Password</label>
        <input 
            type="password"
            id="password"
            placeholder="Tu Password"
            name="password"
        />
    </div>

    <input type="submit" class="boton" value="Iniciar Sesion">

</form>

<div class="acciones">
    <a href="/crear-cuenta">¿Aun no tienes una cuenta? Crear Una</a>
    <a href="/olvide">¿Olvidaste tu contraseña?</a>
</div>