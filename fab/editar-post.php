<?php
session_start();
if(!isset($_SESSION['valida']))
{
	echo "Você não pode acessar essa parte";
	header("location:http://www.patricinhasezumbis.com.br/fab/");
	exit("Falha");
}
?>
<!DOCTYPE html>
<html dir="ltr" lang="pt">
<head>
	<title>Criar Post</title>
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

<script type="text/javascript" charset="utf-8">

$(document).ready(function() {

		$("#foto").keyup(function() {
			var foto = $("#foto").val();
			$('#preview-foto').attr('src',foto);
		});	
	});	
</script>

</head>
<body>
<?php
require "../includes/conexao.php";
require "../functions/sql.php";
require "../functions/anti_injection.php";

			$id = $_GET['id'];
			
            $sel = query("SELECT * FROM posts WHERE id_post = ".$id." ORDER BY data_post DESC");
            $conta = conta($sel);
			$i = fetch_assoc($sel);
?>
<div class="container well2" id="myModal">
  <div class="modal-header">
    <h3>Criar novo post</h3>
  </div>
  <div class="modal-body" style="height:auto;">
 <h6><?php echo date("d/m/Y")." - ".date("h:i:s");?></h6>
<br>

	<div class="pull-left">
		<form action="ok-editar-post.php" method="post">
			<input type="text" name="id" value="<?php echo $i['id_post'];?>" readonly>
            <br>
			<input type="text" name="titulo" value="<?php echo $i['titulo_post'];?>">
            <br>
			<input type="text" name="foto" id="foto" value="<?php echo $i['foto_post'];?>">
    </div>
  </div>
  <div class="modal-footer">
    <a href="index.php" class="btn" data-dismiss="modal">Cancelar</a>
    <input type="submit" class="btn btn-primary" value="Editar">
	</form>

  </div>
</div>

</body>
</html>
