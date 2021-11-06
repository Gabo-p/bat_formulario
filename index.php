<?php
function limpiarDatos($datos)
{
    $datos = trim($datos);
    $datos = stripslashes($datos);
    $datos = htmlspecialchars($datos);
    return $datos;
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $correo = 'INGRESE UN CORREO AQUI';
    $asunto = '¡Una persona ha llenado el formulario!';

    $contenido = '<b> Nombre:' . limpiarDatos($_POST['nombre']) . '</b><br/>';
    $contenido .= '<b> Correo:' . limpiarDatos($_POST['correo']) . '</b><br/>';
    $contenido .= '<b> Identificación:' . limpiarDatos($_POST['identificacion']) . '</b><br/>';
    $contenido .= '<b> Numero de Compra:' . limpiarDatos($_POST['numcompra']) . '</b><br/>';
    $contenido .= '<b> EIDCOM:' . limpiarDatos($_POST['edicom']) . '</b><br/>';
    $contenido .= '<b> Numero de Factura:' . limpiarDatos($_POST['numfactura']) . '</b><br/>';
    $contenido .= '<b> Fecha:' . limpiarDatos($_POST['fechaemision']) . '</b><br/>';
    $contenido .= '<b> Mensaje Adicional:' . limpiarDatos($_POST['adicional']) . '</b><br/>';


    $headers = 'From:' . $correo;
    $headers .= 'Content-type:text/html;charset=UTF-8';


    mail($correo, $asunto, $contenido, $headers);
}


?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php if (!isset($_GET['lang'])  || $_GET['lang'] == 'ing') :?>
        <title>Queries - Bat Supplier</title>
    <?php else:?>
        <title>Consultas - Bat Supplier</title>
    <?php endif;?>
    <link rel="icon" href="https://batsupplier.com/wp-content/uploads/2020/05/cropped-Blue-Logo-192x192.png" sizes="192x192">
    <!-- Link de fontawesome icons -->
    <link rel="stylesheet" href="fontawesome/css/all.css">
    <!-- Link de fontawesome icons -->
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="./fonts/Aeroport Medium.otf">
    <link rel="stylesheet" href="./fonts/Aeroport.otf">

</head>

<body>

    <?php 
        if(!isset($_GET['lang']) || $_GET['lang'] == 'ing'){
            include_once './ing.php';
        }else{
            include_once './esp.php';
        }
        
        
        
        
        
        
    ?>

    



    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="script.js"></script>
    

</body>

</html>