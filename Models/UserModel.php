<?php 
	namespace App\Models;

	class UserModel extends Model
	{
		protected $id_user;
		protected $pseudo;
		protected $password;

		Public function __construct()
    	{
        	$this->table = 'User';
    	}
	
		//Vérifie le pseudo
		public function pseudoVerify($pseudo){
			$regex = "#[^a-zA-Z0-9]#";
			if (strlen($pseudo) <= 20 AND !preg_match($regex, $pseudo) AND stripos($pseudo, "admin") === FALSE) {
				
				return true;
			}
		}
		
		public function getid_user():int
	    {
	        return $this->id_user;
	    }

	    /**
	     * Définir la valeur de id
	     *
	     * @return  self
	     */ 
	    public function setid_user(int $id_user):self
	    {
	        $this->id_user = $id_user;

	        return $this;
	    }

	    /**
	     * Obtenir la valeur de pseudo
	     */ 
	    public function getpseudo():string
	    {
	        return $this->pseudo;
	    }

	    /**
	     * Définir la valeur de pseudo
	     *
	     * @return  self
	     */ 
	    
	    public function setpseudo(string $pseudo):self
	    {
	        $this->pseudo = $pseudo;

	        return $this;
	    }
	    
	    /**
	     * Obtenir la valeur de password
	     */ 
	    public function getpassword():string
	    {
	        return $this->password;
	    }

	    /**
	     * Définir la valeur de password
	     *
	     * @return  self
	     */ 
	    public function setpassword(string $password):self
	    {
	        $this->password = $password;

	        return $this;
	    }

	}
?>