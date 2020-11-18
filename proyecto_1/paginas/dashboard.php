<?php
include 'functions.php';

session_start();
$user = $_SESSION['usuario'];
    if (!$user|| $user['Tipo'] ==="user") { 
        header('Location: ../index.php');
}
$cantClientes=0;
$cantProductos=0;
$Clfuncion= new Functions();

$clientes= $Clfuncion-> getClientes();
$productos= $Clfuncion-> getProductos();

    foreach($clientes as $cliente){
        $cantClientes+=1;
}
?>

<title>Registrarse</title>
</head>
<body>
<?php
require 'layout.php';
?>
<p>Bienvenido Administrador <?php echo $user['nombre']." ".$user['apellidos']; ?> </p>
<p>Cantidad de Clientes <?php echo  $cantClientes; ?> </p>

<a href="productos.php">Productos</a>
<a href="categorias.php">Categoria</a>

<div class="container">
</body>
</html>