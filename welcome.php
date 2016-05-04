<?php
	include_once("affichage.php");
	include_once("recherche.php");
?>
<DOCTYPE! html>
<head>
	<title> Accueil </title>
	<meta charset="UTF-8">
<head>
<body>
	
	<div>
		<?php
			$server="pams.script.univ-paris-diderot.fr";
			$user="phiear22";
			$base="phiear22";
			$connexion=mysql_connect($server,$user,'r1M)qu0K');
			$value = chercherS(null, null, $connexion);
			
			$value = array_reverse($value, true);
			$compteur = 0;
			foreach($value as $v){
				$compteur++;
				affichage_partiel($v);
				if($compteur == 6) {
					break;
				}
			}
		?>
	</div>
	
</body>
</html>