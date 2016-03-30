<?php  session_start();

$projeto = $_GET["id"];
$usuario = $_GET["us"];

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
	<meta charset="UTF-8">
	<meta name="description" content="Protótipo">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Protótipo</title>
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/bootstrap-responsive.css">		
	<link rel="stylesheet" href="css/estilo.css">
	<link rel="stylesheet" href="jquery-ui.css">


	
	<script type="text/javascript" src="jquery.js"></script>

	<script type="text/javascript" src="js/bootstrap.js"></script>

	<script type="text/javascript" src="jquery-1.10.2.js"> </script>
	<script type="text/javascript" src="jquery-ui.js"> </script>
	<script src="js/bootstrap.min.js"></script>
	<script src="bootbox.min.js"></script>
	 <script type="text/javascript" src="jquery.line.js"></script>

	
</head>
<body data-spy="scroll" data-target=".sidebar">

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

	
		<?php echo '<input id="projeto" class="input-none" value="'.$projeto.'"></input>
					<input id="usuario" class="input-none" value="'.$usuario.'"></input>
		            <input id="idSelecionado" class="input-none">
		        	</input><input id="input-associacao" class="input-none"></input>
		        	<input id="decisao" class="input-none"></input>';?>

	<div class="container-fluid">

		<div class="row-fluid">

			
	

			<div id="principal" class="span10">
			<ul class="nav nav-tabs" data-tabs="tabs">
					<li class="active"><a id="fluxograma" href="#area" data-toggle="tab"> Fluxograma </a></li>
					<li ><a id="ver-telas" href="#tela" data-toggle="tab">  Visualizar Tela </a> </li>
					
				</ul>
				<div class="tab-content">
					<div class="tab-pane active "id="area">

											
						
					</div>
					<div class="tab-pane" id="tela">

						<div id="visualizar" class="span3 offset4" >
							
							<div id="telas-geradas"> 

								<div id="bem-vindo">
								<img src="img/logo.png">

								<h3 id="mensagem-bemVindo">Bem vindo!</h3> 
								</div>
							</div>


						</div>
						
					</div>
				</div>

			</div>


			<div id="menu-lateral" class="span2 table-bordered"  data-spy="affix" data-offset-top="311">

				<div id="topo-menu-lateral">
					Formas
				</div>


				<div class="row-fluid">

				

					<div  class="span6 menu-lateral-formas">
						<input id="bOval" type="image" src="img/oval.png" width="35px" height="35px">
						<span id="legenda">Quadro Clínico</span>
					</div>
				
				<div class="span6 menu-lateral-formas">
						<input id="bLosang" type="image" src="img/losango.png" width="40px" height="40px">
						<span id="legenda">Decisões Clínicas</span>
				</div>

			</div>

			<div class="row-fluid">

				

					<div  class="span6 menu-lateral-formas">
						<input id="bRetang" type="image" src="img/retangulo.png" width="50px" height="50px">
						<span id="legenda">Processo do atendimento</span>
					</div>
				
				<div  class="span6 menu-lateral-formas">
					<input id="bCirc" type="image" src="img/circulo.jpg" width="50px" height="50px">
					<span id="legenda">Conclusão</span>
				</div>

			</div>
				
				

			</div>


			
			<div id="menu-opcoes" class="span2 table-bordered"  data-spy="affix" data-offset-top="511">

				<div id="topo-menu-lateral">
					Selecione
				</div>

			<div class="row-fluid">

					<div  class="span4 menu-lateral-formas">
						<input id="delete" type="image" src="img/delete.png" width="25px" height="25px">
					</div>

					<div  class="span4 menu-lateral-formas" >
						<input id="edit" type="image" src="img/editar.png" width="35px" height="35px">
					</div>

					<div class="span4 menu-lateral-formas" >
							<input id="redimensiona" type="image" src="img/redimensiona.png" width="20px" height="20px">
					</div>

			</div>

				<div class="row-fluid">

					<div  class="span4 menu-lateral-formas">
						<input id="associacao" type="image" src="img/associacao.png" width="25px" height="25px">
					</div>

					

			</div>



			</div>

			<div class="row-fluid">  <button id="final" class="btn btn-success btn-large"> GERAR APLICATIVO </button></div>
	
			</div>

	</div>



	
  

  <script>





  		$(document).ready(function(){
		var divPai = $('#area');
		var retangulo = $('#bRetang');
		var oval = $('#bOval');
		var circulo = $('#bCirc');
		var losango = $('#bLosang');
		var apagar = $('#delete');
		var redimensiona = $('#redimensiona');
		var editar = $('#edit');
		var associar = $("#associacao")
		var telas = $('#ver-telas');
		var projeto = $('#projeto').val();
		var usuario = $('#usuario').val();
		var fluxograma=$('#fluxograma');	
		var id = $('#idSelecionado').val();	



		var count = 0;


		

		
		divPai.click(function(){

			$('#area').css( 'cursor', 'default' );
			$("#input-associacao").val(0);
			$('#'+$('#idSelecionado').val()).css("background-color", "white");


		});
		
		/*
			Descrição funcional: ao clicar na aba fluxograma, limpa a div #telas-geradas e acrescenta novamente a imagem de abertura
			Obs: #telas-geradas representa o visor do smartphone
		*/
		fluxograma.click(function(){
			$("#telas-geradas").html( '' );
			var $element = $("<div id='bem-vindo'><img src='img/logo.png'><h3 id='mensagem-bemVindo'>Bem vindo!</h3></div>");
			$("#telas-geradas").append($element);
			

		});

		/*
			Descrição funcional: ao clicar na aba Visualizar Tela, realiza-se uma pesquisa no banco de dados com intenção de buscar 
			elementos desenhados no fluxograma, que contenha conteúdo para transformar em elementos interativos no simulador (smartphone)

			Descrição técnica: 

			1) Utiliza-se a função $.ajax: 
			entradas -> index para o case, no caso 'cont'; id do projeto. IdElemento e tipo são zerados pois não serão utilizados na busca
			retorno -> array em json (e)

			Processo para realizar função especificada: conversão do json em objetos jquery; $.each pega valor por valor do array (esses valores são os conteúdos dos elementos);
			posteriormente, simulação de telas inicia apartir da função setTimeout (esconder tela de boas vindas e apresentar o conteudo em forma de botões interativos)
		*/

		telas.click(function() {

			
			 $.ajax({
					type:'POST',
					url:'teste.php',
					data:{ action: 'cont', projeto:projeto, idElemento:0, tipo:0}
				}).done(function(e){

					   jq_json_obj = $.parseJSON(e); //Convert the JSON object to jQuery-compatible

				      if(typeof jq_json_obj == 'object'){ //Test if variable is a [JSON] object
				        jq_obj = eval (jq_json_obj); 

				        //Convert back to an array
				        jq_array = [];
				        for(elem in jq_obj){
				            jq_array.push(jq_obj[elem]);
				        }
				        }

					$.each(jq_array, function (index, value) {
							console.log(value.idElemento);



					setTimeout(function() {	$('#bem-vindo').css("display", "none"); 
       			}, 2000);

					setTimeout(function() {
					
											
					var $element = $("<div> <button class='btn btn-primary' onClick='verificaAssociacaoQuadroClinico("+value.idElemento+")'>"+value.conteudo+" </button> </div>");
			        $("#telas-geradas").append($element);
       			}, 2001);

					});
 						 
 					
					});		
			
			});


		associar.click(function(){
			var elementoFrom = $('#idSelecionado').val();
			var decisao = $('#decisao');

			decisao.val('');
			
			console.log("############# ASSOCIAR #################");
				
				var strings = elementoFrom.split("id");
				var valorInput = strings[1];
				
				var conteudo = $('#'+valorInput).val();
				console.log("depois do split "+conteudo);
				//alert("Clique no elemento que quer associar com: "+conteudo);

				 $.ajax({
					type:'POST',
					url:'teste.php',
					data:{ action: 'getTipo', projeto:projeto, idElemento: elementoFrom , tipo:'0'}
				}).done(function(e){

					if(e==4){
						$('#area').css( 'cursor', 'url(impossivel.cur), auto' );
						console.log("############## Impossível realizar nova associação! (De - Conclusão)");
					}
					else{

						if(e==2){

							
							bootbox.dialog({
								message: "A associação que você gostaria de fazer, irá possuir o fluxo:",
								title: "Decisão",
								buttons: {
									success: {
										label: "Positivo",
										className: "btn-success",
										callback:  function() {
											decisao.val('sim');
										  	console.log("Positivo");
											}
										},
									danger: {
										label: "Negativo",
										className: "btn-danger",
										callback:   function() {
											decisao.val('nao');
										  	console.log("negativo");
											}
										}
																    
										}
									});
							}
						
						var projeto = $('#projeto').val();	// id do projeto
						$('#area').css( 'cursor', 'url(seta.cur), auto' );
			
  		

				  		$.ajax({
									type:'POST',
									url:'teste.php',
									data:{ action: 'verificarAssociacaoDe', projeto:projeto, idElemento: elementoFrom , tipo:'0'}
								}).done(function(e){
								console.log("Verificar Associacoes: "+e);
								if(e==0){
									$('#input-associacao').val('1');		
								}
								else{
									console.log("############## Impossível realizar nova associação!");
									$('#area').css( 'cursor', 'url(impossivel.cur), auto' );
								}
									

										});
						}

						
				});




				

				 //		

			});

	
		/* 
			Descrição funcional: ao clicar no botão redimensiona, na caixa de menu "selecione", o elemento que está selecionado poderá ser redimensionado.

			VERIFICAR FUNCIONAMENTO. FALTA TESTES!!

		*/
		
		
		redimensiona.click(function() {

			$('#'+id).resizable();
		});


		/* 
			Descrição funcional: ao clicar no botão Lixeira, na caixa de menu "selecione", o elemento que está selecionado deverá ser apagado (tela e banco de dados).

			VERIFICAR FUNCIONAMENTO. FALTA TESTES!!

		*/

		apagar.click(function() {
			var deleta = $('#idSelecionado').val();
			$("#"+deleta).remove();
			console.log("############# APAGAR #################");
			console.log("id:"+deleta);
			
			$("#menu-opcoes").css("display", "none");


			 $.ajax({
					type:'POST',
					url:'teste.php',
					data:{ action: 'delete', projeto:projeto, idElemento: deleta , tipo:'0'}
				}).done(function(e){
						//$('div.comments').append(e); 
						//alert(e);

						});


		});

		/* 
			Descrição funcional: ao clicar no botão edição, na caixa de menu "selecione", o elemento que está selecionado permitirá que mude o seu conteúdo.

			NÃO ESTA FUNCIONANDO!!!!!!!!!!!!!!

		*/


		$.fn.clickOff = function(callback, selfDestroy) {
    var clicked = false;
    var parent = this;
    var destroy = selfDestroy || true;
    
    parent.click(function() {
        clicked = true;
    });
    
    $(document).click(function(event) { 
        if (!clicked) {
            callback(parent, event);
        }
        if (destroy) {
            //parent.clickOff = function() {};
            //parent.off("click");
            //$(document).off("click");
            //parent.off("clickOff");
        };
        clicked = false;
    });
};


		editar.click(function() { 
			console.log("EDITAR!!!!!!!!!!!");

			var divElemento =  $('#idSelecionado').val();
			

			var strings = divElemento.split("id");
			var valorInput = strings[1];
			//console.log("Valor: "+valorInput);
			$('#conteudo'+valorInput).remove();
			$('#'+valorInput).css("display", "block");

		});


		/* 
			Descrição funcional: ao clicar no botão retângulo (processo do atendimento), um elemento editável dessa categoria deverá ser criado na tela.

			Descrição técnica: Os elementos criados dinâmicamente baseiam-se em id's locais, que são criados de forma númerica e crescente.
			Para a nomeação de id's é utilizado a seguinte lógica: "id"+quantia de elementos gerados no projeto.
			A sua criação ocorre de acordo com a variavel $element e aplicado com afunção .append. Além disso, para a movimentação dos elementos na tela
			é utilizada a função draggable().
			Posteriormente, todas as informações utilizadas na criação do elemento são gravadas no banco de dados: projeto, id local do elemento e o tipo.

			Funções javascript associadas ao elemento retângulo: onClick(selecionar, como parametro o id local) e onChange(inserirConteudo, como parametro a posição numérica do elemento).
			
			Retângulos são tipo 3.

		*/


		retangulo.click(function() {

				count =  count + 1;
				id = "id"+count;

			    //create an element
			    var $element = $("<div id='id"+count+"' class='retangulo elementos' onClick='selecionar("+id+")'><input id='"+count+"' onChange='inserirConteudo("+count+");' type='text'></input>  </div>");
			    
			    //append it to the DOM
			    $("#area").append($element);

			    //make it "draggable" and "resizable"
			    $element.draggable();

			    $element.draggable({  containment: 'parent'});

			     $.ajax({
					type:'POST',
					url:'teste.php',
					data:{ action: 'insert', projeto:projeto, idElemento: "id"+count , tipo:'3'}
				}).done(function(e){
						//$('div.comments').append(e); 
						//alert(e);

						});


			    	    
			    return false;
		});



		/* 
			Descrição funcional: ao clicar no botão losango (decisão), um elemento editável dessa categoria deverá ser criado na tela.

			Descrição técnica: Os elementos criados dinâmicamente baseiam-se em id's locais, que são criados de forma númerica e crescente.
			Para a nomeação de id's é utilizado a seguinte lógica: "id"+quantia de elementos gerados no projeto.
			A sua criação ocorre de acordo com a variavel $element e aplicado com afunção .append. Além disso, para a movimentação dos elementos na tela
			é utilizada a função draggable().
			Posteriormente, todas as informações utilizadas na criação do elemento são gravadas no banco de dados: projeto, id local do elemento e o tipo.

			Funções javascript associadas ao elemento retângulo: onClick(selecionar, como parametro o id local) e onChange(inserirConteudo, como parametro a posição numérica do elemento).
			
			Losangos são tipo 2.

		*/

 


		losango.click(function(){
		   
		   		count =  count + 1;
		   		id = "id"+count;
		     //create an element
			    var $element = $("<div id='id"+count+"' class='losango elementos'  onClick='selecionar("+id+")'><input id='"+count+"' class='rotacionar' onChange='inserirConteudo("+count+");' type='text'></input>   </div>	");
			    
			    //append it to the DOM
			    $("#area").append($element);

			    //make it "draggable" and "resizable"
			    $element.draggable();

			    $element.draggable({  containment: 'parent'});



			     $.ajax({
					type:'POST',
					url:'teste.php',
					data:{ action: 'insert', projeto: projeto, idElemento: "id"+count , tipo:'2'}
				}).done(function(e){
						//$('div.comments').append(e); 
						//alert(e);

						});

			    
			    return false;
		  
		});


		/* 
			Descrição funcional: ao clicar no botão oval (quadro clínico), um elemento editável dessa categoria deverá ser criado na tela.

			Descrição técnica: Os elementos criados dinâmicamente baseiam-se em id's locais, que são criados de forma númerica e crescente.
			Para a nomeação de id's é utilizado a seguinte lógica: "id"+quantia de elementos gerados no projeto.
			A sua criação ocorre de acordo com a variavel $element e aplicado com afunção .append. Além disso, para a movimentação dos elementos na tela
			é utilizada a função draggable().
			Posteriormente, todas as informações utilizadas na criação do elemento são gravadas no banco de dados: projeto, id local do elemento e o tipo.

			Funções javascript associadas ao elemento retângulo: onClick(selecionar, como parametro o id local) e onChange(inserirConteudo, como parametro a posição numérica do elemento).
			
			Oval são tipo 1.

		*/



		oval.click(function(){
		     	count =  count + 1;
		     	id = "id"+count;
		       	//create an element
			    var $element = $("<div id='id"+count+"' class='oval elementos' onClick='selecionar("+id+")'><input id='"+count+"' onChange='inserirConteudo("+count+");' type='text'></input> </div>");
			    
			    //append it to the DOM
			    $("#area").append($element);

			    //make it "draggable" and "resizable"
			    $element.draggable();

			    $element.draggable({  containment: 'parent'});



			     $.ajax({
					type:'POST',
					url:'teste.php',
					data:{ action: 'insert', projeto: projeto, idElemento: "id"+count , tipo:'1'}
				}).done(function(e){
						//$('div.comments').append(e); 
						//alert(e);

						});


			    
			    return false;
		  
		});


		/* 
			Descrição funcional: ao clicar no botão circulo (Conclusão), um elemento editável dessa categoria deverá ser criado na tela.

			Descrição técnica: Os elementos criados dinâmicamente baseiam-se em id's locais, que são criados de forma númerica e crescente.
			Para a nomeação de id's é utilizado a seguinte lógica: "id"+quantia de elementos gerados no projeto.
			A sua criação ocorre de acordo com a variavel $element e aplicado com afunção .append. Além disso, para a movimentação dos elementos na tela
			é utilizada a função draggable().
			Posteriormente, todas as informações utilizadas na criação do elemento são gravadas no banco de dados: projeto, id local do elemento e o tipo.

					
			Círculoss são tipo 4.

		*/


		circulo.click(function(){
				count =  count + 1;
				id = "id"+count;
	
		   
		      	//create an element
			    var $element = $("<div id='id"+count+"' class='circulo elementos'  onClick='selecionar("+id+")'> <p>Fim</p> </div>");
			    
			    //append it to the DOM
			    $("#area").append($element);

			    //make it "draggable" and "resizable"
			    $element.draggable();

			    $element.draggable({  containment: 'parent'});


			    $.ajax({
					type:'POST',
					url:'teste.php',
					data:{ action: 'insert', projeto:projeto, idElemento: "id"+count , tipo:'4'}
				}).done(function(e){
						//$('div.comments').append(e); 
						//alert(e);

						});



					    
			    return false;
		  
		});

/*
		//FUNÇÃO SIMILAR AO ONCLICK, ATUALMENTE UTILIZADO COM JAVASCRITP, POREM FUNCIONA DE MODO MAIS LENTO
		$("body").on(
  		  "click",
    	".ui-widget-content", // pode ser ID tbm
   		 function (event) {
    	 id = $(this).attr('id');
    	 //alert("oi"+id);
    	 console.log("############ MUDANÇA DE ID ################");
    	 console.log("ID: "+id);

    	
    	}
);*/


 
});
	//FUNÇÃO PARA TRATAR TECLAD DIGITADAS

	//$(document).keypress(function(e){

	//		alert(e.keyCode);
			//if(e.wich ==114|| e.keyCode == 114){
			//$('#'+id).remove();
			//$("#menu-opcoes").css("display", "none");
		
 	 //	});*/
  		

  </script>


   
		
  <script>

  /* 
			Descrição funcional: a função selecionar é chamada através de onClick (quando um elemento do fluxograma é clicado). 
			O objetivo dessa função é: (1) identificar o objeto selecionado; (2) mostrar e esconder menus laterais que são relacionados aos elementos;
			(3) marcar e desmarcar com cores, na interfacce gráfica, os elementos "selecionados".

			Descrição técnica: parâmetro id do elemento (div) clicado.

	*/

  function selecionar(teste){
  	console.log("clicou");

  	var idElemento = teste.id;				//id do elemento clicado (div)
  	var projeto = $('#projeto').val();      // id do projeto (escondido através da interface)
  	var elementoAtual = '#'+idElemento;     //concatenação do #+ id do elemento clicado

  	 
  	 //console.log("####### setando o input ###########");
  	 //console.log("Valor setado: "+$('#idSelecionado').val());

  	 if($("#input-associacao").val() ==1){

  	 	$("#input-associacao").val('0');
  	 	var de= $('#idSelecionado').val();
  	 	var decisao = $('#decisao').val();
  	 	console.log("O Q ESTÀ NA DECISão???? "+$('#decisao').val());
  	 	$('#'+de).css("background-color", "white");  //desmarca a div marcada anteriormente (3)
        $('#'+idElemento).css("background-color", "yellow");  // marcação em amarelo da div que foi clicada (3).

  	 	 $.ajax({
									type:'POST',
									url:'teste.php',
									data:{ action: 'verificarAssociacaoPara', projeto:projeto, idElemento: idElemento , tipo:'0'}
								}).done(function(e){
								console.log("Verificar Associacoes: "+e);
								if(e==0){
									$('#area').css( 'cursor', 'seta.cur' );
									realizarAssociacao(projeto,de,idElemento,decisao);

									
								}
								else{
									$('#area').css( 'cursor', 'default' );
									console.log("############## Impossível realizar nova associação! (PARA)");}
									

										});



		  
  	 }
  	 	else{

			  	if(idElemento != 'area'){				// verifica se o id do elemento clicado é diferente de area, para mostrar ou esconder os menus laterais (2).
			        $("#menu-opcoes").css("display", "block");
			       // idElemento.css("border-style", "dashed");
			        //idElemento.css("border-width", "6px");
			    }
			        else{ $("#menu-opcoes").css("display", "none");}


  				$.ajax({
					type:'POST',
					url:'teste.php',
					data:{ action: 'ultimaSelecao', projeto:projeto, idElemento: idElemento , tipo:""}
				}).done(function(e){
					var elementoAnterior = e;
					
				
				if(e==0){console.log("Zero:"+e);}
				else{
					if(e==1){}
					else{ $(elementoAnterior).css("background-color", "white");}  //desmarca a div marcada anteriormente (3)

 
				$(elementoAtual).css("background-color", "yellow");  // marcação em amarelo da div que foi clicada (3).

						var strings = elementoAnterior.split("#id");
						var valorInput = strings[1];
						var idInput = $('#'+valorInput);
						idInput.css("display", "none");


						//var stringAtual = elementoAtual.split(#id);

						//verificarTipoElemento(projeto,stringAtual);
						//var conteudo = $('#'+valorInput).val();
						//inserirConteudo(valorInput);

						/*$element = $("<p>"+idInput.val()+" </p>	");
						$(elementoAnterior).append($element);
						console.log("depois do split "+valorInput);*/
						//alert("Clique no elemento que quer associar com: "+conteudo);

					}	


			}); }

				$("#idSelecionado").val(idElemento);  // coloca no input escondido o id do elemento selecionado



  	}


/* 
			Descrição funcional: a função inserirConteudo é chamada através de onChange (quando o usuário modifica um input de um elemento). 
			O objetivo dessa função é: gravar ou alterar o conteúdo digitado pelo usuário em um elemento e esconder o input, 
			inserindo o valor digitado dentro do elemento através de <p>.

			Descrição técnica: Parâmetros: id do input.

	*/


	function realizarAssociacao(projeto,de, para, decisao){

		if(decisao=='sim'||decisao=='nao'){
			console.log("sim ou nao");
			if(decisao=='sim'){
				$.ajax({
					type:'POST',
					url:'teste.php',
					data:{ action: 'associar-decisaoSim', projeto:projeto, idElemento: de , tipo:para}
				}).done(function(e){});
			}
			
			if(decisao=='nao'){

				$.ajax({
					type:'POST',
					url:'teste.php',
					data:{ action: 'associar-decisaoNao', projeto:projeto, idElemento: de , tipo:para}
				}).done(function(e){});


			}
			
			

		}
			else{

			$.ajax({
					type:'POST',
					url:'teste.php',
					data:{ action: 'associar', projeto:projeto, idElemento: de , tipo:para}
				}).done(function(e){
						console.log("Associacao:"+e);
						var idLinha=  e.replace("\n", ""); 
						inserirLinha(de, para, idLinha);
				});
				}

	}

	function inserirLinha(de, para, identificadorLinha){

		var p = $( "#"+de);
		var position = p.position();
		var alturaDiv = p.height();
		var larguraDiv = p.width();
		console.log("Posição Esquerda:"+position.left+" Posição Topo:"+position.top+" Altura: "+alturaDiv + " Largura: "+larguraDiv);
		var metadeAlturaA =  Math.ceil(position.top) + Math.ceil(alturaDiv/2); 
		var metadeLarguraA = Math.ceil(position.left) + Math.ceil(larguraDiv/2);

		var p2 = $( "#"+para);
		var position2 = p2.position();
		var alturaDiv2 = p2.height();
		var larguraDiv2 = p2.width();
		var metadeAlturaB =  Math.ceil(position2.top) + Math.ceil(alturaDiv2/2); 
		var metadeLarguraB = Math.ceil(position2.left) + Math.ceil(larguraDiv2/2);

		$('#area').line(metadeLarguraA, metadeAlturaA, metadeLarguraB, metadeAlturaB, {color:"red"}, identificadorLinha);

	}

	function verificarAssociacaoDe(idElemento){
			var projeto = $('#projeto').val();	// id do projeto
			var verificado = null;
  		

  		$.ajax({
					type:'POST',
					url:'teste.php',
					data:{ action: 'verificarAssociacaoDe', projeto:projeto, idElemento: idElemento , tipo:'0'}
				}).done(function(e){
				console.log("Verificar Associacoes: "+e);
					

						});
				
			



	}


  

  	function inserirConteudo(idendifica){
  		console.log("inseriu conteudo");
  		var entrada =$('#'+idendifica);		//concatenação de #+id do input
  		var projeto = $('#projeto').val();	// valor do projeto
  		

  		$.ajax({
					type:'POST',
					url:'teste.php',
					data:{ action: 'insertContent', projeto:projeto, idElemento: "id"+idendifica , tipo:entrada.val()}
				}).done(function(e){
				

						});

			entrada.css("display", "none");

			console.log("Projeto:"+projeto+" idElemento: id"+idendifica);
			verificarTipoElemento(projeto,idendifica);
  	}

  	function verificarTipoElemento(projeto, idendifica){
  		console.log("verificou");
  		var entrada =$('#'+idendifica);		//concatenação de #+id do input


  		$.ajax({
					type:'POST',
					url:'teste.php',
					data:{ action: 'verTipo', projeto:projeto, idElemento: "id"+idendifica , tipo:''}
				}).done(function(e){
						console.log("Tipo:"+e);
						var $element='';

						if(e==2){
							$element = $("<p  id='conteudo"+idendifica+"' class='rotacionar'>"+entrada.val()+" </p>	");}
						else{
							$element = $("<p id='conteudo"+idendifica+"'>"+entrada.val()+" </p>	");
						}


			    		//append it to the DOM
			 			  $("#id"+idendifica).append($element);




				});



  	}


  	function verificaAssociacaoQuadroClinico(idGeralElemento){

  		$.ajax({
					type:'POST',
					url:'teste.php',
					data:{ action: 'verificaAssociacaoQuadroClinico', projeto:'', idElemento: idGeralElemento, tipo:''}
				}).done(function(e){

				var tipoEconteudo = e.split("-");
				var id = tipoEconteudo[0];
				var tipo = tipoEconteudo[1];
				var conteudo = tipoEconteudo[2];

				if(conteudo==0){console.log("évazio");}
							else{

				if(tipo==2){montarTelaDecisao(id,conteudo);}				
				if(tipo==3){montarTelaProcessoDeAtendimento(id, conteudo);}
				if(tipo==4){montarTelaProcessoDeAtendimento();}

				}

								//console.log("Verifica associações dos Quadros Clínicos:"+e);*/
			
				});



  	}

  	function montarTelaQuadrosClinicos(idQuadroClinico, conteudo){}
  	function montarTelaProcessoDeAtendimento(idProcessoAtendimento, conteudo){

  		
  		$.ajax({
					type:'POST',
					url:'teste.php',
					data:{ action: 'verificaTipoAssociadooProcessoDeAtendimento', projeto:'', idElemento: idProcessoAtendimento , tipo:''}
				}).done(function(e){

					$("#telas-geradas").html( '' );
					var $element = $("<p>"+conteudo+"</p>");
					$("#telas-geradas").append($element);

					var $botao;


					if(e==2||e==3){					
					$botao = $( "<button class='btn btn-primary' onClick='verificaAssociacaoPAtendimento("+idProcessoAtendimento+")'> Próximo </button> ");}	

				else {$botao = $( "<button class='btn btn-primary' onClick=''> Voltar ao menu </button>");}
					
					$("#telas-geradas").append($botao);

		
			
				});





  	}

  	function verificaAssociacaoPAtendimento(idGeralElemento){

  		$.ajax({
					type:'POST',
					url:'teste.php',
					data:{ action: 'verificaAssociacaoPAtendimento', projeto:'', idElemento: idGeralElemento , tipo:''}
				}).done(function(e){

					var tipoEconteudo = e.split("-");
					var id = tipoEconteudo[0];
					var tipo = tipoEconteudo[1];
					var conteudo = tipoEconteudo[2];

					if(tipo==2){montarTelaDecisao(id,conteudo);}
					if(tipo==3||tipo==4){montarTelaProcessoDeAtendimento(id, conteudo);}

		
			
				});



  		
  	}

  	function montarTelaConclusao(){}
  	function montarTelaDecisao(idDecisao, conteudo){
   		$.ajax({
					type:'POST',
					url:'teste.php',
					data:{ action: 'verificaAssociacaoDecisao', projeto:'', idElemento: idDecisao , tipo:''}
				}).done(function(e){

					console.log("@@@@@@@@@@@");
					console.log(e);

					var integro = e.split("-");
					var idSim = integro[0];
					var idNao = integro[1];
					var tipoSim = integro[2];
					var tipoNao = integro[3];
					var conteudoSim = '"'+integro[4]+'"';
					var conteudoNao = '"'+integro[5]+'"';
					var proximoSim;
					var proximoNao;

					console.log("Tipo Sim:"+tipoSim);

					if(tipoSim==2){proximoSim="montarTelaDecisao";}
				    if(tipoSim==3){proximoSim= "montarTelaProcessoDeAtendimento";}
				    if(tipoSim==4){proximoSim="montarTelaConclusao";}

					if(tipoNao==2){proximoNao="montarTelaDecisao";}
				    if(tipoNao==3){proximoNao="montarTelaProcessoDeAtendimento";}
				    if(tipoNao==4){proximoNao="montarTelaConclusao";}


  			$("#telas-geradas").html( '' );
			var $element = $("<p>"+conteudo+"</p>");
			$("#telas-geradas").append($element);

			var $simEnao =  $("<div class='row-fluid'><div  class='span6'><button class='btn btn-success' onClick='"+proximoSim+"("+idSim+","+conteudoSim+")'>Sim</button></div><div  class='span6'><button class='btn btn-danger' onClick='"+proximoNao+"("+idNao+","+conteudoNao+")'>Não</button></div></div>");
			$("#telas-geradas").append($simEnao);

		});


  	}



  	function verificaAssociacaoDecisao(idGeralElemento){

  		$.ajax({
					type:'POST',
					url:'teste.php',
					data:{ action: 'verificaAssociacaoQuadroClinico', projeto:'', idElemento: idGeralElemento , tipo:''}
				}).done(function(e){
						


		
			
				});



  	}


  	function verificaAssociacaoProcessoAtendimento(idGeralElemento){

  		$.ajax({
					type:'POST',
					url:'teste.php',
					data:{ action: 'verificaAssociacaoQuadroClinico', projeto:'', idElemento: idGeralElemento , tipo:''}
				}).done(function(e){
						


		
			
				});



  	}

  	//$("#element").resizable('disable'); para desabilirar o resizable

  	

  </script>


		 
		 

		</body>
		</html>