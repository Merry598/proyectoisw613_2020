<?php
session_start();
include 'functions.php';
$Clfunctions= new Functions();
$user = $_SESSION['usuario'];
if ($user) {
    if (!$user || $user['Tipo'] == "admin") {
        header('Location: ../index.php');
    }
} else {
    header('Location: ../index.php');
}

$id_user=$user['id_usuario'];

?>

<title>Ver Compra</title>
</head>
<body>
<?php
require 'layout.php';
?>
<h1>Compra en Línea</h1>
<div class="container">
<button><a href="dashboarduser.php">Volver</a></button>
</div>
<div class="">  
<table >
<tbody>
    <tr class="head">
    <td>Fecha de Compra</td>
    <td>Total de la Orden</td>
    <td>Cantidad</td>
    <td>Precio</td>
    <td>Descripcion</td>
    <td>Imagen</td>   
</tr>
<?php
$ventasproduct = $Clfunctions-> getventaPedido($id_user);
$ventasproductHtml = "";
    foreach ($ventasproduct as $ventapro) {
        $ventasproductHtml .= "<td>{$ventapro['fecha']}</td><td>{$ventapro['total']}</td><td>{$ventapro['cantidad']}</td><td>{$ventapro['precio']}</td><td>{$ventapro['descripcion']}</td><td><img src='{$ventapro['imagen']}' width='200' height='200'> </td></tr>";
    }
echo $ventasproductHtml;

?>
</tbody>
</table>
</div>
</body>
</html>