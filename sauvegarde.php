<?php
include_once("verification.php");
//enregistrement 
function sauvegarde(){
	$server="pams.script.univ-paris-diderot.fr";
	$user="phiear22";
	$base="phiear22";
	$connexion=mysql_connect($server,$user,'r1M)qu0K');
	mysql_select_db($base,$connexion);
	if(verification()){
		$lab=array();
		foreach($_POST as $key=>$val){
			$lab["key"]=mysql_real_escape_string($val);
		}
		$lab["pwd"]=hachage($lab["pwd"]);
		if($lab["pwd"]!=false){	
			$req='INSERT INTO users (firstname,lastname,user,pwd,mail) 	VALUES ("'.$lab["firstname"].'","'.$lab["lastname"].'","'.$lab["user"].'","'.$lab["pwd"].'","'.$lab["mail"].'")';
			mysql_query($req) or die("Une erreur est survenue lors de l'enregistrement:".mysql_error());
		}else{
			echo "Une erreur est survenur lors de l'enregistrement:".mysql_error();
		}
		mysql_close();
	}else{
		echo "Ce nom d'utilisateur/mail a déjà été utilisé";
		mysql_close();
		header('Location: index.php');
	}
}
