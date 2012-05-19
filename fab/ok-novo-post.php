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

$titulo=$_POST['titulo'];
$titulo= anti_injection($titulo);
$foto=$_POST['foto'];
$foto=anti_injection($foto);
$foto = explode("/",$foto);
$foto = $foto[count($foto)-1];
$data = date("Y-m-d H:i:s");
$insere = query("INSERT INTO posts(foto_post,data_post,titulo_post)VALUES('".$foto."','".$data."','".$titulo."')");

if($insere==1)
{
	echo "Postado! <a href='novo-post.php'>voltar</a>";
}
else
{
	echo "Erro na hora de salvar os dados";
}

?>