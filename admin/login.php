<!DOCTYPE html>
<html>

<head>
	<title>LOGIN</title>

  <link rel="stylesheet" type="text/css" href="../css/estilos.css">
  <link rel="stylesheet" type="text/css" href="../css/estilos-index.css">
  <script type="text/javascript" src="../js/jquery-2.2.3.js"></script>

</head>

</body>
<form action="validarUsuario.php" method="POST">
            <table>
              <tr>
								<td>Usuario</td>
								<td><input required type="text" name="txt_usuario"> </td>
								</tr>
              <tr>
								<td>Clave</td>
								<td><input required type="password" name="txt_clave"> </td>
								</tr>
              <tr>
								<td><input type="submit" value="Entrar"></td>
								</tr>
            </table>
    </form>

</html>
