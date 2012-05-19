<?php
session_start();
?>
<meta charset="utf-8">
<?php

if(!isset($_SESSION['cont_material']))
{
	$_SESSION['cont_material']=0;
}
require "../functions/sql.php";
require "../functions/valida_email.php";
require "../functions/anti_injection.php";
require "../includes/conexao.php";

$nome = $_POST['nome'];
$nome = anti_injection($nome);
$email = $_POST['email'];
$email = anti_injection($email);
$frase = $_POST['frase'];
$frase = anti_injection($frase);

$data = date("Y-m-d H:i:s");

if($_SESSION['cont_material'] >5)
{
echo "<div class='alert alert-error'>Você já mandou muitas frases, por favor aguarde um pouco para poder mandar mais.</div>";
echo "
  <div class='modal-footer'>
    <a href='#' class='btn' data-dismiss='modal'>OK</a>
  </div>";
exit;
}

if($nome =="")
{
echo "<div class='alert alert-error'>O campo <b>Nome</b> não pode ficar em branco!</div>";
echo "
  <div class='modal-footer'>
    <a href='#' class='btn' data-dismiss='modal'>OK</a>
  </div>";
exit;
}
if($email=="")
{
echo "<div class='alert alert-error'>O campo <b>Email</b> não pode ficar em branco!</div>";
echo "
  <div class='modal-footer'>
    <a href='#' class='btn' data-dismiss='modal'>OK</a>
  </div>";
exit;
}
elseif(!valida_email($email))
{
echo "<div class='alert alert-error'>O email que você digitou não é valido!</div>";
echo "
  <div class='modal-footer'>
    <a href='#' class='btn' data-dismiss='modal'>OK</a>
  </div>";
exit;
}
if($frase=="")
{
echo "<div class='alert alert-error'>O campo <b>Frase</b> não pode ficar em branco!</div>";
echo "
  <div class='modal-footer'>
    <a href='#' class='btn' data-dismiss='modal'>OK</a>
  </div>";
exit;
}

$insere = query("INSERT INTO material_users(nome_user_material,email_user_material,frase,data_material)VALUES('".$nome."','".$email."','".$frase."','".$data."')");

if($insere==1)
{
	$_SESSION['cont_material']++;
	echo "<div class='alert alert-info'><span class='badge badge-info'>Obrigado!</span> Sua frase foi enviada com sucesso!</div>";
echo "
  <div class='modal-footer'>
    <a href='#' class='btn' data-dismiss='modal'>OK</a>
  </div>
";
}
else
{
	echo "<div class='alert alert-error'>Ocorreu um erro =[</div>";
}
?>
