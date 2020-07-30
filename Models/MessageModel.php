<?php  
	namespace App\Models;

	class MessageModel extends Model
	{
		protected $id;
		protected $pseudo;
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
	    public function setid(int $id):self
	    {
	        $this->id = $id;

	        return $this;
	    }

	    /**
	     * Obtenir la valeur de Pseudo
	     */ 
	    public function getpseudo():string
	    {
	        return Pseudo;
	    }

	    /**
	     * Définir la valeur de Pseudo
	     *
	     * @return  self
	     */ 
	    
	    public function setpseudo(string $pseudo):self
	    {
	        $this->pseudo = $pseudo;

	        return $this;
	    }
	    
	    /**
	     * Obtenir la valeur de message
	     */ 
	    public function getmessage():string
	    {
	        return $this->message;
	    }

	    /**
	     * Définir la valeur de message
	     *
	     * @return  self
	     */ 
	    public function setmessage(string $message):self
	    {
	        $this->message = $message;

	        return $this;
	    }
	    
	}
?>