<?php 
namespace App\Controllers;
use App\Models\UserModel;

	class UserController extends Controller
	{
		// public function index(){

		// 	$usermodel = new UserModel;
		// 	$modelArray->$usermodel->FindOneByPseudo($_POST['pseudo']);

		// 	$this->render('login/index');
		// }

		public function login(){
			$this->render('login/index');

			if (isset($_POST['pseudo'])) {
				$UserModel = new UserModel;
				$UserArray = $UserModel->findOneByPseudo($_POST['pseudo']);

				if(!$UserArray){
				    http_response_code(404);
				    header('Location: /user/login');
					exit;
				}

				header('Location: /message');
			}
			
		}
	}
?>