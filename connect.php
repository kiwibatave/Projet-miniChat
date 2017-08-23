<?php
try
{
  $bdd = new PDO('mysql:host=localhost;dbname=mini_chat;charset=utf8', 'root', 'coda');
  $bdd->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);
  $bdd->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);
}
  catch(PDOException $e)
{
     echo $e->getMessage();
}
?>
