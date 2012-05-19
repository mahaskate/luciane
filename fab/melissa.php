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

</head>
<body>

<?php
require "../includes/conexao.php";
require "../functions/sql.php";
?>

<div class="container well well2">

<h2>Conteudo dos usuários</h2>
<hr>

<div class="tabbable">
  <ul class="nav nav-tabs">
	<li class="active"><a href="#1" data-toggle="tab">Posts</a></li>
    <li class=""><a href="#2" data-toggle="tab">Mensagens</a></li>
    <li><a href="#3" data-toggle="tab">Material</a></li>
  </ul>
  <div class="tab-content">
    <div class="tab-pane active well well2" id="1">
		<?php
            $sel = query("SELECT * FROM posts ORDER BY data_post DESC");
            $conta = conta($sel);
    
    if($conta>0)
    {
    echo "
    <table class='table table-striped table-condensed'>
      <thead>
        <tr>
          <th>Titulo</th>
          <th>Imagem</th>
          <th>Ação</th>
        </tr>
      </thead>
      <tbody>";
            while($i=fetch_assoc($sel))
            {
    
    echo "
        <tr>
          <td><a href='http://www.patricinhasezumbis.com.br/post/".$i['id_post']."' target='_blank'>".$i['titulo_post']."</a></td>
          <td>".$i['foto_post']."</td>
          <td><a href='ok-deletar-post.php?id=".$i['id_post']."'>Excluir</a> . <a href='editar-post.php?id=".$i['id_post']."'>Editar</a></td>
        </tr>
    
    ";
    }
    
    echo"
    </tbody>
    </table>";
    }
    else
    {
        echo "O site ainda não tem nenhum post";
    }
    ?>
    </div>
    <div class="tab-pane well well2" id="2">
      
	<?php
		$sel = query("SELECT * FROM mensagens ORDER BY data_msg DESC");
		$conta = conta($sel);

if($conta>0)
{
echo "
<table class='table table-striped table-condensed'>
  <thead>
    <tr>
      <th>Nome</th>
      <th>Assunto</th>
      <th>Mensagem</th>
    </tr>
  </thead>
  <tbody>";
		while($i=fetch_assoc($sel))
		{

echo "
    <tr>
      <td>".$i['nome_user_msg']." (".$i['email_user_msg'].")</td>
      <td>".$i['assunto_msg']."</td>
      <td>".$i['mensagem']."</td>
    </tr>

";
}

echo"
</tbody>
</table>";
}
else
{
	echo "O site ainda não recebeu nenhuma mensagem";
}
?>

    </div>
    <div class="tab-pane well well2" id="3">

	<?php
		$sel = query("SELECT * FROM material_users ORDER BY data_material DESC");
		$conta = conta($sel);

if($conta>0)
{
echo"
<table class='table table-striped table-condensed'>
  <thead>
    <tr>
      <th>Nome</th>
      <th>Frase</th>
    </tr>
  </thead>
  <tbody>
";


		while($i=fetch_assoc($sel))
		{


echo "
    <tr>
      <td>".$i['nome_user_material']." (".$i['email_user_material'].")</td>
      <td>".$i['frase']."</td>
    </tr>
";
}
echo"
  </tbody>
</table>
";
}
else
{
	echo "O site ainda não recebeu nenhum material.";
}
	?>

    </div>
  </div>
</div>

</div>
</body>
</html>
