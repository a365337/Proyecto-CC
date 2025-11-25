<?php
    session_start();
    if(!isset($_SESSION["logueado"]) || $_SESSION["logueado"] !== true){
        header("Location: index.php?error=2");
        exit();
    }elseif(isset($_COOKIE["usuario"]) && isset($_COOKIE["pass"]) && 
        ($_COOKIE["usuario"] != $_SESSION["usuario"] || $_COOKIE["pass"] != $_SESSION["pass"])){
        header("Location: index.php?error=2");
        exit();
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Proyecto CC - Selección</title>
  <style>
    body {
      margin: 0;
      padding: 0;
      font-family: "Inter", sans-serif;
      background: #a8afceff;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }

    .login-container {
      background: #ffffff;
      width: 350px;
      padding: 30px;
      border-radius: 20px;
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
      text-align: center;
    }

    h1 {
      font-size: 24px;
      margin-bottom: 25px;
      color: #222;
    }

    .input-group {
      text-align: left;
      margin-bottom: 18px;
    }

    label {
      font-size: 14px;
      color: #444;
    }

    .remember {
      display: flex;
      align-items: center;
      gap: 8px;
      font-size: 14px;
      margin: 10px 0 20px 0;
      color: #555;
    }

    button {
      width: 100%;
      padding: 12px;
      background: #4b7bec;
      border: none;
      border-radius: 12px;
      color: white;
      font-size: 15px;
      cursor: pointer;
      transition: 0.2s;
    }

    button:hover {
      background: #3867d6;
    }

    .cmb {
      text-align: left;
      margin-bottom: 18px;
    }

    .cmb label {
      font-size: 14px;
      color: #444;
    }

    .cmb select {
      width: 100%;
      padding: 10px;
      margin-top: 6px;
      border: 1px solid #ddd;
      border-radius: 10px;
      font-size: 14px;
      background: #fff;
      transition: 0.2s;
      cursor: pointer;
    }

    .cmb select:focus {
      border-color: #4b7bec;
      outline: none;
      box-shadow: 0 0 4px rgba(75, 123, 236, 0.4);
    }
  </style>
</head>
<body>
  <div class="login-container">
    <h1>Selección</h1>
    <form method="post" action="comprobar_cookies.php">
        <div class="input-group">
        <label for="usuario">Usuario: <?php echo $_SESSION["usuario"]."</br>"; ?> </label>
        </div>

        <div class="cmb">
        <label for="pagina">Selecciona la página a ir</label>
        <select id="pagina" name="pagina" required>
            <option value="" disabled selected>Seleccione una opción.</option>
            <option value="personajes.php">Ver personajes</option>
            <option value="ingresar.php">Ingresar Personajes</option>
            <option value="archivos.php">Descargar Archivos</option>
        </select>
        </div>
        
        <button type="submit"> Ir a la página seleccionada </button>

    </form>
  </div>
</body>
</html>
