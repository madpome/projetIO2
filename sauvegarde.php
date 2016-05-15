<?php
//enregistrement
function saveModif(){
	$server="localhost";
	$user="phiear22";
	$base="phiear22";
	$connexion=@mysql_connect($server,$user,'r1M)qu0K');
	mysql_select_db($base,$connexion);
	$reqcatid='SELECT category_id FROM category WHERE name="'.@mysql_real_escape_string($_POST["category"]).'"';
	$result=mysql_query($reqcatid,$connexion) or die(mysql_error());
	$ligne=mysql_fetch_assoc($result);
	$req='UPDATE article SET content="'.@mysql_real_escape_string($_POST["content"]).'",category_id='.@mysql_real_escape_string($ligne["category_id"]).' WHERE article_id='.$_POST["article_id"];
	$result=mysql_query($req,$connexion) or die(mysql_error());
	echo "L'article a bien été modifié.";
	
}
function sauvegarde(){
	$server="localhost";
	$user="phiear22";
	$base="phiear22";
	$connexion=@mysql_connect($server,$user,'r1M)qu0K');
	mysql_select_db($base,$connexion);
	if(verification()){
		$lab=array();
		foreach($_POST as $key=>$val){
			$lab[$key]=@mysql_real_escape_string($val);
		}
		$lab["pwd"]=hachage($lab["pwd"]);
		if($lab["pwd"]!=false){	
			$req='INSERT INTO users (firstname,lastname,user,pwd,mail) 	VALUES ("'.@mysql_real_escape_string($lab["firstname"]).'","'.@mysql_real_escape_string($lab["lastname"]).'","'.@mysql_real_escape_string($lab["user"]).'","'.@mysql_real_escape_string($lab["pwd"]).'","'.@mysql_real_escape_string($lab["mail"]).'")';
			mysql_query($req) or die("Une erreur est survenue lors de l'enregistrement:".mysql_error());
			echo "Vous avez bien été inscrit";
		}else{
			echo "Une erreur est survenur lors de l'enregistrement:".mysql_error();
		}
	}else{
		echo "Ce nom d'utilisateur/mail a déjà été utilisé ou les mots de passe ne correspondent pas.";
	}
	mysql_close();
}
function update(){
	$server="localhost";
	$user="phiear22";
	$base="phiear22";
	$connexion=@mysql_connect($server,$user,'r1M)qu0K');
	mysql_select_db($base,$connexion);
	if(verificationupdate()){
		$pwd=$_POST["pwd"];
		$pwd=hachage($pwd);
		$req='UPDATE users SET mail="'.@mysql_real_escape_string($_POST["mail"]).'", firstname="'.@mysql_real_escape_string($_POST["firstname"]).'", lastname="'.@mysql_real_escape_string($_POST["lastname"]).'",pwd="'.@mysql_real_escape_string($pwd).'" WHERE user="'.@mysql_real_escape_string($_SESSION["user"]).'"';
		$result=mysql_query($req,$connexion);
		getatt();
		echo "Vos données ont bien été modifiées";
	}else{
		echo "Vos mots de passes ne correspondent pas ou l'email est déjà utilisé";
	}
}
