<?php
session_start();
if(!isset($_SESSION['valida']))
{
	echo "Você não pode acessar essa parte";
	header("location:http://www.patricinhasezumbis.com.br");
	exit("Falha");
}

?>
<meta charset="utf-8">
<?php
require "../includes/conexao.php";
require "../functions/sql.php";
require "../functions/anti_injection.php";

$id=$_POST['id'];
$id= anti_injection($id);
$titulo=$_POST['titulo'];
$titulo= anti_injection($titulo);
$foto=$_POST['foto'];
$foto=anti_injection($foto);
$data = date("Y-m-d H:i:s");

$editar = query("UPDATE posts SET titulo_post = '".$titulo."' , foto_post = '".$foto."' WHERE id_post = ".$id);

if($editar==1)
{
	echo "Editado! <a href='melissa.php'>voltar</a>";
}
else
{
	echo "Erro na hora de salvar os dados";
}

?>