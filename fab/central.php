<?php
session_start();
if(!isset($_SESSION['valida']))
{
	echo "Você não pode acessar essa parte";
	header("location:http://www.patricinhasezumbis.com.br");
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

<?php require"topo.php";?>

<div class="container">
<div class="hero-unit">
<h1>Patricinhas e zumbis</h1>
<p>Area destinada para gerenciamento do blog.</>
<p>
<a href="novo-post.php" target="_blank" class="btn btn-primary btn-large" style="">Criar Post</a>
<a href="melissa.php" target="_blank" class="btn btn-large" style="">Melissa</a>
</p>
</div>

</body>
</html>
