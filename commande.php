<?php
//Suppression d'articles
function supprarticle($article_id){
    $server="localhost";
	$user="phiear22";
	$base="phiear22";
	$connexion=@mysql_connect($server,$user,'r1M)qu0K');
	mysql_select_db($base,$connexion);
    $req='DELETE FROM article WHERE article_id='.$article_id;
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
    $req1='SELECT rank FROM users WHERE id='.$user_id;
    $result=mysql_query($req1,$connexion);
    $ligne=mysql_fetch_assoc($result);
    if($ligne["rank"]==1){
        echo "Vous ne pouvez pas supprimer un administrateur.";
    }else{
        $req2='DELETE FROM users WHERE id='.$user_id;
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
        	<td><a href="index.php?page=ajoutercategory">Ajouter un catégorie</a></td>
        </tr>
        <tr>
        	<td><a href="index.php?page=supprcategory">Supprimer une catégorie</a></td>
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
        $req='SELECT article_id,title,user FROM article WHERE user='.$_SESSION["user"];
    }else{
        $req='SELECT title,user,article_id FROM article';
    }
    $result=mysql_query($req,$connexion);
?>
    <form method="post" action="index.php?page=suppression">
        <select name="article_id_suppr">
            <?php
            while($ligne=mysql_fetch_assoc($result)){
                echo '<option value='.$ligne["article_id"].'>Titre :'.$ligne["title"].' Auteur:'.$ligne["user"].'</option><br>';
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
            echo '<option value='.$ligne["id"].">ID:".$ligne["id"]." Nom:".$ligne["lastname"]." Prénom:".$ligne["firstname"]."</option><br>";
        }
        echo "</select>";
        mysql_close();
        echo '<input type="submit" value="Supprimer cet utilisateur">';
        echo '</form>';
	}
}
?>

