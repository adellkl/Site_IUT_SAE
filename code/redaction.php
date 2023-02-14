<?php
$couleur_bulle_classe = "jaune";
$page_active = "redaction";

require_once('./ressources/includes/connexion-bdd.php');
$listeAuteursCommande = $clientMySQL->prepare ('SELECT * FROM auteur');
$listeAuteursCommande->execute () ;
$listeAuteurs = $listeAuteursCommande->fetchAll ();

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Equipe de rédaction</title>

    <link rel="stylesheet" href="ressources/css/ne-pas-modifier/reset.css">
    <link rel="stylesheet" href="ressources/css/ne-pas-modifier/global.css">
    <link rel="stylesheet" href="ressources/css/ne-pas-modifier/header.css">


    <link rel="stylesheet" href="ressources/css/global.css">
    <link rel="stylesheet" href="ressources/css/redaction.css">
</head>

<body>
    
        <?php require_once('./ressources/includes/header.php'); ?>
        <?php require_once('./ressources/includes/bulle.php'); ?>

        <main class="conteneur-principal conteneur-1280">

        <h1 class="titre-page">Nos rédacteurs sont qualifiés et essaient de vous offrir des articles qualitatives</h1>
        <br>

    <section class="colonnes">

        <div class="redact">
            <ul class="liste-redacteurs">
                <li class="image-conteneur">
                    <h2 class="titre">Loukal Adel</h2>
                    <p>Le chef rédacteur de cette équipe de rédaction</p> <br>
                   <a> <img class="images" alt="Image" style="width:200px;height:185px;" src="https://images.generated.photos/Oy3ezjvsrWtKpZtwa9-gcm4bzuHzIrrmQiBquALpyrw/rs:fit:512:512/wm:0.95:sowe:18:18:0.33/czM6Ly9pY29uczgu/Z3Bob3Rvcy1wcm9k/LmNvbmQvNzA0NzMw/MzQtNmZiYy00MmU0/LTljMTYtMGE0M2Fj/MjIxNWU3LmpwZw.jpg"></img> </a>
                </li>

                <li class="image-conteneur">
                    <h2 class="titre">Labatte Kevin</h2>
                    <p>Il maîtrise sa plume comme un virtuose</p> <br>
                   <a> <img class="images" alt="Image" style="width:200px;height:185px;" src="https://petapixel.com/assets/uploads/2019/09/6-1.jpg"></img> </a>
                </li>

                <li class="image-conteneur">
                    <h2 class="titre">Sokamesou Eliot</h2>
                    <p>Un expert en écriture, enchaînant toutes les tâches rédactionnelles</p> <br>
                   <a> <img class="images" alt="Image" style="width:200px;height:185px" src="https://images.generated.photos/vk37rX5zFAZgbdg1PxeMeJAII7r4o8QkorWaWn4N1hI/rs:fit:512:512/wm:0.95:sowe:18:18:0.33/czM6Ly9pY29uczgu/Z3Bob3Rvcy1wcm9k/LmNvbmQvMWIyZjUz/OWItMTk4YS00YzQy/LTk2MzYtMjNlN2Iz/NzJjZjBhLmpwZw.jpg"></img> </a>
                </li>

                <li class="image-conteneur">
                    <h2 class="titre">Orius Kuerten</h2>
                    <p>Rédacteur polyvalent, capable de s'adapter à n'importe quelle situation</p> <br>
                   <a> <img class="images" alt="Image" style="width:200px;height:185px" src="https://images.generated.photos/_bmc2idGoB7UDhEGGOCBhDq9i8gmkFOaKTmrA2IkB4A/rs:fit:512:512/wm:0.95:sowe:18:18:0.33/czM6Ly9pY29uczgu/Z3Bob3Rvcy1wcm9k/LmNvbmQvNzQ1YmI3/ZGYtMDYyMC00OGUz/LWFhOGYtMjg1YTQx/MjJjOTllLmpwZw.jpg"></img> </a>
                </li>
            </ul>
        </div>
<?php require_once('./ressources/includes/footer.php'); ?>
      </section>
    </main>  
    
</body>

</html>