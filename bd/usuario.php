<?php include_once('PersistModelAbstract.php');
class Usuario extends PersistModelAbstract
{


public function setUsuario($email, $senha)
    {
        $sql = "INSERT INTO usuario (email, senha) VALUES ('$email', $senha)";
        $this->getConn()->query($sql);  
        return true;      
    }


public function getIdUsuario($email, $senha)
    {
        $busca  = "SELECT id FROM usuario WHERE email='$email' AND senha='$senha'";
        $result = $this->getConn()->query($busca);

          $i = 0;
        while ($row = $result->fetch_object()) {
            $i = $i + 1;
            
            $id        = $row->id;
              
            
        }
        if ($i == 1) {
               
                 echo $id;

      

      }
  }




public function alterSenha($email,$senha)
    {
        $busca  = "UPDATE usuario SET senha ='$senha' WHERE email ='$email'";
        $this->getConn()->query($busca);        
    }




    public function logar($usuario, $senha)
    {
        
        $senhaCrip = md5($senha);
        
        $logar  = "SELECT * FROM usuario WHERE email= '$usuario' AND senha = '$senhaCrip'";
        $result = $this->getConn()->query($logar);
        
        
        $i = 0;
        
        
        while ($row = $result->fetch_object()) {
            $i = $i + 1;
            
            $id        = $row->id;
            $nome      = $row->nome;
            $sobrenome = $row->sobrenome;
            $email     = $row->email;
            
            
        }
        if ($i == 1) {
            $_SESSION['id']        = $id;
            $_SESSION['nome']      = $nome;
            $_SESSION['sobrenome'] = $sobrenome;
            $_SESSION['email']     = $email;
            return true;
            
        } else {
            return false;
        }
    }



}?>