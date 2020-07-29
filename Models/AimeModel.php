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

		public function NumeberLike($id_message, $pseudo = null){
			if ($pseudo === null) {
				$sql = "SELECT * FROM Aime WHERE id_message = ?";
				$attributs = $id_message;

				$query = $this->requete($sql, [$attributs]);
				
				$NumeberLike = $query->rowCount();
			}
			else{
				$sql = "SELECT * FROM Aime WHERE id_message = ? AND pseudo = ?";
				$attributs = $id_message;
				$attributs = array($id_message, $pseudo);

				$query = $this->requete($sql, $attributs);
				
				$NumeberLike = $query->rowCount();

			}

			return $NumeberLike;
		}


		/**
	     * Obtenir la valeur de id
	     */ 
	    public function getId_like():int
	    {
	        return $this->id_like;
	    }

	    /**
	     * Définir la valeur de id
	     *
	     * @return  self
	     */ 
	    public function setId(int $id_like):self
	    {
	        $this->id_like = $id_like;

	        return $this;
	    }

	    /**
	     * Obtenir la valeur de Pseudo
	     */ 
	    public function getPseudo():string
	    {
	        return pseudo;
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
	    public function getId_message():int
	    {
	        return $this->id_message;
	    }

	    /**
	     * Définir la valeur de message
	     *
	     * @return  self
	     */ 
	    public function setid_Message(int $id_message):self
	    {
	        $this->id_message = $id_message;

	        return $this;
	    }
	}
?>