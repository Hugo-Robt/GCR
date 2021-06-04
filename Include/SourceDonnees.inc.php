<?php

/**
 * 
 * @return \PDO
 */
function SGBDConnect() {
    try {

        $connexion = new PDO('mysql:host=svrslam01;dbname=gsb', 'PPEgsb', 'gsb');
        $connexion->query('SET NAMES UTF8');
        $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo 'Erreur !: ' . $e->getMessage() . '<br />';
        exit();
    }
    return $connexion;
}

/**
 * 
 * @return type
 */
function getListePraticiens() {

    try {

        $requete = 'SELECT PRA_NUM, CONCAT(PRA_NOM, \' \', PRA_PRENOM) AS \'PRA_NOMPRENOM\' '
                . 'FROM PRATICIEN '
                . 'ORDER BY PRA_NOM';


        $resultat = SGBDConnect()->query($requete);
    } catch (PDOException $e) {

        echo 'Erreur !: ' . $e->getMessage() . '<br />';

        exit();
    }

    return $resultat;
}

/**
 * 
 * @param type $numpraticien
 * @return type
 */
function getPraticienInformations($numpraticien) {
    $connexion = SGBDConnect();

    $sql = 'SELECT PRA_NOM, PRA_PRENOM, PRA_ADRESSE, Concat(PRA_CP,\' \',PRA_VILLE) as \'PRA_VILLE\', PRA_COEF, TYP_LIBELLE, Type_praticien.TYP_LIEU '
            . 'FROM praticien '
            . 'INNER JOIN type_praticien ON Praticien.PRA_TYPE = Type_praticien.TYP_CODE '
            . 'WHERE praticien.PRA_NUM ="' . $numpraticien . '"';

    $info = $connexion->query($sql);
    return $info;
}

/**
 * 
 * @return type
 */
function formChoixFamilleMedicaments() {

    try {

        $requete = 'SELECT FAM_CODE, FAM_LIBELLE '
                . 'FROM famille '
                . 'ORDER BY FAM_CODE ';


        $resultat = SGBDConnect()->query($requete);
    } catch (PDOException $e) {

        echo 'Erreur !: ' . $e->getMessage() . '<br />';

        exit();
    }

    return $resultat;
}

/**
 * 
 * @return type
 */
function formChoixMedicament($FAM_CODE) {

    try {

        $requete = 'SELECT MED_CODE, MED_NOM '
                . 'FROM medicament inner join famille '
                . 'ON MED_FAMILLE = FAM_CODE '
                . 'WHERE MED_FAMILLE = \'' . $FAM_CODE . '\'';


        $resultat = SGBDConnect()->query($requete);
    } catch (PDOException $e) {

        echo 'Erreur !: ' . $e->getMessage() . '<br />';

        exit();
    }

    return $resultat;
}

/**
 * 
 * @param type $CodeMedicament
 * @return type
 */
function getMedicamentInformations($CodeMedicament) {

    try {

        $requete = 'SELECT LAB_NOM, MED_COMPO, MED_EFFETS, MED_CONTREINDIC '
                . 'FROM famille inner join medicament '
                . 'ON FAM_CODE = MED_FAMILLE inner join laboratoire '
                . 'ON MED_CODE = \'' . $CodeMedicament . '\''
                . 'ORDER BY MED_CODE ';


        $resultat = SGBDConnect()->query($requete);
    } catch (PDOException $e) {

        echo 'Erreur !: ' . $e->getMessage() . '<br />';

        exit();
    }

    return $resultat;
}

/**
 * 
 * @param type $user
 * @param type $mdp
 * @return type
 */
function existeCompteVisiteur($user, $mdp) {
    $connexion = SGBDConnect();
    $requete = 'SELECT VIS_CODE, VIS_PASSE '
            . 'FROM visiteur '
            . 'WHERE VIS_CODE = "' . $user . '" AND VIS_PASSE = "' . $mdp . '"';

    $resultat = $connexion->query($requete);

    return ($resultat->rowCount() == 1);
}

/**
 * 
 * @param type $utilisateur
 * @return type
 */
function getInfoUser($utilisateur) {
    $connexion = SGBDConnect();

    $requete = 'SELECT VIS_NOM, VIS_PRENOM, VIS_VILLE '
            . 'FROM visiteur '
            . 'WHERE VIS_CODE = "' . $utilisateur . '"';

    $resultat = $connexion->query($requete);
    return $resultat;
}

?>