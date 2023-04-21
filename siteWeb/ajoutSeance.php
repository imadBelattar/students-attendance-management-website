<?php
// session_start();
// $pseudo=$_SESSION['pseudo'];
// if(isset($_SESSION['pseudo'])){
$pseudo = $_POST['professeurUser'];
// Get the values of the form elements
$semestreId = $_POST['semestreId'];
// $ajoutSemaine = $_POST['ajoutSemaine'];
// $emploiId = $_POST['emploiId'];
$filiereId = $_POST['filiereId'];
$groupId = $_POST['groupId'];
$matiere = $_POST['matiere'];
$seanceId = $_POST['seanceId'];
$salle = $_POST['salle'];
$duration = $_POST['duration'];
$semaineDebut = $_POST['semaineDebut'];
$semaineFin = $_POST['semaineFin'];

// Load the XML file
$doc = new DOMDocument();
$doc->load('../auth/xml1.xml');

// Create a new DOMXPath object
$xpath = new DOMXPath($doc);

$seanceNodeExist = $xpath->query("//seance[@id='$seanceId.$pseudo' and @semestreId='$semestreId']")->item(0);

if($seanceNodeExist !== null){
    // update the existing seance element
    // $semestreIdNode = $xpath->query("semestreId", $seanceNodeExist)->item(0);
    $semestreIdNode->nodeValue = $semestreId;
    $groupIdNode = $xpath->query("groupId", $seanceNodeExist)->item(0);
    $groupIdNode->nodeValue = $groupId;
    $matiereIdNode = $xpath->query("matiereId", $seanceNodeExist)->item(0);
    $matiereIdNode->nodeValue = $matiere;
    $salleNode = $xpath->query("salle", $seanceNodeExist)->item(0);
    $salleNode->nodeValue = $salle;
    $durationNode = $xpath->query("duration", $seanceNodeExist)->item(0);
    $durationNode->nodeValue = $duration;
    $semaineDebutNode = $xpath->query("semaineDebut", $seanceNodeExist)->item(0);
    $semaineDebutNode->nodeValue = $semaineDebut;
    $semaineFinNode = $xpath->query("semaineFin", $seanceNodeExist)->item(0);
    $semaineFinNode->nodeValue = $semaineFin;
} else {
    $seanceNode = $doc->createElement('seance');
    $seanceNode->setAttribute('id', $seanceId.$pseudo);
    $seanceNode->setAttribute('semestreId', $semestreId);
    // $semestreIdNode = $doc->createElement('semestreId',$semestreId);
    // $seanceNode->appendChild($semestreIdNode);
    $groupIdNode = $doc->createElement('groupId',$groupId);
    $seanceNode->appendChild($groupIdNode);
    $matiereIdNode = $doc->createElement('matiereId', $matiere);
    $seanceNode->appendChild($matiereIdNode);
    $salleNode = $doc->createElement('salle', $salle);
    $seanceNode->appendChild($salleNode);
    $durationNode = $doc->createElement('duration', $duration);
    $seanceNode->appendChild($durationNode);
    $semaineDebutNode = $doc->createElement('semaineDebut', $semaineDebut);
    $seanceNode->appendChild($semaineDebutNode);
    $semaineFinNode = $doc->createElement('semaineFin', $semaineFin);
    $seanceNode->appendChild($semaineFinNode);
    
    $seancesNode = $xpath->query("//seances")->item(0);
    $seancesNode->appendChild($seanceNode);
}
// insert the user and his seances to the table userSeance
$userSeanceExist = $xpath->query("//userSeance[@userId='$pseudo']")->item(0);
if($userSeanceExist === null){
$userSeanceExist = $doc->createElement('userSeance');
$userSeanceExist->setAttribute('userId', $pseudo);
$userSeances = $xpath->query("//userSeances")->item(0);
$userSeances->appendChild($userSeanceExist);
}
$seanceIdNode = $doc->createElement('seanceId', $seanceId.$pseudo);
$userSeanceExist->appendChild($seanceIdNode);

// fin
$doc->save('../auth/xml1.xml');
// header('location:ajoutSeance.php');
// } else{
//   header('location: ../404.html');
// }