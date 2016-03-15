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
        $result = $this->getConn()->query($busca);           

          while ($row = $result->fetch_object()) {
            
            
            $q = $row->id;
              
            
        }

        return $q;


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


public function contElementos($projeto){

        $busca  = "SELECT COUNT(id)  AS quantidade from elemento WHERE projeto='$projeto'";
        $result = $this->getConn()->query($busca);

        while ($row = $result->fetch_object()) {
            
            
            $q = $row->quantidade;
              
            
        }

        return $q;

         

}

public function contQuadroClinico($projeto){

      $busca  = "SELECT COUNT(id)  AS quantidade from elemento WHERE projeto='$projeto' AND tipo='1'";
      $result = $this->getConn()->query($busca);

        while ($row = $result->fetch_object()) {
            
            
            $q = $row->quantidade;
              
            
        }

        return $q;
}

//idElemento
public function quadrosClinicos($projeto){

     $busca  = " SELECT conteudo.conteudo FROM conteudo INNER JOIN elemento ON (conteudo.idElemento = elemento.id AND elemento.tipo=1 AND elemento.projeto =".$projeto." )";
     $result = $this->getConn()->query($busca);


     $resultados = null;


     while($ln = mysqli_fetch_object($result)){
         $resultados[] = $ln;                
        }
     

      return $resultados;
}



     //

      //return $escrever;





}?>