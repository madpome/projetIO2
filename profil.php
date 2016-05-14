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
