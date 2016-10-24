
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/style.css" media="screen" title="no title">
    <title></title>
    <?php
    try
    {
    // On se connecte à MySQL
    $bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');
    array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
    }
    catch(Exception $e)
    {
    // En cas d'erreur, on affiche un message et on arrête tout
          die('Erreur : '.$e->getMessage());
    }
    ?>
  </head>
  <body>
    <form action="minichat_post.php" method="post">

        <div><input type="text" name="pseudo" required placeholder="votre pseudo" /></div>

        <div><textarea required name="message" rows="8" cols="45" placeholder="votre message" ></textarea></div>
        <div><input type="submit" value="Envoyer" /></div>
    </form>


    <?php

    $reponse = $bdd->query("SELECT * FROM minichat ORDER BY id DESC LIMIT 0,10");

    // On affiche chaque entrée une à une
    while ($donnees = $reponse->fetch())
    {
    ?>
        <p>
        <strong><?php echo htmlspecialchars($donnees['pseudo']); ?>:  </strong><?php echo htmlspecialchars($donnees['message']); ?><br />

       </p>
    <?php
    }

    $reponse->closeCursor();
    ?>

  </body>
</html>
