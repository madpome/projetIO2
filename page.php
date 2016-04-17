<?php
	function welcome(){
		if($_SESSION["connect"]){
			echo "BONJOUR".$_SESSION["fistname"]." ".$_SESSION["lastname"]." votre mail est :".$_SESSION["mail"];
		}else{
			echo "BONJOUR INCONNU";
		}
	}
?>
