<?php
require_once './Include/entete.inc.php';
require_once './Include/bibliotheque01.inc.php';
require_once './Include/SourceDonnees.inc.php';
?>

<div id="droite">
    <div id="bas">
        <h1> Pharmacopée </h1>

        <?php
        switch ($_REQUEST['action']) {
            case 40:
                ?>
                <form id="formChoixFamilleMedicaments" method="post" action="index.php?action=41">
                    <?php
                    echo formSelectDepuisRecordset('Choisir la famille de médicament : ', 'lstFamille', 'lstFamille', formChoixFamilleMedicaments(), null, 10);
                    echo formBoutonSubmit('bouton', 'ok', 'bouton', 10);
                    break;
                    ?>
                </form>

            <?php
            case 41:
                ?>
                <form id="formChoixFamilleMedicaments" method="post" action="index.php?action=41">
                    <?php
                    echo formSelectDepuisRecordset('Choisir la famille de médicament : ', 'lstFamille', 'lstFamille', formChoixFamilleMedicaments(), $_POST['lstFamille'], 10);
                    echo formBoutonSubmit('bouton', 'ok', 'bouton', 10);
                    ?>
                </form>

                <form id="formChoixMedicament" method="post" action="index.php?action=42">
                    <?php
                    echo formSelectDepuisRecordset('Choisir le médicament : ', 'lstMedicament', 'lstMedicament', formChoixMedicament($_POST['lstFamille']), Null, 10);
                    echo formBoutonSubmit('bouton', 'ok', 'bouton', 10);
                    echo formInputHidden('HdChoixFamilleMedicament', $_POST['lstFamille'], 'HdChoixFamilleMedicament');
                    break;
                    ?>
                </form>

            <?php
            case 42:
                ?>

                <form id="formChoixFamilleMedicaments" method="post" action="index.php?action=41">
                    <?php
                    echo formSelectDepuisRecordset('Choisir la famille de médicament : ', 'lstFamille', 'lstFamille', formChoixFamilleMedicaments(), $_POST['HdChoixFamilleMedicament'], 10);
                    echo formBoutonSubmit('bouton', 'ok', 'bouton', 10);
                    ?>
                </form>

                <form id="formChoixMedicament" method="post" action="index.php?action=42">
                    <?php
                    echo formSelectDepuisRecordset('Choisir le médicament : ', 'lstMedicament', 'lstMedicament', formChoixMedicament($_POST['HdChoixFamilleMedicament']), $_POST['lstMedicament'], 10);
                    echo formBoutonSubmit('bouton1', 'ok', 'bouton1', 10);
                    echo formInputHidden('HdChoixFamilleMedicaments', $_POST['HdChoixFamilleMedicament'], 'HdChoixFamilleMedicament');
                    ?>
                </form>

                <form id = "formMEDICAMENT" method = "post">
                    <?php
                    $resultat = getMedicamentInformations($_POST['lstMedicament']);
                    $ligne = $resultat->fetch();

                    echo formInputText('txtNomCommercial', 'txtNomCommercial', 'NOM COMMERCIAL :', 25, $_POST['lstMedicament'], 30, true, false) . '<br/>'
                    . formTextArea('COMPOSITION', 'txtComposition', 'txtComposition', 50, 5, 255, true, 10, $ligne['MED_COMPO']) . '<br/>'
                    . formTextArea('EFFETS', 'txtEffets', 'txtEffets', 50, 5, 255, true, 10, $ligne['MED_EFFETS']) . '<br/>'
                    . formTextArea('CONTRE INDICATION', 'txtContreIndication', 'txtContreIndication', 50, 5, 255, true, 10, $ligne['MED_CONTREINDIC']) . '<br/>'
                    . formInputText('txtLaboratoire', 'txtLaboratoire', 'LABORATOIRE :', 25, $ligne['LAB_NOM'], 30, true, false) . '<br/>';
                    break;
            }
            ?>             
        </form>
    </div>
</div>
<?php
require_once './Include/pied.inc.php';
?>