<?php
require_once('../../ressources/includes/connexion-bdd.php');

$pageCourante = "auteurs";

    if (isset(
        $_POST["nom_auteur"],
        $_POST["prenom"],
        $_POST["lien_avatar"],
        $_POST["lien_twitter"]
    )) {
        // On crée une nouvelle entrée
        $creerAuteurCommande = $clientMySQL->prepare('INSERT INTO auteur(prenom, nom, lien_avatar, lien_twitter) VALUES (:prenom, :nom_auteur, :lien_avatar, :lien_twitter)');

        $nom = htmlentities($_POST["nom-auteur"]);
        $prenom = htmlentities($_POST["prenom"]);
        $lienAvatar = htmlentities($_POST["lien_avatar"]);
        $lienTwitter = htmlentities($_POST["lien_twitter"]);

        $creerAuteurCommande->execute([
            "nom" => ($_POST["nom"]),
            "prenom" => ($_POST["prenom"]),
            "lien_avatar" => ($_POST["lien_avatar"]),
            "lien_twitter" => ($_POST["lien_twitter"]),
        ]);
    }

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <?php include_once("../ressources/includes/head.php"); ?>

    <title>Creation auteur - Administration</title>
</head>

<body>
    <div class="d-flex h-100">
        <?php include_once("../ressources/includes/menu-lateral.php"); ?>
        <div class="b-example-divider"></div>
        <main class="flex-fill">
            <header class="d-flex justify-content-between align-items-center p-3">
                <p class="fs-1">Créer</p>
            </header>

            <section class="p-3">
                <form method="POST" action="">
                    <section class="row flex-column">
                        <div class="mb-3 col-md-6">
                            <label for="nom" class="form-label">Nom</label>
                            <input type="text" name="nom" class="form-control" id="nom">
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="prenom" class="form-label">Prénom</label>
                            <input type="text" name="prenom" class="form-control" id="prenom">
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="lien_avatar" class="form-label">Lien avatar</label>
                            <input type="texte" name="lien_avatar" class="form-control" id="lien_avatar">
                            <div class="form-text">
                                Mettre l'URL de l'avatar (chemin absolu)
                            </div>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="lien_twitter" class="form-label">Lien twitter</label>
                            <input type="text" value="" name="lien_twitter" class="form-control" id="lien_twitter">
                        </div>
                        <div class="mb-3 col-md-6">
                            <button type="submit" class="btn btn-primary">Envoyer</button>
                        </div>
                    </section>
                </form>
            </section>
        </main>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>