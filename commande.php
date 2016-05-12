<?php
//Suppression d'articles
function supprarticle($id){
    $server="pams.script.univ-paris-diderot.fr";
	$user="phiear22";
	$base="phiear22";
	$connexion=mysql_connect($server,$user,'r1M)qu0K');
	mysql_select_db($base,$connexion);
    $req='DELETE FROM article WHERE article_id='.$id;
    $result=mysql_query($req,$connexion);
    echo "L'article a bien été supprimé"
}
function admincommande(){
    if($_SESSION["rank"]==1){
?>
    <ul>
        <li>Commandes administrateur</li>
        <li>
            <a href="index.php?page=supprmember">Supprimer un membre</a>
        </li>
        <li>
            <a href="index.php?page=modifarticle">Modifier un article</a>
        </li>
        <li>
            <a href="index.php?page=supprarticle">Supprimer un article</a>
        </li>   
    </ul>
<?php
    }
}
?>
