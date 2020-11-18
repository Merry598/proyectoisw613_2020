<?php
include 'functions.php';

session_start();

    if($_POST) {
        $usuario = $_REQUEST['usuario'];
        $password = $_REQUEST['password'];
        $Clfunctions= new Functions();
        $user =  $Clfunctions-> authenticate($usuario, $password);

    if($user) {
        $_SESSION['usuario'] = $user;
            if($user['Tipo']==="admin"){
                header('Location: dashboard.php');
}elseif($user['Tipo']==="user"){
                header('Location: dashboarduser.php');  
} else {
                header('Location: ../index.php?status=errord');
}
}else{
                header('Location: ../index.php?status=errorLogin');
}
}
?>