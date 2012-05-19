<meta charset="utf-8">

<ul class="nav nav-list" style="margin-bottom:20px;">
    <li class="<?php if(!isset($_GET['aleatorio'])){echo "active";}?>">
    <a href="http://www.patricinhasezumbis.com.br"><i class="icon-time <?php if(!isset($_GET['aleatorio'])){echo "icon-white";}?>"></i> Últimos posts</a>
	    </li>
    <li class="<?php if(isset($_GET['aleatorio'])){echo "active";}?>">
    	<a href="http://www.patricinhasezumbis.com.br/aleatorio"><i class="icon-random <?php if(isset($_GET['aleatorio'])){echo "icon-white";}?>"></i> Posts aleatórios</a>
    </li>
</ul>