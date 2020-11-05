<?php

include('Basedatos.php');

if (isset($_POST["btnRegistrar"])){

    $nombreProducto=$_POST['Nombreproducto'];
    $marcaProducto=$_POST['marcaproducto'];
    $precioProducto=$_POST['precioProducto'];
    $descripcionProducto=$_POST['txAreaDescripcion'];

    $url_img = "img/" . basename($_FILES['imagenprod']['name']);
    $tamaño=$_FILES['imagenprod']['size'];
    $tipo=$_FILES['imagenprod']['type'];

    
    if (move_uploaded_file($_FILES['imagenprod']['tmp_name'],$url_img)) {
        $transaccion= new Basedatos();
        $consultaSQL="INSERT INTO productos(nombreProducto,marcaProducto,precioProducto,DescripcionProducto,urlImagen) VALUES ('$nombreProducto','$marcaProducto','$precioProducto','$descripcionProducto','$url_img')";
        $transaccion->agregarDatos($consultaSQL);
    } else {
       echo "<b>Ocurrio un error: ".$_FILES['imagenprod']['error'];
    }
    
    




}

?>