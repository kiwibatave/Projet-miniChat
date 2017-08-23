<?php
// Connexion à la base de données
/* TODO */
include("connect.php");

if ($_POST) {
    // Insertion du message à l'aide d'une requête préparée
    /* TODO */
}

$pseudocookie = $_COOKIE['pseudo'];

?>
<!DOCTYPE>
<html>

<head>
    <title>MiniChat Project II - The Return</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Material Design Light -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://code.getmdl.io/1.1.3/material.indigo-pink.min.css">
</head>

<body>
    <div class="mdl-layout mdl-js-layout">
        <main class="mdl-layout__content">
            <div class="page-content">
                <ul class="demo-list-item mdl-list" id="conversation">
<?php
// Récupération des 10 derniers messages
/* TODO */
$reponse = $bdd->query('SELECT pseudo, message FROM chat ORDER BY ID DESC LIMIT 0, 10');


// Affichage de chaque message (toutes les données sont protégées par htmlspecialchars)
/* TODO */

//  Pagination des messages
$pagination=$bdd->query("SELECT COUNT(id) AS nb_message FROM chat");

$michel = $pagination->fetchAll();

foreach ($michel as $value)
{
  echo '<p>Nombre de message sur le chat :'.$value->nb_message.'</p>';
}

// Création lien par pages
$nombre_message = $value->nb_message;
// On récupère le nombre de messages total en créant une variable
$nombre_message_page = 9;
// On définit le nombre de messages que l'on souhainte afficher par pages en créant une variable
$nombre_page = ceil($nombre_message / $nombre_message_page);
// On créé une variable qui va calculer le nombre de pages en fonction de messages total et le nombre de messages que l'on veut afficher par page
echo '<p>Nombre de Pages : '.$nombre_page.'</p>';
// On affiche le résultat
for ($i=1; $i <= $nombre_page; $i ++) {
// On créé un compteur pour définir le nombre de pages
  echo '<a href="index.php?page=' . $i . '"><button>' . $i . '</button></a>';
}
// On affiche le nombre de pages afin de pouvoir les parcourir
if (isset($_GET['page']))
{
  $page= $_GET['page'];
}
else
{
  $page = 1;
}
$firstMessageToShow = ($page - 1) * $nombre_message_page;
// fin de la pagination
$reponse = $bdd->query('SELECT pseudo, message FROM chat ORDER BY ID DESC LIMIT ' . $firstMessageToShow . ' , ' . $nombre_message_page);

$reponse2 = $reponse->fetchAll();

foreach ($reponse2 as $value)
{
  $value->message = str_replace(':smile_cat','<img style="width: 30px; height: 30px" src="smile_cat.png"/>', $value->message);
  echo '<p><strong>'.htmlspecialchars($value->pseudo).'</strong>: '.($value->message).'</p>';
}
?>
                    <li class="mdl-list__item">
                        <span class="mdl-list__item-primary-content">
                            <strong><?php /* TODO */ ?></strong> <?php /* TODO */ ?>
                        </span>
                    </li>
<?php
// }
// ...
?>
                </ul>

                <form action="message.php" class="mdl-grid" method="POST">
                    <div class="mdl-cell mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                        <input class="mdl-textfield__input" type="text" name="pseudo" id="pseudo" value="<?php echo $pseudocookie; ?>">
                        <label class="mdl-textfield__label" for="sample3">Pseudo</label>
                    </div>
                    <div class="mdl-cell mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                        <input class="mdl-textfield__input" type="text" name="message" id="message">
                        <label class="mdl-textfield__label" for="sample3">Message</label>
                    </div>
                    <button id="send" class="mdl-cell mdl-button mdl-js-button mdl-button--fab mdl-button--mini-fab mdl-button--colored">
                        <i class="material-icons">send</i>
                    </button>
                </form>
            </div>
        </main>
    </div>

    <!-- Scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.3/jquery.min.js"></script>
      <script language="javascript">
        setTimeout(function(){
        window.location.reload(1);
        }, 30000);
      </script>
    <!-- Material Design Light -->
    <script defer src="https://code.getmdl.io/1.1.3/material.min.js"></script>
</body>

</html>
