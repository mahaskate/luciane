<?php
session_start();
if(isset($_SESSION['valida']))
{
	echo "Você já está logado";
	header("location:http://www.patricinhasezumbis.com.br/fab/central.php");
	exit("Falha");
}
?>
<!DOCTYPE html>
<html dir="ltr" lang="pt">
<head>
	<title>Criação e resultados</title>
	<meta charset="utf-8">
	<meta name="author" content="Muffin">
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
        <link rel="stylesheet" href="css/sample.css" type="text/css" media="screen" charset="utf-8">
	<link rel="stylesheet" href="../css/bootstrap.min.css" type="text/css" media="screen" charset="utf-8">
	<link rel="stylesheet" href="../css/estilo.css" type="text/css" media="screen" charset="utf-8">

	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript" charset="utf-8"></script>
	<script src="../js/bootstrap.min.js" type="text/javascript" charset="utf-8"></script>

<!-- JQUERY -->

</head>
<body>
<div class="container well2" id="myModal">
  <div class="modal-header">
    <h3>Logar</h3>
  </div>
  <div class="modal-body" style="height:auto;">
  
  <?
if($_POST)
{
	require "../includes/conexao.php";
require "../functions/sql.php";
require "../functions/anti_injection.php";
	
	$email = $_POST['email'];
	$email = anti_injection($email);
	$senha = $_POST['senha'];
	$senha = anti_injection($senha);
	
	$verifica = query ("SELECT * from users WHERE email_user='".$email."' AND senha_user='".$senha."'"); 
	$i = mysql_fetch_array($verifica);
	$conta = mysql_num_rows ($verifica);
	
	if($conta == 1)
	{

		/*VALIDAR LOGIN*/
		$_SESSION['valida'] = 1;
			
		echo "logado com sucesso, redirecionando..";
		header("location:central.php");
		exit();
	}
	else
	{
		echo "<div class='alert alert-error'>Usuário ou senha errados</div>";
	}
	
}

?>
  
<br>

	<div class="pull-left">
		<form action="" method="post">
			<input type="text" name="email" placeholder="Login">
            <br>
			<input type="password" placeholder="Senha" name="senha" id="senha">
    </div>
  </div>
  <div class="modal-footer">
    <input type="submit" class="btn btn-primary" value="Entrar">
	</form>

  </div>



</body>
</html>
