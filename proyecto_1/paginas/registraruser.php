<?php
include 'functions.php';

$message = "";
    if(!empty($_REQUEST['status'])) {
        switch($_REQUEST['status']) {
            case 'success':
                $message = 'Usuario Registrado Correctamente';
            break;
            case 'error':
                $message = 'There was a problem inserting the user';
            break;
            case 'errorv':
                $message = 'Faltan datos';
            break;
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">

<title>Registrarse</title>
</head>
<body>
<div class="container">
<div class="msg">
<?php echo $message; ?>
</div>
<form action="createuser.php" method="POST" class="form-inline" role="form">
<p>
<div class="form-group">
<label class="sr-only" for="">Usuario</label>
<input type="text" class="form-control" id="" name="usuario" placeholder="Usuario" required>
</div>
</p>
<p>
<div class="form-group">
<label class="sr-only" for="">Nombre</label>
<input type="text" class="form-control" id="" name="nombre" placeholder="Nombre" required>
</div>
</p>
<p>
<div class="form-group">
<label class="sr-only" for="">Apellidos</label>
<input type="text" class="form-control" id="" name="apellidos" placeholder="Apellidos" required>
</div>
</p>
<p>
<div class="form-group">
<label class="sr-only" for="">Número_Telefono</label>
<input type="text" class="form-control" id="" name="numero_telefono" placeholder="Numero_telefono" required>
</div>
</p>
<p>
<div class="form-group">
<label class="sr-only" for="">Email</label>
<input type="text" class="form-control" id="" name="email" placeholder="Email" required>
</div>
</p>
<p>
<div class="form-group">
<label class="sr-only" for="">Dirección</label>
<input type="text" class="form-control" id="" name="dirrecion" placeholder="Direccion" required>
</div>
</p>
<p>
<div class="form-group">
<label class="sr-only" for="">Password</label>
<input type="password" class="form-control" id="" name="password" placeholder="Password" required>
</div>
<p><p>
<button type="submit" class="btn btn-primary">Guardar</button>
</form>
</body>
</html>