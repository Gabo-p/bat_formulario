<?php
function limpiarDatos($datos)
{
    $datos = trim($datos);
    $datos = stripslashes($datos);
    $datos = htmlspecialchars($datos);
    return $datos;
}
$enviado = false;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {


    $to = 'Fsd_Ame@Bat.Com';
    $from = 'info@batsupplier.com';
    $subject = '¡Una persona ha llenado el formulario!';

    $headers  = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
    $headers .= 'From: '.$from."\r\n".
    'Reply-To: '.$from."\r\n" .
    'X-Mailer: PHP/' . phpversion();
    
    
    $contenido = '<b> Nombre:</b>' . limpiarDatos($_POST['nombre']) . '<br/>';
    $contenido .= '<b> Correo:</b>' . limpiarDatos($_POST['correo']) . '<br/>';
    $contenido .= '<b> Identificación:</b>' . limpiarDatos($_POST['identificacion']) . '<br/>';
    $contenido .= '<b> Numero de Compra:</b>' . limpiarDatos($_POST['numcompra']) . '<br/>';
    $contenido .= '<b> Numero de Factura:</b>' . limpiarDatos($_POST['numfactura']) . '<br/>';
    $contenido .= '<b> Fecha:</b>' . limpiarDatos($_POST['fechaemision']) . '<br/>';
    $contenido .= '<b> Mensaje Adicional:</b>' . limpiarDatos($_POST['adicional']) . '<br/>';
    
    if(mail($to, $subject, $contenido, $headers)){
        $enviado = true;
    } else{
        $enviado = false;
    }
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
    <div class="snackBar">
        Correo Enviado
    </div>
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