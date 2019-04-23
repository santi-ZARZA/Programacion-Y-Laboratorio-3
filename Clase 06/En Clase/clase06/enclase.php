<?php

require_once "Usuario.php";
require_once "AccesoDatos.php";

/*
try {
$conectar = new PDO('mysql:host=localhost;dbname=cdcol;',"root","");

    //echo "me conecte";
    //echo "El usuario 'root' con contraseña '' se conecto exitosamente.";

    $array = $conectar->query("SELECT * FROM cds");

    $datos = $array->fetchall(PDO::);

    foreach ($datos as $value) {
        var_dump($value)."<br/><br/>";
    }

    //var_dump($datos);
} catch (PDOException $th) {
    echo $th->GetMessage();
}*/


$usu1 = new Usuario(/*1,"usu@gmail.com","aaa","usu","ario",2*/);
$usu1->id = 4;
$usu1->correo = "usuario@outlook.com";
$usu1->clave = "bbb";
$usu1->nombre = "u";
$usu1->apellido = "ser";
$usu1->perfil = 16;

//var_dump($usu1->Traer(1));

//var_dump($usu1->TraerTodos());

//echo Usuario::Eliminar(2);

//echo Usuario::Agregar($usu1);

//echo Usuario::Modificar($usu1);
