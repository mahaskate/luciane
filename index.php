<!DOCTYPE html>
<html dir="ltr" lang="pt">
<head>
	<title>Patricinhas e zumbis - Amizade colorida!</title>
    
	<meta charset="utf-8">
	<meta name="author" content="Patricinhas e Zumbis, @MayhemFabulous">
	<meta name="description" content="Feito exclusivamente para meninas com classe e qualquer tipo de Zumbi por que nós somos simplesmente... FABULOSOS!" />
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
$("#myModal").load('/modais/contato.php');
		});	
		$("a#material").click(function() {
$("#myModal").load('/modais/enviar-material.php');
		});	
	$("a#sobre").click(function() {
$("#myModal").load('/modais/sobre.php');
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

<!--BARRA DO FOOTER QUE APARECE QUANDO ROLA PRA BAIXO ATENÇÃO! VEM PRIMEIRO PARA CARREGAR O BG DA BARRA, CASO CONTRARIO ELA AOARECE SE O FUNDO PQ EH A ULTIMA COISA A CARREGAR-->
<?php require "includes/mini-top.php";?>

<!--CARREGA JANELAS MODAIS-->
<div class="modal fade" id="myModal">
<div class='well'>carregando...</div>
</div>

<!--TOPO-->
<?php require"includes/topo.php";?>

<div class="container well well2" style="margin-bottom:70px;">
	<div class="row-fluid">
		<div class="span8 pull-left">
			 <?php
                require"includes/conexao.php";
                require"functions/sql.php";
                require"functions/data_post.php";
                require"functions/anti_injection.php";
                
                $diretorio = "http://dl.dropbox.com/u/51158120/PZ/";
				$dominio = "http://www.patricinhasezumbis.com.br/";
				
                $max = 15; // Quantos registros por página vai ser mostrado
                $sql_conta = mysql_query("SELECT * FROM posts");
                $total = mysql_num_rows($sql_conta); // Quantidade de registros pra paginação
            
                    if(isset($_GET['pg']))
                    {
                        $pg = anti_injection($_GET['pg']);
                    }
                    else
                    {
                        $pg =1;
                    }
                    $pgs = ceil($total / $max);
                    //PROTEÇÃO PRO CARA NÃO DIGITAR QUALQUER MERDA
                    if(!is_numeric($pg)|| $pg<=0||$pg>$total)
                    {
						header('location:http://www.patricinhasezumbis.com.br/404');
						exit("Página não existe! - <a href='http://www.patricinhasezumbis.com.br'>Voltar</a>");
                    }
                    $inicial = $pg-1;
                    $inicial = $inicial * $max;
            
					$url = $_SERVER['REQUEST_URI'];
					$url=explode("/",$url);					
                if(isset($_GET['aleatorio']))
                {
					$aleatorio=1;
                    $sel = query("SELECT * FROM posts ORDER BY RAND() LIMIT 15");
                }
                else
                {
                    $sel = query("SELECT * FROM posts ORDER BY data_post DESC LIMIT ".$inicial.", ".$max);
                }
            
            $conta = conta($sel);
                if($conta>0)
				{
					require "functions/encurtar_url.php";
				
					while($i = fetch_assoc($sel))
					{
					  echo "
						<div class='well well2 pull-left' style='width:30px;text-align:center;background:white;'>
							<div style='margin-left:-7px;margin-top:-10px;clear:both;'>
								<a href='http://www.facebook.com/sharer.php?u=".$dominio."post/".$i['id_post']."&t=testedetitulo'  target='_blank'><img src='/img/fb-circle.png' style='width:50px;' class='tt' title='Compartilhar no Facebook'></a>
					<div style='clear:both;'></div>
				
								<a href='https://twitter.com/share?text=-&nbsp&url=".$dominio."post/".$i['id_post']."&via=patyzumbi' target='_blank' class='ttb'><img src='/img/tw-circle.png' width='50' title='Compartilhar no Twitter' class='ttb'></a>
				
						</div>
				
						</div>
						<div class='thumbnails pull-right' style='width:535px;'>
						   <a href='post/".$i['id_post']."'target='_blank' class='thumbnail'><img src='".$diretorio.$i['foto_post']."' width='535' class='preload-img' style='width:535px;min-height:350px;'/></a>
							 <h5 style='margin:10px 0 5px 0;'><span class='label label-info'>Postado ".data_post($i['data_post'])."</span></h5>
						</div>
						<br style='clear:both;'>
						   <hr>
						";
					}
            }
            else
            {
                echo "<div class='well well2 pull-left' style='width:580px;'>Esse site ainda não tem nenhum post.</div>";
                echo "		<br style='clear:both;'>
                       <hr>";
            }
                ?>
            <ul class="pager">
                <?php
				if(isset($_GET['aleatorio']))
				{
				}
				else
				{
                if($conta>0 && $max<$total)
                {
					if($pg==1)
					{
						echo "<li class='previous'><a href='http://www.patricinhasezumbis.com.br/pagina/".($pg+1)."'>&larr; Mais antigos</a></li>";
					}
					else if($pg==$pgs)
					{
						echo "<li class='next'><a href='http://www.patricinhasezumbis.com.br/pagina/".($pg-1)."'>Mais recentes &rarr;</a></li>";
					}
					else
					{
						echo "<li class='previous'><a href='http://www.patricinhasezumbis.com.br/pagina/".($pg+1)."'>&larr; Mais antigos</a></li>";
						echo "<li class='next'><a href='http://www.patricinhasezumbis.com.br/pagina/".($pg-1)."'>Mais recentes &rarr;</a></li>";
					}
                }
				}
                ?>
            </ul>
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
</body>
</html>