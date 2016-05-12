<?php 
//Fonction qui sert a vérifier que les mots de passes correspondent et que l'utilisateur/mail n'a pas déja été utilisé (inscription)
function verification(){
	$valide=true;
	if ($_POST["pwd"]!=$_POST["pwd2"]){
		$valide=false;
		//Verification username/mail pas déja utilisé
	}
	$req='SELECT user,mail FROM users WHERE user="'.mysql_real_escape_string($_POST["user"]).'"OR mail="'.mysql_real_escape_string($_POST["mail"]).'"';
	$resultat=mysql_query($req);
	$ligne=mysql_fetch_assoc($resultat);
	if($ligne){
		$valide=false;
	}
	return $valide;
}
//Passage des arg
function validation(){
	//passage en htmlentities et passage dans la session
	foreach($_POST as $cle=>$val){
		$_POST[$cle]=htmlentities($val);
		if(!empty($_POST[$cle])){
			$_SESSION[$cle]=$_POST[$cle];
		}
	}
	header('Location: index.php');
}
//fonction 
function hachage($mdp){
	$hache=password_hash($mdp,PASSWORD_DEFAULT);
	if($hache==false){
		return false;
	}else{
		return $hache;
	}
}
?>
