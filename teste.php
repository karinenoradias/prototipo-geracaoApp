
<?php

include('bd/elemento.php');
include('bd/conteudo.php');
include('bd/auxiliar.php');
include('bd/associacao.php');

$acao = $_POST['action'];
$projeto = $_POST['projeto'];
$idElemento = $_POST['idElemento'];
$tipo = $_POST['tipo'];


$elemento = new Elemento();
$conteudo = new Conteudo();
$auxiliar = new Auxiliar();
$associacao = new Associacao();


   
    switch($acao) {
        case 'insert' : $elemento -> setElemento($projeto, $idElemento, $tipo); break;
        case 'getIdElemento': $elemento-> getIdElemento($idElemento, $projeto); break;
        case 'getTipo':  $tipo =  $elemento -> getTipo($idElemento, $projeto); echo $tipo; break;
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
            break;
        case 'verTipo': $tipo = $elemento-> getTipo($idElemento, $projeto);
         echo $tipo ;
         
            break;

        case 'associar':
             $idGeralElementoDe = $elemento ->  getIdElemento($idElemento, $projeto); 
             $idGeralElementoPara = $elemento ->  getIdElemento($tipo, $projeto); 
             $associacao -> setAssociacao($idGeralElementoDe, $idGeralElementoPara);
             echo $idGeralElementoDe;
        break;

         case 'associar-decisaoSim':
             $idGeralElementoDe = $elemento ->  getIdElemento($idElemento, $projeto); 
             $idGeralElementoPara = $elemento ->  getIdElemento($tipo, $projeto); 
             $associacao -> setDecisao($idGeralElementoDe, $idGeralElementoPara, "sim");
        break;

        case 'associar-decisaoNao':
             $idGeralElementoDe = $elemento ->  getIdElemento($idElemento, $projeto); 
             $idGeralElementoPara = $elemento ->  getIdElemento($tipo, $projeto); 
             $associacao -> setDecisao($idGeralElementoDe, $idGeralElementoPara, "nao");
        break;

        case 'verificarAssociacaoDe':
            $idGeralElemento = $elemento ->  getIdElemento($idElemento, $projeto); 
            $tipo =  $elemento -> getTipo($idElemento, $projeto);
            $numeroAssocia = $associacao -> countAssociacoes($idGeralElemento, "de");
            
             switch ($tipo) {
                  case '1':
                    
                      if($numeroAssocia<1){ echo 0;}
                      else{ echo 1;}
                  break;

                  case '2':
                     if($numeroAssocia<2){ echo 0;}
                     else{ echo 1;}
                  break;

                  case '3':
                      echo 0;
                      break;
                 case '4':
                      echo 1;
                     break;
                  
              } 
            break;
            case 'verificarAssociacaoPara':
            $idGeralElemento = $elemento ->  getIdElemento($idElemento, $projeto); 
            $tipo =  $elemento -> getTipo($idElemento, $projeto);
            $numeroAssocia = $associacao -> countAssociacoes($idGeralElemento, "para");
            
             switch ($tipo) {
                  case '1':{ echo 1;}  break;

                  case '2':
                     if($numeroAssocia<1){ echo 0;}
                     else{ echo 1;}
                  break;

                  case '3':
                      echo 0;
                      break;
                 case '4':
                      echo 0;
                     break;
                  
              } 
            break;
            case 'verificaAssociacaoQuadroClinico':
               $conteudoIntegro = $associacao ->getConteudoAssociacoesComQuadroClinico($idElemento);
               list ($id, $conteudo) = split ('[-]', $conteudoIntegro);

               $tipo = $associacao -> getTipoElementoDaAssociacao($idElemento);
               echo $id."-".$tipo."-".$conteudo;
                break;


            case 'verificaTipoAssociadooProcessoDeAtendimento':
                $tipo = $associacao -> getTipoElementoDaAssociacao($idElemento);
               echo $tipo;
            break;
            case 'verificaAssociacaoPAtendimento':
               $conteudoIntegro = $associacao ->getConteudoAssociacoesComQuadroClinico($idElemento);
               list ($id, $conteudo) = split ('[-]', $conteudoIntegro);

              $tipo = $associacao -> getTipoElementoDaAssociacao($idElemento);
               echo $id."-".$tipo."-".$conteudo;


            break;

            case 'verificaAssociacaoDecisao':
              $integroSim =  $associacao ->  getAssociacaoDecisao($idElemento, 'sim');
              $integroNao =  $associacao -> getAssociacaoDecisao($idElemento, 'nao');

              list ($sim, $conteudoSim) = split ('[-]', $integroSim);
              list ($nao, $conteudoNao) = split ('[-]', $integroNao);

              $tipoS =  $elemento -> getTipoPeloIdGeral($sim);
              $tipoN =  $elemento -> getTipoPeloIdGeral($nao);

              echo $sim."-".$nao."-".$tipoS."-".$tipoN."-".$conteudoSim."-".$conteudoNao;
            break;

    }


?>