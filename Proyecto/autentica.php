
<?php
    session_start();
    date_default_timezone_set("America/Mexico_City");

    $usuario = $_POST["usuario"];
    $password = $_POST["pass"];
    $pag = $_POST["pagina"];

    if((isset($_COOKIE["usuario"])) && (isset($_COOKIE["pass"]))){
        #if($usuario != $_COOKIE["usuario"] || $password != $_COOKIE["pass"]){
        #    header("Location: index.php?error=2");
        #    exit();
        #}

        $_SESSION["logueado"] = true;
        $_SESSION["usuario"] = $_COOKIE["usuario"];
        $_SESSION["pass"] = $_COOKIE["pass"];

        $usuario = $_COOKIE["usuario"];
        $password = $_COOKIE["pass"];

        $conexion = mysqli_connect("localhost", "root", "root", "proyecto_cc");
        $consulta = 'select * from Usuarios where usuario = "'.$usuario.'" and pass = "'.$password.'";';
        $resultado = mysqli_query($conexion, $consulta);
        $fila = mysqli_fetch_array($resultado);

        $usuario_db = $fila['usuario'];
        $password_db = $fila['pass'];

        if($usuario == $usuario_db && $password == $password_db){
            header("Location: bienvenida.php");
            exit();
        }
        else{
            header("Location: index.php?error=2");
            exit();
        }
    }


    $conexion = mysqli_connect("localhost", "root", "root", "proyecto_cc");
    $consulta = 'select * from Usuarios where usuario = "'.$usuario.'" and pass = "'.$password.'";';
    $resultado = mysqli_query($conexion, $consulta);
    $fila = mysqli_fetch_array($resultado);

    $usuario_db = $fila['usuario'];
    $password_db = $fila['pass'];

    

    if($usuario == $usuario_db && $password == $password_db){

        if(isset($_POST["recordar"])){
            setcookie("usuario", $usuario, time()+60*60*24);
            setcookie("pass", $password, time()+60*60*24);
        }

        $_SESSION["logueado"] = true;
        header("Location: bienvenida.php");
        exit();

    }else{
        header("Location: index.php?error=1");
        exit();
    }
?>