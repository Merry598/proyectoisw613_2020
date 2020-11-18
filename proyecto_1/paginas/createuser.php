<?php
include 'functions.php';

        if(isset($_POST['usuario']) && isset($_POST['nombre']) &&  isset($_POST['apellidos']) && isset($_POST['numero_telefono']) && isset($_POST['email']) && isset($_POST['dirrecion']) && isset($_POST['password'])) {
$Clfunctions= new Functions();

$saved = $Clfunctions-> saveUser($_POST);
echo "paso";
        if($saved) {
        header('Location:registraruser.php?status=success');
} else {
        header('Location:registraruser.php?status=error');
}
}else{
        header('Location: registraruser.php?status=errorv');
}