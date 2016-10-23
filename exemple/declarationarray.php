<?php
// La fonction array permet de créer un array
$prenoms = array ('François', 'Michel', 'Nicole', 'Véronique', 'Benoît');
?>




OU



<?php
$prenoms[0] = 'François';
$prenoms[1] = 'Michel';
$prenoms[2] = 'Nicole';
?>




TABLEAU Associatif

Pour en créer un, on utilisera la fonction array comme tout à l'heure, mais on va mettre « l'étiquette » devant chaque information :

<?php
// On crée notre array $coordonnees
$coordonnees = array (
    'prenom' => 'François',
    'nom' => 'Dupont',
    'adresse' => '3 Rue du Paradis',
    'ville' => 'Marseille');
?>



Parcourir un tableau avec foreach

<?php
$prenoms = array ('François', 'Michel', 'Nicole', 'Véronique', 'Benoît');

foreach($prenoms as $element)
{
    echo $element . '<br />'; // affichera $prenoms[0], $prenoms[1] etc.
}
?>


AUTRE exemple



<?php
$coordonnees = array (
    'prenom' => 'François',
    'nom' => 'Dupont',
    'adresse' => '3 Rue du Paradis',
    'ville' => 'Marseille');

foreach($coordonnees as $cle => $element)
{
    echo '[' . $cle . '] vaut ' . $element . '<br />';
}
?>



On doit d'abord lui donner le nom de la clé à rechercher, puis le nom de l'array dans lequel on fait la recherche :

<?php array_key_exists('cle', $array); ?>
La fonction renvoie un booléen, c'est-à-dire true (vrai) si la clé est dans l'array, et false (faux) si la clé ne s'y trouve pas. Ça nous permet de faire un test facilement avec un if :
