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

<div class="container well2" id="myModal">
  <div class="modal-header">
    <h3>Criar novo post</h3>
  </div>
  <div class="modal-body" style="height:auto;">
 <h6><?php echo date("d/m/Y")." - ".date("h:i:s");?></h6>
<br>

	<div class="pull-left">
		<form action="ok-novo-post.php" method="post" enctype="multipart/form-data">
			<input type="text" name="titulo" placeholder="Titulo">
            <br>
			<input type="text" placeholder="Link da foto" name="foto" id="foto">
    </div>
<div class="pull-right span7" id="preview">
<img src="" id="preview-foto" class="span6">
</div>
  </div>
  <div class="modal-footer">
    <a href="index.php" class="btn" data-dismiss="modal">Cancelar</a>
    <input type="submit" class="btn btn-primary" value="postar">
	</form>

  </div>
</div>

</body>
</html>
