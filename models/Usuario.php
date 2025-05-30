<?php

namespace Model;


//Active record mantiene un objeto en memoria similar al que tenemos en la base de datos 
class Usuario extends ActiveRecord{

    //BASE DE DATOS 
    protected static $tabla = 'usuarios';
    protected static $columnasDB = ['id', 'nombre', 'apellido', 'email', 'password', 'telefono', 'admin', 'confirmado', 'token'];

    public $id;
    public $nombre;
    public $apellido;
    public $email;
    public $password;
    public $telefono;
    public $admin;
    public $confirmado;
    public $token;

    public function __construct($args=[]){
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->apellido = $args['apellido'] ?? '';
        $this->email = $args['email'] ?? '';
        $this->password = $args['password'] ?? '';
        $this->telefono = $args['telefono'] ?? '';
        $this->admin = $args['admin'] ?? 0;
        $this->confirmado = $args['confirmado'] ?? 0;
        $this->token = $args['token'] ?? '';
    }

    //CREAR CUENTA

    //Mensajes de validacion para la creacion del usuario 
    public function validarNuevaCuenta(){
        //llamamos desde ActiveRecord el arreglo de alertas 
        if(!$this->nombre){
            self::$alertas['error'][] = 'El Nombre del Cliente es Obligatorio';
        }
        if(!$this->apellido){
            self::$alertas['error'][] = 'El Apellido del Cliente es Obligatorio';
        }
        if(!$this->email){
            self::$alertas['error'][] = 'El Email del Cliente es Obligatorio';
        }
        if(!$this->telefono){
            self::$alertas['error'][] = 'El Telefono del Cliente es Obligatorio';
        }
        if(!$this->password){
            self::$alertas['error'][] = 'El Password del Cliente es Obligatorio';
        }
        if(strlen($this->password) < 6){
            self::$alertas['error'][] = 'El Password debe contener mas de 6 caracteres';
        }

        return self::$alertas;
    }

    //Revisa si el usuario ya existe 
    public function existeUsuario(){
        //creamos la consulta que pasaremos a la base de datos para verificar si existe el usuario  
        $query = " SELECT * FROM " . self::$tabla . " WHERE email = '" . $this->email . "' LIMIT 1";

        //CONECTAMOS CON LA BASE DE DATOS Y PASAMOS LA CONSULTA
        $resultado = self::$db->query($query);

        //Si en num_rows encontramos coincidencias el usuario existe, de lo contrarrio no
        if($resultado->num_rows){
            self::$alertas['error'][]='El usuario ya esta registrado';
        }
        return $resultado;
    }

    //Encriptar contraseña 
    public function hashPassword(){
        $this->password = password_hash($this->password, PASSWORD_BCRYPT);
    }

    //Crear token de seguridad
    public function crearToken(){
        $this->token = uniqid();
    }

 //------------------------------------------------------------------------------------------

    //INICIAR SESSION 

    //Valiar correo y contraseña 
    public function validarLogin()
    {

        if(!$this->email)
        {
            self::$alertas['error'][] = 'El Email es Obligatorio';
        }
        if(!$this->password)
        {
            self::$alertas['error'][] = 'El Password es Obligatorio';
        }

        return self::$alertas;
    }

    //comprobar usuario verificado y contraseña 
    public function comprobarPasswordAndVerificado($password)
    {
        //Verifirmamos la contraseña 
        $resultado = password_verify($password, $this->password);

        //Verificamso que el usuario este confirmado y la contraseña sea valida
        if(!$resultado || !$this->confirmado)
        {
            self::$alertas['error'][] = 'Password Incorrecto o Cuenta No Confirmada';
        }else
        {
            return true;
        }
    }

 //-------------------------------------------------------------------------------------

    //RECUPERAR CONTRASEÑA
    public function validarEmail()
    {
        if(!$this->email)
        {
            self::$alertas['error'][] = 'El Email es Obligatorio';
        }
        return self::$alertas;
    }

    public function validarPassword()
    {
        if(!$this->password)
        {
            self::$alertas['error'][] = 'El Password es Obligatorio';
        }
        if(strlen($this->password < 6))
        {
            self::$alertas['error'][] = 'El Password debe contener al menos 6 caracteres';
        }
        return self::$alertas;
    }

}