<?php 
namespace App\Controllers;
use App\Models\UserModel;

	class UserController extends Controller
	{
		//methode de la page login
		public function login(){
			
			//On affiche la view login
			$this->render('login/index');
			
			//On instancie la classe UserModel
			$UserModel = new UserModel; 

			//On vérifie si les champs ont été remplie
			if (isset($_POST['pseudo']) AND !empty($_POST['pseudo'])) {
				
				$pseudo = strip_tags($_POST['pseudo']);
				$password = $_POST['password'];
				
				//On cherche les données via le pseudo
				$UserArray = $UserModel->findOneByPseudo($pseudo);

				//On vérifie si l'utilisateur éxiste
				if(!$UserArray){
				    http_response_code(404);
				    header('Location: /user/login');
					exit;
				}
				
				//On hydrate les données dans la classe UserModel
				$User = $UserModel->hydrate($UserArray);

				//On vérifie si le password correspond et on créer la session
				if(password_verify($password, $User->getPassword())){
				
					$_SESSION['pseudo'] = $pseudo;
					header('Location: /message');
				}
			}
			
		}

		//mehtode la page inscription
		public function register(){
			
			//On affiche la view
			$this->render('register/index');
			
			//On vérifie si les champs on bien été remplie
			if (isset($_POST['pseudo']) AND !empty($_POST['pseudo'])) {
				
				$pseudo = strip_tags($_POST['pseudo']);
				$password = $_POST['password'];

				//On instancie la classe UserModel
				$UserModel = new UserModel;

				//On vérifie si le pseudo éxiste déja ou non 
				$UserArray = $UserModel->findOneByPseudo($pseudo);

				//Si le pseudo n'a pas été utilisé on le filtre 
				if(!$UserArray AND $UserModel->pseudoVerify($pseudo)){
				    
				    //On hydrate les données dans la classe UserModel
				    $donnes = [
				    	'pseudo'=>$pseudo,
				    	'password'=>password_hash($password, PASSWORD_DEFAULT)
				    ];
				    $UserModel->hydrate($donnes);
				  
				    //On créer le user dans la bdd
				    $UserModel->create();
				    
				    //On créer la session 
				    $_SESSION['pseudo'] = $pseudo;
				    
				    //On redirectionne sur la page message
				    //header('Location: /message');
					//exit;
				}
				
				//Sinon on redirection sur la page register
				//header('Location: /user/register');
			}
		}

		//methode de logout
		public function logout(){
			unset($_SESSION['pseudo']);
		    header('Location: '. $_SERVER['HTTP_REFERER']);
		    exit;
		}
	}
?>