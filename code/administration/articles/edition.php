<?php
require_once('../../ressources/includes/connexion-bdd.php');

$pageCourante = "articles";

$formulaire_soumis = !empty($_POST);
$entree_mise_a_jour = array_key_exists("id", $_GET);

$entite = null;
if ($entree_mise_a_jour) {
    $commande = $clientMySQL->prepare('SELECT * FROM article WHERE id = :id');
    $commande->execute([
        "id" => $_GET["id"]
    ]);

    $entite = $commande->fetch();
}

if ($formulaire_soumis) {
    // On crée une nouvelle entrée
    $commande = $clientMySQL->prepare("
        UPDATE article
        SET titre = :titre, chapo = :chapo, contenu = :contenu, image = :image; date_creation = :date_creation,  date_derniere_mise_a_jour = :date_derniere_mise_a_jour, lien_yt =:lien_yt
        WHERE id = :id
    ");

    $titre = htmlentities($_POST["titre"]);
    $chapo = htmlentities($_POST["chapo"]);
    $contenu = htmlentities($_POST["contenu"]);

    $date_creation = NEW DateTimeImmutable();
    $date_derniere_mise_a_jour = NEW DateTimeImmutable();
  


    $commande->execute([
        "titre" => $titre,
        "chapo" => $chapo,
        "contenu" => $contenu,

        "date_creation" => $date_creation->format('Y-m-d H:i:s'),


       
    ]);
}    $racineURL = pathinfo($_SERVER['REQUEST_URI']);
$pageRedirection = $racineURL['dirname'];
header("Location: $pageRedirection"); 

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <?php include_once("../ressources/includes/head.php"); ?>

    <title>Editer REMPLACER - Administration</title>
</head>

<body>
    <div class="d-flex h-100">
        <?php include_once("../ressources/includes/menu-lateral.php"); ?>
        <div class="b-example-divider"></div>
        <main class="flex-fill">
            <header class="d-flex justify-content-between align-items-center p-3">
                <p class="fs-1">Editer</p>
            </header>

            <section class="p-3">
                <?php if ($entite) { ?>
                    <form method="POST" action="">
                        <section class="row flex-column">
                            <input type="hidden" value="<?php echo $_GET["id"]; ?>" name="id">

                            <div class="mb-3 col-md-6">
                                <label for="titre" class="form-label">Titre</label>
                                <input type="text" value="<?php echo $entite['titre']; ?>" name="titre" class="form-control" id="titre">
                            </div>

                            <div class="mb-3 col-md-6">
                                <label for="chapo" class="form-label">chapo</label>
                                <input type="text" value="<?php echo $entite['chapo']; ?>" name="chapo" class="form-control" id="chapo">
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="contenu" class="form-label">Contenu</label>
                                <input type="text" value="<?php echo $entite['contenu']; ?>" name="contenu" class="form-control" id="contenu">
                            </div>



                         <div class="mb-3 col-md-6">
                            <label for="date_creation" class="form-label">Date de création</label>
                            <input type="datetime-local" name="date_creation" class="form-control" id="date_creation"></input>
                        </div>

                        <div class="mb-3 col-md-6">
                            <label for="date_derniere_mise_a_jour" class="form-label">date de derniére mise à jour</label>
                            <input type="datetime-local" name="date_derniere_mise_a_jour" class="form-control" id="date_derniere_mise_a_jour"></input>
                        </div>
                           

                        <div class="mb-3 col-md-6">
                            <label for="image" class="form-label">image</label>
                            <input type="text" name="image" class="form-control" id="image"></input>
                         </div>

                            <div class="mb-3 col-md-6">
                            <label for="auteur" class="form-label">auteur</label>
                            <input name="auteur"  id="auteur"></input>

                        </div>

               
                        <div class="mb-3 col-md-6">
                            <label for="lien_yt" class="form-label">lien youtube</label>
                            <input type="text" name="lien_yt" class="form-control" id="lien_yt"></input>
                        </div>



                            <!-- A compléter -->
                            <div class="mb-3  col-md-6">
                                <button type="submit" class="btn btn-primary">Envoyer</button>
                            </div>
                        </section>
                    </form>
                <?php } else { ?>
                    <!-- A compléter -->
                <?php } ?>
            </section>
        </main>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>