
	<meta charset="utf-8">

<script type="text/javascript" charset="utf-8">

$(document).ready(function() {

$("#enviar").click(function() {

var nome = $('#nome').val();
var email = $('#email').val();
var assunto = $('#assunto').val();
var mensagem = $('#mensagem').val();

$(".modal-body").load('ajax/add-contato.php',{nome:nome,email:email,assunto:assunto,mensagem:mensagem});

$(".modal-footer").hide();

});
	
});
</script>

<div class="modal" id="myModal">
  <div class="modal-header">
    <h3>Contato</h3>
  </div>
  <div class="modal-body">

	<form>
    	<input type="text" placeholder="Nome" id="nome">
        <br>
    	<input type="text" placeholder="Email" id="email">
        <br>
		<select id="assunto">
			<option value="">Assunto:</option>
			<option>Trocar uma idéia</option>
			<option>Críticas =[</option>
			<option>Dúvida</option>
		</select>
		<br>
		<textarea placeholder="Mensagem" class="span6" style="height:150px;" id="mensagem"></textarea>
	<p class="help-block">Máximo 1200 caracteres.</p>
	</form>

  </div>
  <div class="modal-footer">
    <a href="#" class="btn" data-dismiss="modal">Cancelar</a>
    <button class="btn btn-primary" id="enviar">Enviar</button>
  </div>
</div>