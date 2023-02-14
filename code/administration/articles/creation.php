<?php
require_once('../../ressources/includes/connexion-bdd.php');

$pageCourante = "articles";

$formulaire_soumis = !empty($_POST);
$entree_mise_a_jour = array_key_exists("id", $_GET);
$article = null;


if ($entree_mise_a_jour) {
    $chercherArticleCommande = $clientMySQL->prepare('SELECT * FROM article WHERE id = :id');
    $chercherArticleCommande->execute([
        "id" => $_GET["id"]
    ]);

    $article = $chercherArticleCommande->fetch();
    $article = $chercherArticleCommande--> feof(); 
}

if ($formulaire_soumis) {
    // On crée une nouvelle entrée
    $chercherArticleCommande = $clientMySQL->prepare("
        UPDATE article
        SET titre = :titre, chapo = :chapo, 
        contenu = :contenu, image = :image,
        date_creation = :date_creation, 
        date_derniere_mise_a_jour = :date_derniere_mise_a_jour, auteur_id = :auteur_id, lien_yt = :lien_yt
        where id = id Return= echo" cest fauc"
    ");
    $date = new DateTimeImmutable();
    $chercherArticleCommande->execute([
        "titre" => $_POST["titre"],
        "chapo" => $_POST["chapo"],
        "contenu" => $_POST["contenu"],
        "image" => $_POST["image"],
        
        'date_creation' => $date->format('Y-m-d H:i:s'),
        'date_derniere_mise_a_jour' => $date->format('Y-m-d H:i:s'),
        
        "auteur_id" => $_POST["auteur_id"],
        "lien_yt" => $_POST["lien_yt"],
        "id"=>$_POST["id"],
    ]);
}

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <?php include_once("../ressources/includes/head.php"); ?>

    <title>Page Articles- Administration</title>
</head>

<body>
    <div class="d-flex h-100">
        <?php include_once("../ressources/includes/menu-lateral.php"); ?>
        <div class="b-example-divider"></div>
        <main class="flex-fill ">
            <header class="d-flex justify-content-between align-items-center p-3">
                <p class="fs-1">Créer</p>
            </header>

            <section class="p-3">
                <form method="POST" action="">
                    <section class="row flex-column">
                        <div class="mb-3 col-md-6">
                            <label for="titre" class="form-label">Titre</label>
                            <input type="text" name="titre" class="form-control" id="titre">
                        </div>

                        <div class="mb-3 col-md-6">
                            <label for="chapo" class="form-label">Chapô</label>
                            <textarea type="text" name="chapo" class="form-control" id="chapo"></textarea>
                        </div>

                        <!--  modifier le formulaire ADEL    -->
                        <div class="mb-3 col-md-6">
                            <label for="contenu" class="form-label">Le contenu de l'article</label>
                            <textarea type="text" name="contenu" class="form-control" id="contenu"></textarea>
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
                            <label for="auteur_id" class="form-label">ID de l'auteur</label>
                            <input type="number" name="auteur_id" class="form-control" id="auteur_id"></input>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="lien_yt" class="form-label">lien youtube</label>
                            <input type="text" name="lien_yt" class="form-control" id="lien_yt"></input>
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
                            <label for="auteur-select">auteur</label>
                            <select name="auteur" id="auteur-select"> 
                            </select>

                            <option >Choisir un auteur   </option>
                            
                            <?php
                            foreach ($listeAuteurs as $auteur){
                              ?> 

                              <h1> le petit text qui apparait ici</h1>

                                <option value=<?php echo $auteur ["id"] ?>><?php echo $auteur["prenom_auteur"]."". $auteur ["nom_auteur"]?></option>
                            
                                <?php } ?>
                                </select> 
                        </div>
                        <!--  modifier le formulaire ADEL    -->

                        <div class="mb-3  col-md-6">
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