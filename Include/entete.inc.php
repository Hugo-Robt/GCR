<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8" />
        <link rel="stylesheet" href="./styles/GCR.css" >
        <title>GSB : Suivi de la Visite médicale </title>
    </head>

    <body>

        <div id="haut">
            <h1><img src="./Images/logo.jpg" alt="logo" width="100" height="60"/> Gestion des visites </h1>
        </div> <!-- fin div haut-->

        <div id="gauche">
                <?php
                if (estSessionUtilisateurOuverte()) {
                    echo '<p class="infosUtil">';
                    echo $_SESSION['userNOM'] . ' ';
                    echo $_SESSION['userPRENOM'] . '<br/>';
                    echo $_SESSION['userVILLE'] . '<br/>';
                    echo '</p>';
                }
                ?>
            
            <h2>Outils</h2>
            <ul>
                <li>Comptes-Rendus</li>
                <ul>
                    <li><a href="formRAPPORT_VISITE.htm" >Nouveaux</a></li>
                </ul>

                <li>Consulter</li>
                <ul>
                    <li><a href="index.php?action=40" >Médicaments</a></li>
                    <li><a href="index.php?action=30" >Praticiens</a></li>
                    <li><a href="index.php?action=50" >Autres visiteurs</a></li>
                </ul>
                <li><a href="Identif.php">Fermer la session</a></li>
            </ul>
        </div> <!-- fin div gauche-->