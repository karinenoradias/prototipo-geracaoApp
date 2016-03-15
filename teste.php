
<?php

include('bd/elemento.php');
include('bd/conteudo.php');
include('bd/auxiliar.php');

$acao = $_POST['action'];
$projeto = $_POST['projeto'];
$idElemento = $_POST['idElemento'];
$tipo = $_POST['tipo'];

$elemento = new Elemento();
$conteudo = new Conteudo();
$auxiliar = new Auxiliar();


   
    switch($acao) {
        case 'insert' : $elemento -> setElemento($projeto, $idElemento, $tipo); break;
        case 'getIdElemento': $elemento-> getIdElemento($idElemento, $projeto); break;
        case 'getTipo': $elemento-> getTipo($idElemento, $tipo); break;
        case 'delete': $elemento-> deleteElemento ($idElemento, $projeto); break;
        case'cont': $quant= $elemento ->  quadrosClinicos($projeto);
        			echo json_encode( $quant );
        break;
        case 'insertContent': $idGeralElemento = $elemento ->  getIdElemento($idElemento, $projeto); 
        		$isConteudo = $conteudo ->isConteudo($idGeralElemento);

        		
        		if($isConteudo==0){
        			$conteudo-> setConteudo($idGeralElemento, $tipo);
        		echo $isConteudo;
        		}
        		else {

        			$conteudo -> alterConteudo ($isConteudo, $tipo);
        			echo $isConteudo;}   			
        break;
        case 'ultimaSelecao':   
                $selecionado = $auxiliar -> getSelecao($projeto);
               

                if($selecionado==''){
                    echo "0";
                    $auxiliar -> setSelecao($projeto, $idElemento);
                }
                else{

                    if($selecionado==$idElemento){echo 1;}
                        else{
                    echo "#".$selecionado;
                    $auxiliar ->  alterSelecao ($idElemento, $projeto);
                    }
                } 

                  //  
                  // 
                   // echo "vazio:".$selecionado;
                //}
                //else{ 
                  //  echo "diferente ".$selecionado;
                //}
                    /* if($selecionado==$idElemento){ echo 0;}
                    else{
                        echo $selecionado;
                        $auxiliar -> alterSelecao ($novaSelecao, $projeto); }
                    }                                */
            break;
    }


?>