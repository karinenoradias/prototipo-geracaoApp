<?php session_start();?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="description" content="Protótipo">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Protótipo</title>
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/bootstrap-responsive.css">		
	<link rel="stylesheet" href="css/estilo-projeto.css">
	<link rel="stylesheet" href="jquery-ui.css">

	<script src="https://code.jquery.com/jquery.js"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script>

	<script type="text/javascript" src="jquery-1.10.2.js"> </script>
	<script type="text/javascript" src="jquery-ui.js"> </script>
</head>
<body>

			<nav class="navbar navbar-fixed-top">
		<div class="navbar-inner">
			<div class="container">

				<button class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					

				</button>
				<a href="#" class="brand">Protótipo v1</a>

			</div>
		</div>
	</nav>

	<div class="container-fluid">

		<?php
    echo "<input type='text' value='".$_SESSION['id']."' id='usuario'></input>";
         ?>

		

		<div class="row-fluid">

			<div id="menu-esquerdo" class="span2"> 

				<button id="novo" class="btn btn-primary btn-large">Criar fluxograma</button>

			</div>
			<div id="painel" class="span10"> 
				<table class="table table-condesed table-hover ">
				<caption> Aprovados e Reprovados</caption>
				<thead>
					<tr>
					<th>Numero</th>
					<th>Nome</th>
					<th>Nota</th>
					<th>Situacao</th>
					</tr>
				</thead>
				<tbody>
					<tr class="success">
						<td>01</td>
						<td>Ana Maria</td>
						<td>9.0</td>
						<td>Aprovada</td>
					</tr>

					<tr class="error">
						<td>02</td>
						<td>Ana Maria</td>
						<td>9.0</td>
						<td>Aprovada</td>
					</tr>

					<tr>
						<td>03</td>
						<td>Ana Maria</td>
						<td>9.0</td>
						<td>Aprovada</td>
					</tr>
					<tr class="success">
						<td>01</td>
						<td>Ana Maria</td>
						<td>9.0</td>
						<td>Aprovada</td>
					</tr>

					<tr class="error">
						<td>02</td>
						<td>Ana Maria</td>
						<td>9.0</td>
						<td>Aprovada</td>
					</tr>

					<tr>
						<td>03</td>
						<td>Ana Maria</td>
						<td>9.0</td>
						<td>Aprovada</td>
					</tr>
				</tbody>
			</table>




			</div>

		</div>
	</div>
	



<script>

$(document).ready(function(){
		var fluxograma = $('#novo');
		
		fluxograma.click(function() {

				
				var usuario = $('#usuario').val();
				console.log("Criando um novo projeto. ID: "+ usuario);

		$.ajax({
					type:'POST',
					url:'projeto.php',
					data:{ action: 'novo', usuario:usuario, nome:""}
				}).done(function(e){
						console.log("Projeto criado: "+e);

			
						var redireciona = 'fluxograma.php?id='+e+'&&us='+usuario;
						$(location).attr('href', redireciona );

						return false;
					});

		});

	});

</script>







	
</body>
</html>