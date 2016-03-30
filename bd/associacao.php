<?php include_once('PersistModelAbstract.php');
class Associacao extends PersistModelAbstract
{

		public function setAssociacao($de, $para)
    {
        $sql = "INSERT INTO Associacao (de, para) VALUES ( '$de', '$para')";
        $this->getConn()->query($sql);  

         $busca  = "SELECT id from associacao WHERE de= '$de' AND para='$para'";
        $result = $this->getConn()->query($busca);
        $cont = 0;
        $q;

        while ($row = $result->fetch_object()) {
            $cont=$cont+1; 
            $id = $row->id;                      
        }

        if($cont==0){return 0;}
        else{return $id;}
       

    }


    public function setDecisao($de, $para, $valor)
    {
        $sql = "INSERT INTO Associacao (de, para, observacao) VALUES ( '$de', '$para', '$valor')";
        $this->getConn()->query($sql);  
        return true;      
    }

    	public function setAlterAssociacao($de, $para)
    {
        $sql = "INSERT INTO Associacao (de, para) VALUES ( '$de', '$para')";
        $this->getConn()->query($sql);  
        return true;      
    }

    public function countAssociacoes($id,$tipo){	

    	$busca  = "SELECT COUNT(id)  AS associacoes from associacao WHERE $tipo ='$id'";
        $result = $this->getConn()->query($busca);

        while ($row = $result->fetch_object()) {
            
            
            $q = $row->associacoes;
              return $q;
            
        }
     }

     public function getConteudoAssociacoesComQuadroClinico($idQuadroClinico){
     	$busca  = "SELECT conteudo, idElemento from conteudo WHERE idElemento= (SELECT para from associacao WHERE de ='$idQuadroClinico')";
        $result = $this->getConn()->query($busca);
        $cont = 0;
        $id;
        $conteudo;

        while ($row = $result->fetch_object()) {
            $cont=$cont+1;

            $conteudo = $row->conteudo;           
            $id = 		$row->idElemento;
            
        }

        if($cont==0){return 0;}
            else{ return $id."-".$conteudo;}

     }

     public function getTipoElementoDaAssociacao($idElementoFrom){
     	$busca  = "SELECT tipo from elemento WHERE id= (SELECT para from associacao WHERE de ='$idElementoFrom')";
        $result = $this->getConn()->query($busca);
        $cont = 0;
        $q;

        while ($row = $result->fetch_object()) {
            $cont=$cont+1;

            $q = $row->tipo;           
            
        }

        if($cont==0){return 0;}
            else{ return $q;}



     }

     public function getAssociacaoDecisao($idElementoFrom, $valorDecisao){
        $busca  = "SELECT conteudo, idElemento from conteudo WHERE idElemento= (SELECT para from associacao WHERE de= $idElementoFrom AND observacao='$valorDecisao')";
        $result = $this->getConn()->query($busca);
        $cont = 0;
        $q;

        while ($row = $result->fetch_object()) {
            $cont=$cont+1;

             $conteudo = $row->conteudo;           
            $id =       $row->idElemento;          
            
        }

        if($cont==0){return 0;}
        else{return $id."-".$conteudo;}




     }


}