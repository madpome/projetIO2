<?php
    function profil(){
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
    <a href="index.php?page=inscription">Modifier mes données personnelles</a>
</div>
<?php
    }
?>