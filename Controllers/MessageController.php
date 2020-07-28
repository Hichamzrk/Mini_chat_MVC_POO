<?php  
	namespace App\Controllers;
	use App\Models\MessageModel;
	
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
				$message->setMessage($_POST['message']);
				$message->setPseudo($_SESSION['pseudo']);
				
				//On enregistre les donnés dans le modelMessage
				$message-> create();

				//On redirige vers la page message
				header('location:/message');
			}
			//On instancie le model messages
			$model = new MessageModel;

			//On appel la méthode de récuperation de tous les messges
			$messages = $model->findAll();
			$messages = array_reverse($messages);

			$this->render('messages/index', compact('messages'));
		}
	}
?>