<meta charset="utf-8">

<script type="text/javascript" charset="utf-8">

$(document).ready(function() {

$("#enviar").click(function() {

var nome = $('#nome').val();
var email = $('#email').val();
var frase = $('#frase').val();

$(".modal-body").load('ajax/add-material.php',{nome:nome,email:email,frase:frase});

$(".modal-footer").hide();

});
	
});
</script>
<div class="modal" id="myModal">
  <div class="modal-header">
    <h3>Enviar material</h3>
  </div>
  <div class="modal-body">
    <form>
      <input type="text" placeholder="Nome" id="nome">
      <br>
      <input type="text" placeholder="Email" id="email">
      <br>
      <textarea id="frase" placeholder="Frase" class="span6" style="height:70px;"></textarea>
	<p class="help-block">Máximo 200 caracteres.</p>
    </form>
  </div>
  <div class="modal-footer">
	<a href='#' class='btn' data-dismiss='modal'>Cancelar</a>
    <button class="btn btn-primary" id="enviar">Enviar</button>
  </div>
</div>
