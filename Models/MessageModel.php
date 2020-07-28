<?php  
	namespace App\Models;

	class MessageModel extends Model
	{
		protected $id;
		protected $pseudo;
		protected $id_user;
		protected $message;

		public function __construct()
    	{
        	$this->table = 'Message';
    	}
	    /**
	     * Obtenir la valeur de id
	     */ 
	    public function getId():int
	    {
	        return $this->id;
	    }

	    /**
	     * Définir la valeur de id
	     *
	     * @return  self
	     */ 
	    public function setId(int $id):self
	    {
	        $this->id = $id;

	        return $this;
	    }

	    /**
	     * Obtenir la valeur de Pseudo
	     */ 
	    public function getPseudo():string
	    {
	        return Pseudo;
	    }

	    /**
	     * Définir la valeur de Pseudo
	     *
	     * @return  self
	     */ 
	    
	    public function setPseudo(string $pseudo):self
	    {
	        $this->pseudo = $pseudo;

	        return $this;
	    }
	    
	    /**
	     * Obtenir la valeur de message
	     */ 
	    public function getMessage():string
	    {
	        return $this->message;
	    }

	    /**
	     * Définir la valeur de message
	     *
	     * @return  self
	     */ 
	    public function setMessage(string $message):self
	    {
	        $this->message = $message;

	        return $this;
	    }
	    
	}
?>