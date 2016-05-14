<?php
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
        	<td><a href="index.php?page=modifarticle">Modifier un article</a></td>
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
        $req='SELECT article_id,title,user FROM article WHERE user='.@mysql_real_escape_string($_SESSION["user"]);
    }else{
        $req='SELECT title,user,article_id FROM article';
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
        <select name="cate_name_suppr">
<?php
    if($_SESSION["rank"]==1){
        $req='SELECT cat_id,name FROM category';
        $result=mysql_query($req,$connexion);
        while($ligne=mysql_fetch_assoc($result)){
            echo '<option value='.htmlentities($ligne["cat_id"]).">".htmlentities($ligne["name"])."</option><br>";
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
    $req='DELETE FROM category WHERE cat_id='.@mysql_real_escape_string($cat_id);
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
//Ajout d'une catégorie
function ajoutcate($name) {
    $server="localhost";
	$user="phiear22";
	$base="phiear22";
	$connexion=@mysql_connect($server,$user,'r1M)qu0K');
	$req = 'SELECT * FROM category WHERE name='.@mysql_real_escape_string($name);
	$result = mysql_query($req,$connexion);
	if(!mysql_fetch_assoc($result)){
		$req = 'INSERT INTO category name VALUE '.@mysql_real_escape_string($name);
		$result=mysql_query($req,$connexion) or die(mysql_error());
		echo "La catégorie a bien été ajoutée.";
	} else {
		echo "Cette catégorie existe déjà";
	}
}
?>
