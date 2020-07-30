<?php 
	namespace App\Models;

	class AimeModel extends Model
	{

		protected $id_like;
		protected $pseudo;
		protected $id_message;
		
		function __construct()
		{
			$this->table = 'Aime';
		}

		public function NumeberLike($id_message){
			
			if ($this->pseudo == null) {
				$donnes = [
					'id_message'=>$id_message
				];
				
			}
			else{
				$donnes = [
					'id_message'=>$id_message,
					'pseudo'=>$this->pseudo
				];
			}

			$query = $this->findBy($donnes);
			$NumeberLike = $query->rowCount();
				
			return $NumeberLike;
		}


		/**
	     * Obtenir la valeur de id
	     */ 
	    public function getid_like():int
	    {
	        return $this->id_like;
	    }

	    /**
	     * Définir la valeur de id
	     *
	     * @return  self
	     */ 
	    public function setid(int $id_like):self
	    {
	        $this->id_like = $id_like;

	        return $this;
	    }

	    /**
	     * Obtenir la valeur de Pseudo
	     */ 
	    public function getpseudo():string
	    {
	        return pseudo;
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
	    public function getid_message():int
	    {
	        return $this->id_message;
	    }

	    /**
	     * Définir la valeur de message
	     *
	     * @return  self
	     */ 
	    public function setid_message(int $id_message):self
	    {
	        $this->id_message = $id_message;

	        return $this;
	    }
	}
?>