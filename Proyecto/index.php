<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Proyecto CC - Login</title>
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

    input[type="text"],
    input[type="password"] {
      width: 100%;
      padding: 10px;
      margin-top: 6px;
      border: 1px solid #ddd;
      border-radius: 10px;
      font-size: 14px;
      transition: 0.2s;
    }

    input:focus {
      border-color: #4b7bec;
      outline: none;
      box-shadow: 0 0 4px rgba(75, 123, 236, 0.4);
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
    <?php
      session_start();
      if (isset($_GET['error']) && $_GET['error'] == 2) {
            echo '<p style="color: red; margin-top: 15px;">No se encuentra la sesión.</p>';
            setcookie("usuario", "", time() - 100000);
            setcookie("pass", "", time() - 100000);
            $_SESSION = [];
      }elseif(isset($_COOKIE["usuario"]) && isset($_COOKIE["pass"])){
          header("Location: autentica.php");
          exit();
      }
    ?>
    <h1>Proyecto CC</h1>

    <form method="post" action="autentica.php">
        <div class="input-group">
        <label>Usuario</label>
        <input type="text" placeholder="Ingresa tu usuario" name="usuario" required/>
        </div>

        <div class="input-group">
        <label>Contraseña</label>
        <input type="password" placeholder="Ingresa tu contraseña" name="pass" required/>
        </div>

        <div class="remember">
        <input type="checkbox" name="recordar"/>
        <label for="recordar">Recordar usuario</label>
        </div>

        <button type="submit">Iniciar Sesión</button>
    </form>
    <?php
      if (isset($_GET['error']) && $_GET['error'] == 1) {
          echo '<p style="color: red; margin-top: 15px;">Usuario o contraseña incorrectos.</p>';
      }
    ?>
  </div>
</body>
</html>
