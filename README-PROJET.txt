BASE DE DONNEES  ET TABLES DISPONIBLES:

TABLE     :users

ATTRIBUTS :firstname //prenom
	   lastname //nom de famille
           mail     //mail
	   pwd      // mot de passe hach� avec sel
	   id       // clef primaire unique identifiant auto_increment
           rank     // rang de l'utilisateur (0=lambda 1=admin)
           user     // nom d'utilisateur



TABLE	  :article

ATTRIBUTS :article_id //id de l'article clef primaire unique
           user       // nom de l'utilisateur
           date       // date de cr�ation de l'article, � fixer a chaque cr�ation d'articles avec NOW()
           content    // contenu du texte (20 000 char)
           title      // titre de l'article
           category_id// id de la cat�gorie de l'article
		


TABLE	  :category
ATTRIBUTS :name	//nom de la cat�gorie
	   category_id //id de la cat�gorie


ATTRIBUTS DISPONIBLES DANS LA SESSION SI CONNECTE:

	$_SESSION["connect"]
	$_SESSION["user"]
	$_SESSION["mail"]
	$_SESSION["lastname"]
	$_SESSION["firstname"]
	$_SESSION["rank"]

Les tables n'ont pas encore �t� cr��es dans la base de la fac