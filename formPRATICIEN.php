<?php
require_once './Include/entete.inc.php';
require_once './Include/SourceDonnees.inc.php';
require_once './Include/bibliotheque01.inc.php';
?>

<div id="droite">
    <div id="bas">
        <h1> Praticiens </h1>
        <form id="formListeRecherche" method="post">
            <?php
            $resultat = getListePraticiens();
            if (isset($_REQUEST['liste'])) {
                $num = $_REQUEST['liste'];
            } else {
                $num = 0;
            }
            echo formSelectDepuisRecordset('Praticien : ', 'liste', 'listePraticien', $resultat, $num, 10)
            . formBoutonSubmit('bouton1', 'ok', 'bouton1', 10);
            ?>
        </form>
        
        <form id="formPraticien" method="post">
            <?php
            if (isset($_REQUEST['liste'])) {

                $resultat = getPraticienInformations($num);
                $ligne = $resultat->fetch(PDO::FETCH_ASSOC);

                echo formInputText('titre', 'txtNom', 'NOM:', 50, 'ZONE', $ligne['PRA_NOM'], TRUE, FALSE) . '<br/>'
                . formInputText('titre', 'txtPrenom', 'PRENOM:', 50, 'ZONE', $ligne['PRA_PRENOM'], TRUE, FALSE) . '<br/>'
                . formInputText('titre', 'txtADR', 'ADRESSE:', 50, 'ZONE', $ligne['PRA_ADRESSE'], TRUE, FALSE) . '<br/>'
                . formInputText('titre', 'txtVILLE', 'VILLE:', 50, 'ZONE', $ligne['PRA_VILLE'], TRUE, FALSE) . '<br/>'
                . formInputText('titre', 'txtCN', 'COEFF NOTORIETE:', 50, 'ZONE', $ligne['PRA_COEF'], TRUE, FALSE) . '<br/>'
                . formInputText('titre', 'txtLE', 'LIEU D\'EXERCICE:', 50, 'ZONE', $ligne['TYP_LIBELLE'], TRUE, FALSE);
            }
            ?>           
        </form>
    </div>
</div>
<?php
require_once './Include/pied.inc.php';
?>