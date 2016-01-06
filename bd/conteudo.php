<?php include_once('PersistModelAbstract.php');
class Conteudo extends PersistModelAbstract
{


public function setConteudo($idElemento, $conteudo)
    {
        $sql = "INSERT INTO conteudo (idElemento, conteudo) VALUES ('$idElemento','$conteudo')";
        $this->getConn()->query($sql);        
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


}?>