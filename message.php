<?php
include ("connect.php");

$pseudo =$_POST['pseudo'];

$message = $_POST['message'];

$req=$bdd->prepare("INSERT INTO chat (pseudo, message) VALUES (:pseudo, :message)");

$req->execute(array (
   'pseudo'=>$pseudo,
   'message'=>$message
));

setcookie('pseudo', $_POST['pseudo'], time() + 365*24*3600, null, null, false, true);

header('Location: index.php');
?>
