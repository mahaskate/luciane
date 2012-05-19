<?php

                require"includes/conexao.php";
                require"functions/sql.php";
                require"functions/anti_injection.php";
				
                $diretorio = "http://dl.dropbox.com/u/51158120/PZ/";
                    
                $url = $_SERVER['REQUEST_URI'];
				$url = explode("/",$url);
				$id=$url[2];
				//TRATA STRING PRO CARA AUM DIGITAR QUALQUER MERDA
				$id = anti_injection($id);
                    if(!is_numeric($id) || isset($url[3]))
                    {
						header('location:http://www.patricinhasezumbis.com.br/404');
						exit("Página não existe! - <a href='http://www.patricinhasezumbis.com.br'>Voltar</a>");
                    }
					
                $sel = query("SELECT * FROM posts WHERE id_post=".$id);
				$conta = conta($sel);
								if($conta!=1)
				{
						header('location:http://www.patricinhasezumbis.com.br/404');
						exit("Página não existe! - <a href='http://www.patricinhasezumbis.com.br'>Voltar</a>");
				}
                $i = fetch_assoc($sel);

?>
<!DOCTYPE html>
<html dir="ltr" lang="pt">
<head>
	<title>Patricinhas e zumbis - <?php echo $i['titulo_post'];?></title>
    
	<meta charset="utf-8">
	<meta name="author" content="Patricinhas e Zumbis, @MayhemFabulous">
	<meta name="description" content="Mais um post fabuloso! <?php echo $i['titulo_post'];?>" />
	<meta name="keywords" content="Diversão, Humor, Irônia, Patricinhas, Zumbis, Patricinhas e zumbis, Piada" />
    
	<link rel="shortcut icon" href="/img/favicon.ico" type="image/x-icon" />
	<link rel="stylesheet" href="/css/bootstrap.min.css" type="text/css" media="screen" charset="utf-8">
	<link rel="stylesheet" href="/css/estilo.css" type="text/css" media="screen" charset="utf-8">

	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript" charset="utf-8"></script>
	<script src="/js/bootstrap.min.js" type="text/javascript" charset="utf-8"></script>

<!-- JQUERY -->
<script type="text/javascript" charset="utf-8">

$(document).ready(function() {

		$("a#contato").click(function() {
$("#myModal").load('modais/contato.php');
		});	
		$("a#material").click(function() {
$("#myModal").load('modais/enviar-material.php');
		});	
	$("a#sobre").click(function() {
$("#myModal").load('modais/sobre.php');
		});
	$("a#post").click(function() {
$("#my").load('modais/post.php');
		});	

$(".tt").tooltip();
$(".ttb").tooltip({placement:'bottom'});
$(".ttl").tooltip({placement:'left'});
$(".ttr").tooltip({placement:'right'});

});

//rolagem backtop

$(window).scroll(function(){
    if($(window).scrollTop() > 300) {
        $('.mini-top').slideDown();
    }
	else
{        $('.mini-top').slideUp();}
});
</script>

<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-31126735-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>

</head>
<body>

<!--CARREGA JANELAS MODAIS-->
<div class="modal fade" id="my">
<div class='well'>carregando...</div>
</div>
<div class="modal fade" id="myModal">
<div class='well'>carregando...</div>
</div>

<!--TOPO--->
<?php require"includes/topo.php";?>

<div class="container well well2" style="margin-bottom:70px;">
	<div class="row-fluid">
		<div class="span8 pull-left">
                <div class="" style="margin-bottom:10px;">
                <?php include "includes/redes-sociais-post.php";?>
            
                </div>
                <div class="thumbnail" style="min-height:350px;">
	            	<img src="<?php echo $diretorio.$i['foto_post']?>" width=100%>
                </div>
            <hr>
		</div>
        
		<div style="clear:right;"></div>
        
       <!--CONTEUDO DA DIREITA-->
       <!--OPÇÕES DO MENU LATERAL E ICONES DE REDE SOCIAL-->
        <div class="well pull-right well2" style="width:250px;">    
            <?php require"includes/side-menu.php";?>
            <hr>
            <?php require"includes/redes-sociais-footer.php";?>
		</div>
        
       <div style="clear:right;"></div>
       <!--FOOTER, LINKS DE CONTATO, SOBRE ETC-->
       <div class="well pull-right well2" style="width:250px;"> 
		   <?php require"includes/footer.php";?>
       </div>
	</div>
</div>

<!--BARRA DO FOOTER QUE APARECE QUANDO ROLA PRA BAIXO-->
<?php require "includes/mini-top.php";?>
</body>
</html>