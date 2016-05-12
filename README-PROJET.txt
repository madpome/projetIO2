BASE DE DONNEES  ET TABLES DISPONIBLES:

TABLE     :users

ATTRIBUTS :firstname //prenom
	   lastname //nom de famille
           mail     //mail
	   pwd      // mot de passe haché avec sel
	   id       // clef primaire unique identifiant auto_increment
           rank     // rang de l'utilisateur (0=lambda 1=admin)
           user     // nom d'utilisateur
           preference // preference pour les styles css



TABLE	  :article

ATTRIBUTS :article_id //id de l'article clef primaire unique
           user       // nom de l'utilisateur
           date       // date de création de l'article, à fixer a chaque création d'articles avec NOW()
           content    // contenu du texte (20 000 char)
           title      // titre de l'article
           (comment)  // commentaires eventuels si on implante l'extension (2000 char)



TABLE	  :category
ATTRIBUTS :name	//nom de la catégorie


ATTRIBUTS DISPONIBLES DANS LA SESSION SI CONNECTE:

	$_SESSION["connect"]
	$_SESSION["user"]
	$_SESSION["mail"]
	$_SESSION["lastname"]
	$_SESSION["firstname"]
	$_SESSION["rank"]
