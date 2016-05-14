<?php
    function suppression(){
        if(!isconnected()){
            pasencoreinscrit();
        }else{
            $item="";
            if(isset($_POST["article_id_suppr"])){
                supprarticle($_POST["article_id_suppr"]);
            }else if(isset($_POST["user_id_suppr"])){
                supprutilisateur($_POST["user_id_suppr"]);
            }      
        } 
    }