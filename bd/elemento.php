<?php include_once('PersistModelAbstract.php');
class Elemento extends PersistModelAbstract
{


public function setElemento($projeto, $idElemento, $tipo)
    {
        $sql = "INSERT INTO elemento (idElemento, projeto, tipo) VALUES ('$idElemento','$projeto', $tipo)";
        $this->getConn()->query($sql);  
        return true;      
    }


public function getIdElemento($idElemento, $projeto)
    {
        $busca  = "SELECT id FROM elemento WHERE idElemento ='$idElemento' AND projeto='$projeto'";
        return $result = $this->getConn()->query($busca);           
    }

public function getTipo($idElemento, $tipo)
    {
        $busca  = "SELECT tipo FROM elemento WHERE idElemento ='$idElemento' AND tipo='$tipo'";
        return $result = $this->getConn()->query($busca);           
    }

public function deleteElemento ($idElemento, $projeto)
    {
        $sql  = "DELETE FROM elemento WHERE idElemento ='$idElemento' AND projeto='$projeto'";
        $this->getConn()->query($sql);           
    }

}?>