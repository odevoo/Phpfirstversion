<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Mon super site</title>


    </head>

    <body>

      <?php
    try
    {
    	// On se connecte à MySQL
    	$bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');
    }
    catch(Exception $e)
    {
    	// En cas d'erreur, on affiche un message et on arrête tout
            die('Erreur : '.$e->getMessage());
    }

    // Si tout va bien, on peut continuer

    // On récupère tout le contenu de la table jeux_video
    $reponse = $bdd->query("SELECT nom, possesseur, console, prix, commentaires, nbre_joueurs_max FROM jeux_video WHERE console='Xbox' OR console='PS2' ORDER BY prix DESC LIMIT 0,10");

    // On affiche chaque entrée une à une
    while ($donnees = $reponse->fetch())
    {
    ?>
        <p>
        <strong>Jeu</strong> : <?php echo $donnees['nom']; ?><br />
        Le possesseur de ce jeu est : <?php echo $donnees['possesseur']; ?>, et il le vend à <?php echo $donnees['prix']; ?> euros !<br />
        Ce jeu fonctionne sur <?php echo $donnees['console']; ?> et on peut y jouer à <?php echo $donnees['nbre_joueurs_max']; ?> au maximum<br />
        <?php echo $donnees['possesseur']; ?> a laissé ces commentaires sur <?php echo $donnees['nom']; ?> : <em><?php echo $donnees['commentaires']; ?></em>
       </p>
    <?php
    }

    $reponse->closeCursor(); // Termine le traitement de la requête

    ?>

    <!-- L'en-tête -->

<?php include("entete.php"); ?>

    <!-- Le menu -->

<?php include("menu.php"); ?>

    <!-- Le corps -->

    <div id="corps">
        <h1>Mon super site</h1>

        <p>
            <a href="bonjour.php?nom=Dupont&amp;prenom=Jean">Dis-moi bonjour !</a><br />

            <?php
$age_du_visiteur = 17;
echo "Le visiteur a $age_du_visiteur ans";
?><br />
<?php
$age = 16;

if ($age <= 12) // SI l'âge est inférieur ou égal à 12
{
    echo "Salut gamin ! Bienvenue sur mon site !<br />";
    $autorisation_entrer = "Oui";
}
else // SINON
{
    echo "Ceci est un site pour enfants, vous êtes trop vieux pour pouvoir  entrer. Au revoir !<br />";
    $autorisation_entrer = "Non";
}

echo "Avez-vous l'autorisation d'entrer ? La réponse est : $autorisation_entrer";
?>

        <br />    Vous allez adorer ici, c'est un site génial qui va parler de... euh... Je cherche encore un peu le thème de mon site. :-D
        </p>
    </div>

    <!-- Le pied de page -->

    <?php include("pied_de_page.php"); ?>

    </body>
</html>
