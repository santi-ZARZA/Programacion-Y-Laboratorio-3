<?php

class Usuario{
    public $id;
    public $correo;
    public $clave;
    public $nombre;
    public $apellido;
    public $perfil;

    /*public function __construct($id=null,$correo=null,$clave=null,$nombre=null,$apellido=null,$perfil=null){
        if ($id != null) {$this->id = $id;}
        if ($correo != null) {$this->correo = $correo;}
        if ($clave != null) {$this->clave = $clave;}
        if ($nombre != null) {$this->nombre = $nombre;}
        if ($apellido != null) {$this->apellido = $apellido;}
        if ($perfil != null) {$this->perfil = $perfil;}
    }*/

    public static function Verificar($user, $psw){
        $retorno = false;

        if (strcmp($user,"root")== 0 && strcmp($psw,"")== 0) {
            $retorno = true;
        }

        return $retorno;
    }

    public function Traer($id = null){
        $retorno = null;
        if($id != null){
            $conexion = AccesoDatos::DameUnObjetoAcceso();
            if($conexion != null){
                //echo "conexion exitosa.<br/>";
            $sql = "SELECT * FROM usuarios WHERE id= :id";

            $recupero = $conexion->RetornarConsulta($sql);

            $recupero->bindValue(":id",$id,PDO::PARAM_INT);

            // Probar despues con FETCH_CLASS

            $recupero->execute();

            //$recupero->setFetchMode(PDO::FETCH_OBJ,'Usuario');
            $retorno = $recupero->fetchObject("Usuario");                                                

            }
            else {
                echo "no se pudo establecer conexion con la base";
            }

        }
       return $retorno; 
    }

    public function TraerTodos(){
        $retorno = array();
            $conexion = AccesoDatos::DameUnObjetoAcceso();
            if($conexion != null){
                //echo "conexion exitosa.<br/>";
            $sql = "SELECT * FROM usuarios";

            $recupero = $conexion->RetornarConsulta($sql);
            
            $recupero->execute();

            $recupero->setFetchMode(PDO::FETCH_INTO, new Usuario);
            
            foreach ($recupero->fetchall() as $usuario) {
                array_push($retorno,$usuario);
            }

            }
            else {
                echo "no se pudo establecer conexion con la base";
            }

       return $retorno; 
    }

    public static function Eliminar($id){
        $retorno = false;
            $conexion = AccesoDatos::DameUnObjetoAcceso();
            if($conexion != null){

                $sql = "DELETE FROM usuarios WHERE id= :id";

                $recupero = $conexion->RetornarConsulta($sql);

                $recupero->bindValue(":id",$id,PDO::PARAM_INT);

                $retorno = $recupero->execute();
            }
            else {
                echo "no se pudo establecer conexion con la base";
            }

       return $retorno; 
    }

    public static function Agregar($obj){
        $retorno = false;
            $conexion = AccesoDatos::DameUnObjetoAcceso();
            if($conexion != null){

                $sql = "INSERT INTO usuarios (correo,clave,nombre,apellido,perfil) VALUES (:correo,:clave,:nombre,:apellido,:perfil)";

                $recupero = $conexion->RetornarConsulta($sql);

                $recupero->bindValue(':correo', $obj->correo, PDO::PARAM_STR);
                $recupero->bindValue(':clave', $obj->clave, PDO::PARAM_STR);
                $recupero->bindValue(':nombre', $obj->nombre, PDO::PARAM_STR);
                $recupero->bindValue(':apellido', $obj->apellido, PDO::PARAM_STR);
                $recupero->bindValue(':perfil', $obj->perfil, PDO::PARAM_INT);

                $retorno = $recupero->execute();
 
            }
            else {
                echo "no se pudo establecer conexion con la base";
            }

       return $retorno; 
    }

    public static function Modificar($obj){
        $retorno = false;
            $conexion = AccesoDatos::DameUnObjetoAcceso();
            if($conexion != null){

                $sql = "UPDATE usuarios SET correo= :correo, clave= :clave, nombre=:nombre, apellido = :apellido, perfil = :perfil WHERE id = $obj->id";

                $recupero = $conexion->RetornarConsulta($sql);

                $recupero->bindValue(':correo', $obj->correo, PDO::PARAM_STR);
                $recupero->bindValue(':clave', $obj->clave, PDO::PARAM_STR);
                $recupero->bindValue(':nombre', $obj->nombre, PDO::PARAM_STR);
                $recupero->bindValue(':apellido', $obj->apellido, PDO::PARAM_STR);
                $recupero->bindValue(':perfil', $obj->perfil, PDO::PARAM_INT);

                $retorno = $recupero->execute();
            }
            else {
                echo "no se pudo establecer conexion con la base";
            }

       return $retorno; 
    }

}







