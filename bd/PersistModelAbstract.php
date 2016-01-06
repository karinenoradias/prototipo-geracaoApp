<?php abstract class PersistModelAbstract
{
     /**
     * Conecta com o bd
	 * host: localhost
	 * usuario: root
	 * senha: unipampa
	 * nome da bd : redesocial
     */
    
      
	public  function getConn()
	
	{
		$db; 
		//return $this->db = new mysqli("fdb5.freehostingeu.com","1497755_nikai","unipampa","1497755_nikai");
        return $this->db = new mysqli("localhost","root","","prototipo");
        
    }
}?>