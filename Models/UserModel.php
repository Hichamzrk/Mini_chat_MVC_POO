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

		public function findOneByPseudo($pseudo){
			return $this->requete("SELECT * FROM {$this->table} WHERE pseudo = ?",[$pseudo])->fetch();
		}
		
		public function getId_user():int
	    {
	        return $this->id_user;
	    }

	    /**
	     * Définir la valeur de id
	     *
	     * @return  self
	     */ 
	    public function setId_user(int $id_user):self
	    {
	        $this->id_user = $id_user;

	        return $this;
	    }

	    /**
	     * Obtenir la valeur de pseudo
	     */ 
	    public function getPseudo():string
	    {
	        return $this->pseudo;
	    }

	    /**
	     * Définir la valeur de pseudo
	     *
	     * @return  self
	     */ 
	    
	    public function setPseudo(string $pseudo):self
	    {
	        $this->pseudo = $pseudo;

	        return $this;
	    }
	    
	    /**
	     * Obtenir la valeur de password
	     */ 
	    public function getPassword():string
	    {
	        return $this->password;
	    }

	    /**
	     * Définir la valeur de password
	     *
	     * @return  self
	     */ 
	    public function setPassword(string $password):self
	    {
	        $this->password = $password;

	        return $this;
	    }

	    public function setSession(){
	    	$_SESSION['user'] = [
				'user_id' => $this->user_id,
				'email' => $this->pseudo
	    	];
	    }
	}
?>