<?php
	function chercher ($données, $attr, $connexion) {
		$req = "SELECT * FROM Articles WHERE \"$attr\" = \"$données\"";
		$result = mysql_query($connexion, $req);
		$ret;
		$idx = 0;
		while ($result != false) {
			$ret[$idx] = mysql_fetch_assoc($result);
			$idx++;
		}
		return $ret;
	}
?>
