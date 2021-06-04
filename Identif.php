<?php
require_once './Include/Securite.inc.php';
require_once './Include/entete2.inc.php';
require_once './Include/SourceDonnees.inc.php';
require_once './Include/Bibliotheque01.inc.php';

if (isset($_POST['bouton'])) {
    if (valideInfosCompteUtilisateur($_POST['idUtilisateur'], $_POST['mdpUtilisateur'])) {
        header('Location: ./index.php?action=20');
        ouvreSessionUtilisateur($_POST['idUtilisateur']);
    } else {
        echo '<p class="erreur">Utilisateur et/ou Mot de passe invalide</p>';
    }
}
?>

<form id="frmIdentification" method="post" required="required">
    <?php
    echo formInputText('idUtilisateur', 'idUtilisateur', 'idUtilisateur: ', 50, 40, '', false, true) . '<br/>';
    echo formInputPassword('Mot de passe: ', 'mdpUtilisateur', 'mdpUtilisateur', '', 50, 40, 20, true) . '<br/>';
    echo formBoutonSubmit('bouton', 'valider', 'bouton', 30) . '<br/>';
    ?>
</form>
</body>

<?php
require_once './Include/pied.inc.php';
?>