<?php  
	namespace App\Models;

	use App\Db\Db;

	class Model extends Db{
		//Table de la base de donnée en cours
		protected $table;

		//Instance de connexion
		Private $db;

		//Hydratation : définition des propriété à partir d'un tableau
		public function hydrate(array $donnees)
		{
			foreach ($donnees as $key => $value) {
				//on récupere le nom du setter correspondant à l'attribut.
				$method = 'set'.ucfirst($key);

				//Si le setter correspondant exite
				if (method_exists($this, $method)) {
					//On appelle le setter.
					$this->$method($value);
				}
			}
			return $this;
		}

		//Methode d'execution des requètes 
		public function requete(string $sql, array $attributs = null)
		{
			//On récupere l'instance de Db
			$this->db = Db::getInstance();

			//On vérifie si on a des attributs
			if ($attributs !== null) {
				$query = $this->db->prepare($sql);
				$query->execute($attributs);

				return $query;
			}
			else{
				return $this->db->query($sql);
			}
		}

		//Methode selectionne tous les enregistrement d'une table
		public function findAll()
		{
			$query = $this->requete('SELECT * FROM'.$this->table);
			return $query->fetchAll();
		}

		//Methode recherche des elements précis
		public function findBy(array $criteres)
		{
			$champs = [];
			$valeurs = [];

			//On boucle pour "éclater le tableau de critère"
			foreach ($criteres as $champ => $valeur) {
				$champs[] = "$champs = ?";
				$valeurs[] = $valeur;
			}

			//On transforme le tableau en chaîne de caractère séparée par des AND

			$liste_champs = implode('AND', $champs);

			//On exécute la requête
			return $this->requete("SELECT * FROM {$this->table} WHERE $list_champs", $valeurs)->fetchAll();
		}

		//Methode de recherche d'un élement
		public function find(int $id)
		{
			return $this->requete("SELECT * FROM{$this->table} WHERE id = $id")->fetch();
		}
	}

	

?>