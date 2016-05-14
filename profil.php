<?php
    function profil(){
        if(!isconnected()){
            pasencoreinscrit();
        }else{
?>
<div id="profil">
    <table id="tableprofil">
        <tr>
            <td>
                Nom:
            </td>
            <td>
                <?php echo $_SESSION["lastname"]; ?>
            </td>
        </tr>
        <tr>
            <td>
                Prénom:
            </td>
            <td>
                <?php echo $_SESSION["firstname"]; ?>
            </td>
        </tr>
        <tr>
            <td>
                Adresse mail:
            </td>
            <td>
                <?php echo $_SESSION["mail"]; ?>
            </td>
        </tr>
        <tr>
            <td>
                Votre liste d'article :
            </td>
			<td>
<?php			    
			$server="pams.script.univ-paris-diderot.fr";
			$user="phiear22";
			$base="phiear22";
			$connexion=mysql_connect($server,$user,'r1M)qu0K');
			afficherListeArticle ($_SESSION["user"], "user", $connexion);
?>
			</td>
        </tr>
    </table>
    <a href="index.php?page=inscription">Modifier mes données personnelles</a><br>
<?php
    if($_SESSION["rank"]==1){
        admincommande();
    }
?>
</div>
<?php
        }
    }
    function pasencoreinscrit(){
?>
    <div id="pasencoreinscrit">
        Vous devez être connecté pour acceder à cette page.<br>
        <a href="index.php?page=inscription">Pas encore inscrit ? Cliquez ici !</a>
    </div>
<?php
    }
?>
