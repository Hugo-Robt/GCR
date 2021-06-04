<?php

require_once 'classConnexion.php';

$laBase = new clstBDD;
$laBase->connecte("dsn_swiss", "", "");
if ($laBase->getConnexion() != null) {
    //on interroge la base
    $curseur = $laBase->requeteSelect('select pra_nom, pra_prenom, pra_adresse, pra_cp, pra_coef, tp_code from praticien where pra_num=' . $_POST["pratNum"]);
    if ($res != "") {
        //on positionne les champs avec les valeurs de la table
        echo ' 	<label class="titre">NOM :</label><text size="25" name="PRA_NOM" readonly="readonly" >' . $res["PRA_NOM"] . '</text>
		<label class="titre">PRENOM :</label><text size="30" name="PRA_PRENOM" readonly="readonly" >' . $res["PRA_PRENOM"] . '</text>
		<label class="titre">ADRESSE :</label><text size="50" name="PRA_ADRESSE" readonly="readonly" >' . $res["PRA_ADRESSE"] . '</text>
		<label class="titre">CP :</label><text size="5" name="PRA_CP" readonly="readonly" >' . $res["PRA_CP"] . ' ' . $res["PRA_VILLE"] . '</text>
		<label class="titre">COEFF. NOTORIETE :</label><text size="7" name="PRA_COEFNOTORIETE" readonly="readonly" >' . $res["PRA_COEFNOTORIETE"] . '</text>
		<label class="titre">TYPE :</label><text size="3" name="TYP_CODE" readonly="readonly" >' . $resType["typ_libelle"] . '</text>
		<label class="titre">&nbsp;</label><div class="zone"><input type="button" value="<" onClick="precedent();"></input><input type="button" value=">" onClick="suivant();"></input>';
    }
    $laBase->close();
}
?>
