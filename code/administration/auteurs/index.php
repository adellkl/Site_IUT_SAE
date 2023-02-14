<?php
require_once('../../ressources/includes/connexion-bdd.php');

$listeAuteursCommande = $clientMySQL->prepare('SELECT * FROM auteur');
$listeAuteursCommande->execute();
$listeAuteurs = $listeAuteursCommande->fetchAll();

$pageCourante = "auteurs";
$racineURL = $_SERVER['REQUEST_URI'];

$URLCreation = "{$racineURL}/creation.php";

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <?php include_once("../ressources/includes/head.php"); ?>
    <title>Liste auteurs - Administration</title>
</head>

<body>
    <div class="d-flex h-100">
        <?php include_once("../ressources/includes/menu-lateral.php"); ?>
        <div class="b-example-divider"></div>
        <main class="flex-fill">
            <header class="d-flex justify-content-between align-items-center p-3">
                <p class="fs-1">Liste auteurs</p>
                <div>
                    <a href="<?php echo $URLCreation ?>" class="link-primary">Ajouter un auteur</a>
                </div>
            </header>

            <table class="table align-middle table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="col">auteur_id</th>
                        <th scope="col">Avatar</th>
                        <th scope="col">Nom</th>
                        <th scope="col">Prénom</th>
                        <th scope="col">Twitter</th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($listeAuteurs as $auteur) {
                        $lienEdition = "{$racineURL}/edition.php?id={$auteur["id"]}";
                    ?>
                        <tr>
                            <td scope='row'><?php echo $auteur["id"]; ?></td>
                            <td>
                                <img width='60' 
                                height='60' 
                                src='<?php echo $auteur["lien_avatar"]; ?>
                                ' loading="lazy" alt='<?php echo "Avatar de {$auteur["prenom"]}"; ?>' />
                            </td>
                            <td><?php echo $auteur["nom"]; ?></td>
                            <td><?php echo $auteur["prenom"]; ?></td>
                            
                            <td><?php echo $auteur["lien_twitter"]; ?></td>
                          
                        
                            <td>
                                <a href='<?php echo $lienEdition ?>' class='link-primary'>Modifier</a>
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