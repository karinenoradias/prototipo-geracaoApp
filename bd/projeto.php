<?php include_once('PersistModelAbstract.php');
class Projeto extends PersistModelAbstract
{


public function setProjeto($usuario, $nome)
    {
        $sql = "INSERT INTO projeto (usuario,nome) VALUES ($usuario, '$nome')";
        $this->getConn()->query($sql);  
            
    }


public function getIdProjeto($usuario)
    {
        $busca  = "SELECT id FROM projeto WHERE usuario='$usuario' ORDER BY ID DESC LIMIT 1";
        $result = $this->getConn()->query($busca);

          $i = 0;
        while ($row = $result->fetch_object()) {
            $i = $i + 1;
            
            $id        = $row->id;
              
            
        }
        if ($i == 1) {
               
                 return $id;

      

      }
  }


}?>