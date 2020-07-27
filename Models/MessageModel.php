<?php  
	namespace App\Models;

	class MessageModel extends Model
	{
		protected $id;
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
	     * Obtenir la valeur de id_user
	     */ 
	    public function getId_user():int
	    {
	        return $this->id_user;
	    }

	    /**
	     * Définir la valeur de id_user
	     *
	     * @return  self
	     */ 
	    
	    public function setId_user(int $id_user):self
	    {
	        $this->id_user = $id_user;

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