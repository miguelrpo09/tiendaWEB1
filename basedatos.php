<?php

class BaseDatos{


    public $usuarioBD="root";
    public $passwordBD="";

    public function __construct(){}



    public function conectarBD(){


        $datosBD="mysql:host=localhost;dbname=tiendaweb1";

        $conexionBD= new PDO($datosBD,$this->usuarioBD,$this->passwordBD);


        
        try{
            $datosBD="mysql:host=localhost;dbname=tiendaweb1";
            $conexionBD= new PDO($datosBD,$this->usuarioBD,$this->passwordBD);
            
            return($conexionBD);

        }catch(PDOException $error){

            echo($error->getMessage( ));

        }
        
    }
    
    public function agregarDatos($consultaSQL){

        
        $conexionBD=$this->conectarBD();

        
        $insertarDatos=$conexionBD->prepare($consultaSQL);     
        $resultado=$insertarDatos->execute();
        
        if ($resultado){
            echo("Producto registrado con exito");
            header("refresh:3;url=http://localhost/tiendaWEB1/formulario.php");
        }else{
            echo("Error al ingresar el producto");
        }
    }

    public function consultadatos($sql){

        $conexionBD=$this->conectarBD();

        $lista_productos=$conexionBD->prepare($sql);
        $run=$lista_productos->execute();
        return $lista_productos->fetchAll(PDO::FETCH_ASSOC);

    }

}

?>