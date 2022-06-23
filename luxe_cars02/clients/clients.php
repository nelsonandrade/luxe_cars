<?php
Class client{

    private $pdo;

    public function connexion ($nombd, $host, $email, $mot_pass)
    {
        global $pdo;
        global $msgError;
        try {
        $pdo = new PDO("mysql: dbname=".$nombd.";host=".$host,$email,$mot_pass);
        } catch (PDOException $e){
            $msgError = $e->getMessage();
        }
    }

    public function compte ($nom, $prenom, $telephone, $email, $mot_pass)
    {
        global $pdo;
        global $msgErro;

      //vérifier s'il y a un utilisateur enregistré
      $sql = $pdo->prepare("SELECT id_client FROM clients WHERE email=:e"); //obtenir l'identifiant de l'utilisateur à la recherche de l'e-mail rempli lors de l'enregistrement
      $sql->bindValue(":e", $email); 
      $sql->execute();
  		if($sql->rowCount() > 0 ) //vérifier qu'il y avait une réponse dans la requête
  		{
  			return false; // déjà inscrit
  		}
  		else
  		{
  			//alors n'ai pas
  			$sql = $pdo->prepare("INSERT INTO clients (nom, prenom, telephone, email, mot_pass) VALUES (:n, :p, :t, :e, :s)");
	  		$sql->bindValue(":n", $nom);
            $sql->bindValue(":p", $prenom); 
	  		$sql->bindValue(":t", $telephone);
	  		$sql->bindValue(":e", $email);
	  		$sql->bindValue(":s", md5($mot_pass));//md5 est de crypter le mot de passe
	  		$sql->execute();
	  		return true;
  		}
  	} 


    public function login ($email, $mot_pass)
    {
            global $pdo;	
            global $msgErro;

        /*vérifier si l'email et le mot de passe sont enregistrés, si oui*/
        $sql= $pdo->prepare("SELECT id_client FROM clients WHERE email=:e AND mpasse=:s");
        $sql->bindValue(":e", $email);
        $sql->bindValue(":s", md5($mot_pass));
        $sql->execute();
        if($sql->rowCount() > 0 ) //vérifier qu'il y avait une réponse dans la requête
        {
            //se connecter au système en créant une (session)
            $dado = $sql->fetch(); // transforme le retour de la requête en un tableau avec des noms de colonnes
            session_start();  //démarrage de la séance
            $_SESSION['id_client'] = $dado['id_client']; //stocke l'identifiant de l'utilisateur dans la session.
            return true;  //connecté avec succès
        }
        else
        {
            return false; //erreur lors de la connexion
        }
    }
}
    






?>


