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

$id=$_GET['id'];
$id= anti_injection($id);

$deletar = query("DELETE FROM posts WHERE id_post = ".$id);

if($deletar==1)
{
	echo "Deletado! <a href='melissa.php'>voltar</a>";
}
else
{
	echo "Erro na hora de deletar os dados";
}

?>