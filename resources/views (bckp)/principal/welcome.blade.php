@extends('principal.principal')

@section('conteudo')

<style type="text/css">

#promo{
	background-color: #303f9f;
	padding: 10px;
}

.circulo {
    border-radius: 50%;
    vertical-align: middle;
    display: table-cell;
    height: 150px;
    width: 150px;
    text-align: center;    
}

.info{
	vertical-align: middle;
    display: table-cell;
    padding-left: 20px;
}

.info > h5{
	font-weight: 300;
}

.container > h1{
	letter-spacing: 0.22em;
	margin-bottom: 0;
}

.container > h4{
	margin-top: 0;
	font-weight: 100;
}


</style>

<div class="container">
	<br>
	<img class="responsive-img" src="../imgs/PsychoSharing(1).png""><br>
	<br>
	<a class="waves-effect waves-light btn btn-large" id="conheca" href="#promo">Conheça</a>
</div>



<div id="promo">
	<div class="container">
		<h1 class="amber-text text-accent-3 center-align" style="">Golden Circle</h1>
		<h4 class="center-align white-text">do PsychoSharing</h4>
		<hr>
		<br>
		<div class="circulo blue darken-2 z-depth-5 black-text">
			<h4>O que?</h4>
			<h6><i>What?</i></h6>
		</div>
		
		<div class="info">
			<h5 class="right-align white-text">Uma plataforma <strong>colaborativa</strong> para a troca de informação e conhecimento entre <strong>profissionais</strong> da Psicologia.</h5>
		</div>

		<br>
		
		<div class="circulo amber accent-3 z-depth-5 black-text">
			<h4>Como?</h4>
			<h6><i>How?</i></h6>
		</div>

		<div class="info">
			<h5 class="right-align white-text">Facilitando a interação entre psicólogos através do <strong>compartilhamento</strong> de: descrição de exercícios psicológicos, relatos de caso, materiais e eventos de psicologia.</h5>
		</div>

		<br>

		<div class="circulo blue darken-2 z-depth-5 black-text">
			<h4>Por quê?</h4>
			<h6><i>Why?</i></h6>
		</div>

		<div class="info">
			<h5 class="right-align white-text"><strong>Sistemas Colaborativos</strong> utilizam a tecnologia a fim de <strong>aprimorar</strong> o trabalho dos usuários. Além disso, este conceito carece em estudos na <strong>Informática aplicada à Psicologia</strong>.</h5>
		</div>

		<br>
		<br>
	</div>

</div>

<br>

<h1 class="center-align" style="font-weight: 100;">Comece a <strong class="indigo-text text-darken-2">compartilhar</strong> e <strong class="indigo-text text-darken-2">descobrir</strong> agora!</h1>
<div class="center-align">
	<a class="waves-effect waves-light btn btn-large" href="/login">logar</a>
	&nbsp;
	<a class="waves-effect waves-light btn btn-large" href="/register">cadastrar</a>
	
	<br>
	<br>
</div>
<br>


<footer class="page-footer">
          <div class="container">
            <div class="row">
              <div class="col l6 s12">
                <h5 class="white-text">PsychoSharing</h5>
                <p class="grey-text text-lighten-4">Trabalho desenvolvido para a conclusão do curso de Técnico em Informática.<br>IFSul Câmpus Sapucaia do Sul.</p>
              </div>
              <div class="col l4 offset-l2 s12">
                <h5 class="white-text">Informações úteis</h5>
                <ul>
                  <li><a class="grey-text text-lighten-3" href="#!"><i class="tiny material-icons">link</i> Link para o artigo</a></li>
                  <li><a class="grey-text text-lighten-3" href="mailto:carlawendlingp@gmail.com"><i class="tiny material-icons">mail</i> carlawendlingp@gmail.com</a></li>
                  <li><a class="grey-text text-lighten-3" href="mailto:mauriciocantujoc@gmail.com"><i class="tiny material-icons">mail</i> mauriciocantujoc@gmail.com</a></li>
               
                </ul>
              </div>
            </div>
          </div>
          <div class="footer-copyright">
            <div class="container">
            © 2017 Desenvolvido por Carla Wendling e Maurício Cantú
            
            </div>
          </div>
        </footer>

<script>
	var $doc = $('html, body');

	$('#conheca').click(function() {
	    $doc.animate({
	        scrollTop: $( $.attr(this, 'href') ).offset().top
	    }, 500);
	    return false;
	});
</script>

@stop