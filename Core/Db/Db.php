<?php  
	namespace App\Db;

	//On importe PDO
	use PDO;
	use PDOException;

	
	class ClassName extends PDO
	{
		//instance unique de la classe
		private static $instance;

		//Information de connexion
		private const DBHOST = 'localhost';
		private const DBUSER = 'root';
		private const DBPASS = 'root';
		private const DBNAME = 'Mini_chat';

		//connexion à la bdd
		private __construct(){
			$_dsn = 'mysql:dbname='.self::DBNAME.'host='.self::DBHOST;

			try{
				parent::__construct($_dsn, self::DBUSER, self::DBPASS);

				$this->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);
				$this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			}catch(PDOException $e){
				die($e->getMessage());
			}
		}

		public static function getInstance():self{
			if (self::$instance === null) {
				self::$instance = new self()
			}
			return self::$instance;
		}
	}
?>