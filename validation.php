<?php
require('config/config.php');
require('model/functions.fn.php');
session_start();

if(	isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password']) &&
	!empty($_POST['username']) && !empty($_POST['email']) && !empty($_POST['password'])) {


	if(isUsernameAvailable($_POST['username']) && isEmailAvailable($_POST['email'])){
		userRegistration(PDO $db, $_POST['username'], $_POST['email'], $_POST['password']);
		header('Location: login.php');
	}else{
		header('Location: register.php');
		$error = "l'username ou l'email est déjà pris.";
	}



}else{
	$_SESSION['message'] = 'Erreur : Formulaire incomplet';
	header('Location: register.php');
}
