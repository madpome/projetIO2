<?php
function modifArticle($article_id){
	$server="localhost";
	$user="phiear22";
	$base="phiear22";
	$connexion=@mysql_connect($server,$user,'r1M)qu0K');
	mysql_select_db($base,$connexion);
	$req='SELECT * FROM article WHERE article_id="'.@mysql_real_escape_string($article_id).'"';
	$result=mysql_query($req,$connexion);
	$ligne=mysql_fetch_assoc($result);
	if(empty($ligne) || is_null($ligne) || $ligne==false){
		echo "Cet article n'existe pas.";
	}else{
		$category=listeCategory();
	?>
		<div id="formarticle">
			<form method="post" action="index.php?page=savemodif">
				<?php
				$value=$ligne["title"];
				?>
				<label> Titre : <label> <input type="text" name="title" size=50 value="<?php echo htmlentities($value); ?>" maxlength=200 required disabled="disabled">	
				Catégorie <select name="category">
				<?php
					foreach ($category as $v) {
						echo("<option value=$v");
						if(!empty($ligne["category"]) && $ligne["category"]==$v){
							echo("selected");
						}
						echo ">".htmlentities($v)."</option>";
					}
				?>
				</select>
				<?php
				$value=$ligne["content"];
				?>
				<textarea name="content" rows="50" cols="100" maxlength="20000" required><?php echo htmlentities($value); ?></textarea>
				<input type="hidden" name="article_id" value="<?php echo $ligne["article_id"]; ?>">
				<input type="submit" value="Modifier cet article">
			</form>
		</div>
<?php
	}
}
function choixmodifarticle(){
	echo "<div id='modifarticle'>";
	$server="localhost";
	$user="phiear22";
	$base="phiear22";
	$connexion=@mysql_connect($server,$user,'r1M)qu0K');
	mysql_select_db($base,$connexion);
    if($_SESSION["rank"]==0){
        $req='SELECT * FROM article WHERE user="'.@mysql_real_escape_string($_SESSION["user"]).'"';
    }else{
        $req='SELECT * FROM article';
    }
    $result=mysql_query($req,$connexion);
	if($ligne=mysql_fetch_assoc($result)){
?>
		<form method="post" action="index.php?page=modifarticle">
			<select name="article_id_modif">
			<?php
			echo '<option value='.htmlentities($ligne["article_id"]).'>Titre :'.htmlentities($ligne["title"]).' Auteur:'.htmlentities($ligne["user"]).'</option><br>';
			?>
			</select>
			<?php mysql_close(); ?>
			<input type="submit" value="Modifier cet article">
		</form>
<?php
	}else{
		echo "Il n'y a aucun article à modifier";
	}
	echo "</div>";
}
//Suppression d'articles
function supprarticle($article_id){
    $server="localhost";
	$user="phiear22";
	$base="phiear22";
	$connexion=@mysql_connect($server,$user,'r1M)qu0K');
	mysql_select_db($base,$connexion);
    $req='DELETE FROM article WHERE article_id='.@mysql_real_escape_string($article_id);
    $result=mysql_query($req,$connexion);
    echo "L'article a bien été supprimé";
}
//Suppression d'utilisateur
function supprutilisateur($user_id){
    $server="localhost";
	$user="phiear22";
	$base="phiear22";
	$connexion=@mysql_connect($server,$user,'r1M)qu0K');
	mysql_select_db($base,$connexion);
    $req1='SELECT rank FROM users WHERE id='.@mysql_real_escape_string($user_id);
    $result=mysql_query($req1,$connexion);
    $ligne=mysql_fetch_assoc($result);
    if($ligne["rank"]==1){
        echo "Vous ne pouvez pas supprimer un administrateur.";
    }else{
        $req2='DELETE FROM users WHERE id='.@mysql_real_escape_string($user_id);
        $result=mysql_query($req2,$connexion);
        echo "L'utilisateur a bien été supprimé";
    }
}
//Commandes administrateur
function admincommande(){
    if($_SESSION["rank"]==1){
?>
    <table id="admincommande">
        Commandes administrateur
        <tr>
        	<td><a href="index.php?page=supprmembre">Supprimer un membre</a></td>
	</tr>
        <tr>
        	<td><a href="index.php?page=choixmodif">Modifier un article</a></td>
        </tr>
	<tr>
        	<td><a href="index.php?page=supprarticle">Supprimer un article</a></td>
        </tr>
        <tr>
        	<td><a href="index.php?page=formajoutcategory">Ajouter une catégorie</a></td>
        </tr>
        <tr>
        	<td><a href="index.php?page=choixsupprcategory">Supprimer une catégorie</a></td>
        </tr>
	</table>
<?php
    }
}
//On choisit l'article à supprimer et on l'envoit en POST à la page de suppression
function choixsupprarticle(){
    $server="localhost";
	$user="phiear22";
	$base="phiear22";
	$connexion=@mysql_connect($server,$user,'r1M)qu0K');
	mysql_select_db($base,$connexion);
    if($_SESSION["rank"]==0){
        $req='SELECT * FROM article WHERE user="'.@mysql_real_escape_string($_SESSION["user"]).'"';
    }else{
        $req='SELECT * FROM article';
    }
    $result=mysql_query($req,$connexion);
?>
    <form method="post" action="index.php?page=suppression">
        <select name="article_id_suppr">
            <?php
            while($ligne=mysql_fetch_assoc($result)){
                echo '<option value='.htmlentities($ligne["article_id"]).'>Titre :'.htmlentities($ligne["title"]).' Auteur:'.htmlentities($ligne["user"]).'</option><br>';
            }
            ?>
        </select>
        <?php mysql_close(); ?>
        <input type="submit" value="Supprimer cet article">
    </form>
<?php
}
//On choisit l'utilisateur à supprimer et on l'envoit en POST à la page de suppression
function choixsuppruser(){
    $server="localhost";
	$user="phiear22";
	$base="phiear22";
	$connexion=@mysql_connect($server,$user,'r1M)qu0K');
	mysql_select_db($base,$connexion);
?>
    <form method="post" action="index.php?page=suppression">
        <select name="user_id_suppr">
<?php
    if($_SESSION["rank"]==1){
        $req='SELECT id,user,firstname,lastname FROM users';
        $result=mysql_query($req,$connexion);
        while($ligne=mysql_fetch_assoc($result)){
            echo '<option value='.htmlentities($ligne["id"]).">ID:".htmlentities($ligne["id"])." Nom:".htmlentities($ligne["lastname"])." Prénom:".htmlentities($ligne["firstname"])."</option><br>";
        }
        echo "</select>";
        mysql_close();
        echo '<input type="submit" value="Supprimer cet utilisateur">';
        echo '</form>';
	}
}
//On choisit la catégorie à supprimer
function choixsupprcate(){
    $server="localhost";
	$user="phiear22";
	$base="phiear22";
	$connexion=@mysql_connect($server,$user,'r1M)qu0K');
	mysql_select_db($base,$connexion);
?>
    <form method="post" action="index.php?page=suppression">
        <select name="cate_id_suppr">
<?php
    if($_SESSION["rank"]==1){
        $req='SELECT category_id,name FROM category';
        $result=mysql_query($req,$connexion);
        while($ligne=mysql_fetch_assoc($result)){
            echo '<option value='.htmlentities($ligne["category_id"]).">".htmlentities($ligne["name"])."</option><br>";
        }
        echo "</select>";
        mysql_close();
        echo '<input type="submit" value="Supprimer cette categorie">';
        echo '</form>';
	}
}
//suppression de la catégorie
function supprcate($cat_id){
    $server="localhost";
	$user="phiear22";
	$base="phiear22";
	$connexion=@mysql_connect($server,$user,'r1M)qu0K');
	mysql_select_db($base,$connexion);
    $req='DELETE FROM category WHERE category_id='.@mysql_real_escape_string($cat_id);
    $result=mysql_query($req,$connexion) or die(mysql_error());
    echo "La catégorie a bien été supprimé";
}
//Formulaire pour entrer le nom de la nouvelle catégorie
function choixajoutcate(){
?>
    <form method="post" action="index.php?page=ajout">
        Nom de la nouvelle catégorie <input type="text" value="cate_name">
	</form>
<?php
}
?>
<?php
    function suppression(){
        if(!isconnected()){
            pasencoreinscrit();
        }else{
            if(isset($_POST["article_id_suppr"])){
                supprarticle($_POST["article_id_suppr"]);
            }else if(isset($_POST["user_id_suppr"])){
                supprutilisateur($_POST["user_id_suppr"]);
            }else if(isset($_POST["cate_id_suppr"])) {
                supprcate($_POST["cate_id_suppr"]);
            }
        } 
    }
    
	function ajoutCat() {
        if(isset($_POST["cate_name"])){
			$name=$_POST["cate_name"];
            $server="localhost";
			$user="phiear22";
			$base="phiear22";
			$connexion=@mysql_connect($server,$user,'r1M)qu0K');
			mysql_select_db($base,$connexion);
			$req = 'SELECT * FROM category WHERE name='.@mysql_real_escape_string($name);
			$result = mysql_query($req,$connexion);
			if($result==false || !($ligne=mysql_fetch_assoc($result))){
				$req = 'INSERT INTO category (name) VALUES ("'.@mysql_real_escape_string($name).'")';
				$result=mysql_query($req,$connexion) or die(mysql_error());
				echo "La catégorie a bien été ajoutée.";
			} else {
				echo "Cette catégorie existe déjà";
			}
		}else{
			echo "Veuillez rentrer un nom de catégorie";
		}
    }

	function formajoutcategory() {
?>
	<form action="index.php?page=ajoutCat" method="post">
		Nom de la catégorie à ajouter (200 caractères max) : <input type="text" name="cate_name" placeholder="Nom de la catégorie" maxlength=200>
		<input type="submit" value="Ajouter">
	</form>
<?php
}
?>
