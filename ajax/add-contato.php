<?php
session_start();
?>
<meta charset="utf-8">
<?php
if(!isset($_SESSION['cont_contato']))
{
	$_SESSION['cont_contato']=0;
}


require "../functions/sql.php";
require "../functions/valida_email.php";
require "../functions/anti_injection.php";
require "../includes/conexao.php";

$nome = $_POST['nome'];
$nome = anti_injection($nome);
$email = $_POST['email'];
$email = anti_injection($email);
$assunto = $_POST['assunto'];
$assunto = anti_injection($assunto);
$mensagem = $_POST['mensagem'];
$mensagem = anti_injection($mensagem);

$data = date("Y-m-d H:i:s");

//validação

if($_SESSION['cont_contato'] >3)
{
echo "<div class='alert alert-error'>Você já mandou muitas mensagem, por favor aguarde um pouco para poder mandar mais.</div>";
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
if($assunto=="")
{
echo "<div class='alert alert-error'>O campo <b>Assunto</b> não pode ficar em branco!</div>";
echo "
  <div class='modal-footer'>
    <a href='#' class='btn' data-dismiss='modal'>OK</a>
  </div>";
exit;
}
if($mensagem=="")
{
echo "<div class='alert alert-error'>O campo <b>Mensagem</b> não pode ficar em branco!</div>";
echo "
  <div class='modal-footer'>
    <a href='#' class='btn' data-dismiss='modal'>OK</a>
  </div>";
exit;
}


$insere = query("INSERT INTO mensagens(nome_user_msg,email_user_msg,assunto_msg,mensagem,data_msg)VALUES('".$nome."','".$email."','".$assunto."','".$mensagem."','".$data."')");

if($insere==1)
{
	$_SESSION['cont_contato']++;

	echo "<div class='alert alert-info'>Sua mensagem foi enviado com sucesso!</div>";
echo "
  <div class='modal-footer'>
    <a href='#' class='btn' data-dismiss='modal'>OK</a>
  </div>
";
}
else
{
	echo "<div class='alert alert-error'>Sua mensagem foi enviado com sucesso!</div>";
}
?>
