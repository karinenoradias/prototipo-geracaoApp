<?php include_once('PersistModelAbstract.php');
class Auxiliar extends PersistModelAbstract
{

	public function setSelecao($projeto, $selecao)
    {
        $sql = "INSERT INTO auxiliar (projeto, selecao) VALUES ( '$projeto', '$selecao')";
        $this->getConn()->query($sql);  
        return true;      
    }


    public function getSelecao($projeto){

	 $busca  = " SELECT selecao FROM auxiliar WHERE projeto = '$projeto'";
     $result = $this->getConn()->query($busca);

     
        
          while ($row = $result->fetch_object()) {
            
            $q = $row->selecao;

            return $q;            
            
        }
    
    }


    public function alterSelecao ($novaSelecao, $projeto)
    {
        $busca  = "UPDATE auxiliar SET selecao ='".$novaSelecao."' WHERE projeto ='".$projeto."'";
        return $result = $this->getConn()->query($busca);           
    }

}


?>