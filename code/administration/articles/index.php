<?php
require_once('../../ressources/includes/connexion-bdd.php');

$commande = $clientMySQL->prepare('SELECT
    
        ar.id,
        ar.titre AS titre_article, 
        ar.titre AS chapo_article,
        ar.contenu AS contenu_article,
        ar.image AS image_article,
        ar.lien_yt AS lien_yt_article,
        ar.date_creation AS date_creation_article,
        ar.date_derniere_mise_a_jour AS date_derniere_mise_a_jour_article,
        ar.auteur_id AS auteur_id_article, 

        CONCAT(auteur.nom, " ", auteur.prenom) AS auteur
    FROM article AS ar 
    LEFT JOIN auteur 
    ON ar.auteur_id = auteur.id;
');
$commande->execute();
$liste = $commande->fetchAll();

$pageCourante = "articles";
$racineURL = $_SERVER['REQUEST_URI'];

$URLCreation = "{$racineURL}/creation.php";
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <?php include_once("../ressources/includes/head.php"); ?>
    <title>Liste articles - Administration</title>
</head>

<body>
    <div class="d-flex h-100">
        <?php include_once("../ressources/includes/menu-lateral.php"); ?>
        <div class="b-example-divider"></div>
        <main class="flex-fill">
            <header class="d-flex justify-content-between align-items-center p-3">
                <p class="fs-1">Liste des articles</p>
                <div>
                    <a href="<?php echo $URLCreation ?>" class="link-primary">Ajouter un élément</a>
                </div>
            </header>

            <table class="table align-middle table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Titre</th>
                        <th scope="col"> titre avec le chapeaux 
            
                        </th>
                        <th scope="col">Date de création article</th>
                        <th scope="col">Date dernière édition</th>
                        <th scope="col">image</th>
                       
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($liste as $element) {
                        $lienEdition = "{$racineURL}/edition.php?id={$element["id"]}";

                        $dateCreation = new DateTime($element["date_creation_article"]);
                        $dateMiseAJour = new DateTime($element["date_derniere_mise_a_jour_article"]);
                        $auteur_id_Article = $element["auteur_id_article"];
                        if (is_null($auteur_id_Article)) {
                            $auteurArticle = "/";
                        }
                    ?>
                        <tr>
                            <td scope='row'>
                                <?php echo $element["id"]; ?>
                            </td>
                            <td><?php echo $element["titre_article"]; ?></td>
                            <td><?php echo $element["chapo_article"]; ?></td>
                            <td><?php echo $dateCreation->format('d/m/Y H:i:s'); ?></td>
                            <td><?php echo $dateMiseAJour->format('d/m/Y H:i:s'); ?></td>
                          
                            <td>
                                <img width='60' 
                                height='60' 
                                src='<?php echo $element["image_article"]; ?>
                                ' loading="lazy" alt='' />
                            </td>
                           
                            
                            <td>
                                <?php echo $auteur_id_Article; ?>
                            </td>
                            <td>
                                <a href='<?php echo $lienEdition; ?>' class='link-primary'>Modifier</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </main>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>