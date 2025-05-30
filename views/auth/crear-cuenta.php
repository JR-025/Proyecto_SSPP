<h1 class="nombre-pagina">Crear Cuenta</h1>
<p class="descripcion-pagina">Llena El Siguiente Formulario Para Crear Una Cuenta</p>

<!--Iterar sobre el arreglo de alertas para mostrarlas en la vita-->
<?php 
    include_once __DIR__ . "/../templates/alertas.php";
?>

<form method="POST" action="/crear-cuenta" class="formulario">
    
    <div class="campo">
        <label for="nombre">Nombre</label>
        <input 
        type="text"
        id="nombre"
        name="nombre"
        placeholder="Tu Nombre"
        value = "<?php echo s($usuario->nombre); ?>"
        />
        <!--Value = nos ayuda a relenar los campos con la informacion del objeto-->
        <!-- echo S() = nos ayuda a sanitizar los campos (ActiveRecord)-->
    </div>

    <div class="campo">
        <label for="apellido">Apellido</label>
        <input 
            type="text"
            id="apellido"
            name="apellido"
            placeholder="Tu Apellido"
            value = "<?php echo s($usuario->apellido); ?>"
        />
    </div>

    <div class="campo">
        <label for="telefono">Telefono</label>
        <input 
            type="tel"
            id="telefono"
            name="telefono"
            placeholder="Tu Telefono"
            value = "<?php echo s($usuario->telefono); ?>"
        />
    </div>

    <div class="campo">
        <label for="email">Email</label>
        <input 
            type="email"
            id="email"
            name="email"
            placeholder="Tu Email"
            value = "<?php echo s($usuario->email); ?>"
        />
    </div>

    <div class="campo">
        <label for="password">Password</label>
        <input 
            type="password"
            id="password"
            name="password"
            placeholder="Tu Password"
        />
    </div>

    <input type="submit" class="boton" value="Crear Cuenta">
    
</form>

<div class="acciones">
    <a href="/">¿Ya tienes una cuenta? Inicia Sesion</a>
    <a href="/olvide">¿Olvidaste tu contraseña?</a>
</div>