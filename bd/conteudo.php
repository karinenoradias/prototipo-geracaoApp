<?php include_once('PersistModelAbstract.php');
class Conteudo extends PersistModelAbstract
{


public function setConteudo($idElemento, $conteudo)
    {
        $sql = "INSERT INTO conteudo (idElemento, conteudo) VALUES ('$idElemento','$conteudo')";
        $this->getConn()->query($sql);       
        return true;       
    }


public function getConteudo($idElemento)
    {
        $busca  = "SELECT conteudo FROM conteudo WHERE idElemento ='$idElemento'";
        return $result = $this->getConn()->query($busca);           
    }

  public function getIdConteudo($idElemento)
    {
        $busca  = "SELECT id FROM conteudo WHERE idElemento ='$idElemento'";
        return $result = $this->getConn()->query($busca);           
    }

public function alterConteudo ($idConteudo, $novoConteudo)
    {
        $busca  = "UPDATE conteudo SET conteudo ='$novoConteudo' WHERE id ='$idConteudo'";
        return $result = $this->getConn()->query($busca);           
    }

public function deleteConteudo ($idConteudo)
    {
        $sql  = "DELETE * FROM conteudo WHERE id ='$idConteudo'";
        $this->getConn()->query($sql);           
    }

public function isConteudo($idElemento){
     $busca  = "SELECT id  from conteudo WHERE idElemento ='$idElemento'";
     $result = $this->getConn()->query($busca);           

     $cont =0;
          while ($row = $result->fetch_object()) {
            $cont++;
            
            $q = $row->id;
              
            
        }
        if($cont==0){return 0;}
        else{
       return $q;}


}

public function getConteudosQuadroClinico(){}

}?>