<?php
include './paginas/functions.php';

$message = "";
    if(!empty($_REQUEST['status'])) {
        switch($_REQUEST['status']) {
            case 'errord':
                $message = 'Usuario No Existe';
            break;
            case 'errorLogin':
                $message = 'Usuario No Existe';
            break;

        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
<link rel="stylesheet" href="css/style.css">

<title>Document</title>
</head>
<body>
<div class="container">
<div class="msg">
<?php echo $message; ?>
</div>
<section>
<h1>Inicio de Sesión</h1>
<form action="./paginas/login.php" method="POST"  class="form-inline" role="form"> 
<table>
<tr><td rowspan="6"><img  src="imagenes/shopping.png"/></td><td><label>Usuario</label></td></tr>
<tr><td><input type="text" name="usuario" class="contra"required ></td></tr>
<tr><td><label>Password</label></td></tr>
<tr><td><input type="password" name="password" class="usuario" required /> </td></tr>
<tr><td><input type="submit" value="Ingresar"  class="btnaceptLo"   /> </td></tr>
<tr><td><a href="./paginas/registraruser.php" ><label>Registrar</label></a></tr>
</table>
</form>
</section>
</body>
</html>