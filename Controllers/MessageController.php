<?php  
	namespace App\Controllers;
	use App\Models\MessageModel;
	use App\Models\AimeModel;
	
	class MessageController extends Controller
	{
		//methode de la page messages
		public function index(){


			//Si le pseudo n'est pas dans Session retour au login
			if (!isset($_SESSION['pseudo'])) {
				header('location: /user/login');
				exit;
			}
			//On récupére le message en POST
			if (isset($_POST['message'])) {
				$message = new MessageModel;
				
				//On hydrate les données dans la classe MessageModel
				$donnes = [
					'message'=>strip_tags($_POST['message']),
					'pseudo'=>$_SESSION['pseudo']
				];

				$message->hydrate($donnes);
				
				//On enregistre les donnés dans le modelMessage
				$message-> create();

				//On redirige vers la page message
				header('location:/message');
			}
			//On instancie le model messages
			$model = new MessageModel;

			//On appel la méthode de récuperation de tous les messages
			$messages = $model->findAll();
			$messages = array_reverse($messages);

			$aime = new AimeModel;

			$this->render('messages/index', compact('messages','aime'));
		}

		public function aime($id){
			$message= new MessageModel;
			$donnes = ['id_message'=>$id[0]];
			
			$messages = $message->Numberverify($donnes);
			
			if (isset($id) AND $messages === 1) {
				$aime = new AimeModel;
				$donnes = [
					'id_message'=>$id[0],
					'pseudo'=>$_SESSION['pseudo']
				];

				$aime->hydrate($donnes);
				

				$aimes = $aime->Numberverify($donnes);

				if ($aimes >= 1) {
					header('location:/message');
					exit;
				}
				$aime->create();

				header('location:/message');
				exit;
			}
			echo "erreur";
		}
	}
?>