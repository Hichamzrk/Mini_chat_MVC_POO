<?php  
	namespace App\Controllers;
	use App\Models\MessageModel;
	/**
	 * 
	 */
	class MessageController extends Controller
	{
		public function index(){
			//On récupére le message en POST
			if (isset($_POST['message'])) {
				$message = new MessageModel;

				$message->setMessage($_POST['message']);

				$message-> create();
			}
			//On instancie le model messages
			$model = new MessageModel;

			//On appel la méthode de récuperation de tous les messges
			$messages = $model->findAll();

			$this->render('messages/index', compact('messages'));
		}
	}
?>