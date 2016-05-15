<?php
	//Renvoie la liste des articles correspondants au(x) critère(s) contenu(s) dans $attrReq
	function chercher($donneesReq, $attrReq) {
		//Si les données sont dans un tableau on traite les entrées pour obtenir la requête adaptée
		$server="pams.script.univ-paris-diderot.fr";
		$user="phiear22";
		$base="phiear22";
		$con=@mysql_connect($server,$user,'r1M)qu0K');
		mysql_select_db($base,$con);
		if(sizeof($donneesReq)==0){
			$req='SELECT * FROM article';	
		}else if(is_array($donneesReq)) {
			$req = traiter($donneesReq, $attrReq);
		}else{
			$req = 'SELECT title,user FROM article WHERE '.@mysql_real_escape_string($attrReq).'="'.@mysql_real_escape_string($donneesReq).'"';
		}
		$result=mysql_query($req,$con) or die(mysql_error());
		$ret=array();
		$idx=0;
		while ($ligne=mysql_fetch_assoc($result)) {
			if(is_array($donneesReq)){
				foreach($ligne as $k=>$v){
					$ret[$idx][$k]=$ligne[$k];
				}
			}else{
				$ret[$idx]["user"]=$ligne["user"];
				$ret[$idx]["title"]=$ligne["title"];
			}
			$idx++;
		}
		mysql_close();
		return $ret;
	}
	//Permet d'avoir l'id d'une catégorie via son nom
	function getcatid(&$donnees,&$attr){
		$index=0;
		for($i=0;$i<sizeof($attr);$i++){
			if($attr[$i]=="category"){
				$index=$i;
			}
		}
		$attr[$index]="category_id";
		$server="pams.script.univ-paris-diderot.fr";
		$user="phiear22";
		$base="phiear22";
		$con=@mysql_connect($server,$user,'r1M)qu0K');
		mysql_select_db($base,$con);
		$req='SELECT * FROM category WHERE name="'.@mysql_real_escape_string($donnees[$index]).'"';
		$result=mysql_query($req,$con) or die(mysql_error());
		$ligne=mysql_fetch_assoc($result);
		$donnees[$index]=$ligne["category_id"];
		return;
		
	}
	//Permet de taitrer les entrées $données et $attr pour la requête slq
	//Renvoie le string de la requête slq
	function traiter (&$donneesReq, &$attrReq) {
		$reponse='SELECT * FROM article WHERE ';
		getcatid($donneesReq,$attrReq);
		for($i=0;$i<count($donneesReq);$i++){
			if($i==(count($donneesReq)-1)){
				$reponse.=@mysql_real_escape_string($attrReq[$i]).'="'.@mysql_real_escape_string($donneesReq[$i]).'"';
			}else{
				$reponse.=@mysql_real_escape_string($attrReq[$i]).'="'.@mysql_real_escape_string($donneesReq[$i]).'" AND ';
			}
		}
		return $reponse;
	}
	
	//Renvoie la liste des catégories dans la base de données
	function listeCategory () {
		$server="pams.script.univ-paris-diderot.fr";
		$user="phiear22";
		$base="phiear22";
		$con=@mysql_connect($server,$user,'r1M)qu0K');
		mysql_select_db($base,$con);
		$req = "SELECT * FROM category";
		$result=mysql_query($req,$con);
		$idx=0;
		$ret=array();
		while ($ligne=mysql_fetch_assoc($result)) {
			$ret[$idx]=$ligne["name"];
			$idx++;
		}
		mysql_close();
		return $ret;
	}
?>