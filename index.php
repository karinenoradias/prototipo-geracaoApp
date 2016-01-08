<!DOCTYPE html>
<html lang="pt-BR">
<head>
	<meta charset="UTF-8">
	<meta name="description" content="Protótipo">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Protótipo</title>
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/bootstrap-responsive.css">		
	<link rel="stylesheet" href="css/estilo-cadastro.css">
	<link rel="stylesheet" href="jquery-ui.css">

	<script src="https://code.jquery.com/jquery.js"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script>

	<script type="text/javascript" src="jquery-1.10.2.js"> </script>
	<script type="text/javascript" src="jquery-ui.js"> </script>


	<link href='http://fonts.googleapis.com/css?family=PT+Sans:400,700' rel='stylesheet' type='text/css'>

	<link rel="stylesheet" href="css/reset.css"> <!-- CSS reset -->
	<link rel="stylesheet" href="css/style.css"> <!-- Gem style -->
	<script src="js/modernizr.js"></script> <!-- Modernizr -->

	
</head>
<body>


	<div class="container-fluid">

		<div class="row-fluid">

			<div id="cd-signup" class="span6"> <!-- sign up form -->

				<form class="cd-form span6 offset4" method="post">
					<h1>Cadastro</h1>


					<p class="fieldset">
						<label class="image-replace cd-email" for="signup-email">E-mail</label>
						<input class="full-width has-padding has-border" id="signup-email" type="email" placeholder="E-mail">
						<span class="cd-error-message">Error message here!</span>
					</p>

					<p class="fieldset">
						<label class="image-replace cd-password" for="signup-password">Password</label>
						<input class="full-width has-padding has-border" id="signup-password" type="password"  placeholder="Senha">
						<span class="cd-error-message">Error message here!</span>
					</p>

					<p class="fieldset">
						<label class="image-replace cd-password" for="signup-password">Password</label>
						<input class="full-width has-padding has-border" id="confirm-signup-password" type="password"  placeholder="Confirmar senha">
						<span class="cd-error-message">Error message here!</span>
					</p>


					

					<p class="fieldset">
						<input class="full-width has-padding" id="cadastrar" type="submit" value="Criar conta">
					</p>
				</form>

				<!-- <a href="#0" class="cd-close-form">Close</a> -->
			</div> <!-- cd-signup -->

			<div id="cd-login" class="span6"> <!-- log in form -->

				

				<form class="cd-form span6">

					<h1>Login</h1>

					<p class="fieldset">
						<label class="image-replace cd-email" for="signin-email">E-mail</label>
						<input class="full-width has-padding has-border" id="signin-email" type="email" placeholder="E-mail">
						<span class="cd-error-message">Error message here!</span>
					</p>

					<p class="fieldset">
						<label class="image-replace cd-password" for="signin-password">Password</label>
						<input class="full-width has-padding has-border" id="signin-password" type="password"  placeholder="Senha">
						
						<span class="cd-error-message">Error message here!</span>
					</p>

					<p class="fieldset">
						<input  id="logar" class="full-width" type="submit" value="Login">
					</p>
				</form>

		</div>
	</div>


  <script>

  		$(document).ready(function(){
		var cadastro = $('#cadastrar');
		var login =$('#logar');


		cadastro.click(function() {

				
				var email = $('#signup-email').val();
				var senha = $('#signup-password').val();

				$.ajax({
					type:'POST',
					url:'inicial.php',
					data:{ action: 'novo', email: email, senha:senha}
				}).done(function(e){
						//$('div.comments').append(e); 
						console.log("cadastrado");

						$.ajax({
								type:'POST',
								url:'redirect.php',
								data:{id: e, email: email, senha:senha},

							}).done(function(e2){
									console.log(e2);});	






						var redireciona = 'projetos.php';
						$(location).attr('href', redireciona );









						});

				return false;
		});

		login.click(function() {

				var email = $('#signin-email').val();
				var senha = $('#signin-password').val();


				$.ajax({
					type:'POST',
					url:'inicial.php',
					data:{ action: 'logar', email: email, senha:senha},

				}).done(function(e){
						//$('div.comments').append(e); 
						//alert(e);
						console.log(e);

					$.ajax({
								type:'POST',
								url:'redirect.php',
								data:{id: e, email: email, senha:senha},

							}).done(function(e2){
									console.log(e2);});	






						var redireciona = 'projetos.php';
						$(location).attr('href', redireciona );

				});

				return false;

		});







	});
  </script>







</body>
</html>