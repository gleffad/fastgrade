/**
 * Proposition :
 * Reste à editer un lien vers la page du sujet où l'on pourra telecharger le 
 * sujet au format pdf, ou une page où l'etudiant pourra observer le sujet de
 * chaque exercice et avoir un bouton de soumission en dessous de chaque exo.
 * Vous preferez quoi ?
 */

<?php
include '../connect.php';

$input_ue_code = $_GET['input_ue_code'];
$request = $data_base->query("SELECT * FROM subject WHERE ue_code = \"$input_ue_code\"");
while($data = $request->fetch()) {
	$var = $var . $data['subject_number']. " " . $data['statement'] . "\n" ;
}

echo $var;
?>
