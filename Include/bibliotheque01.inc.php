<?php

/**
 * 
 * @param type $label
 * @param type $nom
 * @param type $id
 * @param type $recordset
 * @param type $valeuropt
 * @param type $tabindex
 * @return string
 */
function formSelectDepuisRecordset($label, $nom, $id, $recordset, $valeuropt, $tabindex) {

    $code = '<label for="' . $id . '">' . $label . '</label>' . "\n"
            . '    <select name="' . $nom . '" id="' . $id . '" class="titre" tabindex="' . $tabindex . '">' . "\n";

    $recordset->setFetchMode(PDO::FETCH_NUM);

    $ligne = $recordset->fetch();
    while ($ligne != false) {
        $code .= '        <option ';
        if ($ligne[0] == $valeuropt) {
            $code .= 'selected="selected" ';
        }
        $code .= 'value="' . $ligne[0] . '">' . $ligne[1] . '</option>' . "\n";
        $ligne = $recordset->fetch();
    }
    $code .= '</select>';
    return $code;
}

/**
 * 
 * @param type $css
 * @param type $nom
 * @param type $nomlabel
 * @param type $size
 * @param type $css2
 * @param type $valeur
 * @param type $lectureSeule
 * @param type $required
 * @return string
 */
function formInputText($css, $nom, $nomlabel, $size, $css2, $valeur, $lectureSeule, $required) {
    $codeHTML = '<label class="' . $css . '" for="' . $nom . '">' . $nomlabel . '</label><input type="text" value="' . $valeur . '" size="' . $size . '" name="' . $nom . '" class="' . $css2 . '"'
            . ($lectureSeule == TRUE ? ' readonly="readonly"' : '')
            . ($required == TRUE ? ' required="required"' : '') . '/>';

    return $codeHTML;
}

/**
 * 
 * @param type $idB
 * @param type $valueB
 * @param type $nomB
 * @param type $tabindexB
 * @return string
 */
function formBoutonSubmit($idB, $valueB, $nomB, $tabindexB) {
    $codeHTML = '<input type="submit" id="' . $idB . '" value="' . $valueB . '" name="' . $nomB . '" tabindex="' . $tabindexB . '">';
    return $codeHTML;
}

/**
 * 
 * @param type $idH
 * @param type $valueH
 * @param type $nomH
 * @return string
 */
function formInputHidden($idH, $valueH, $nomH){
    $codeHTML = '<input type="hidden" id="' . $idH . '" value="' . $valueH . '" name="' . $nomH . '">';
    return $codeHTML;
}

/**
 * Retourne une chaine de caractères contenant le code HTML d'un textarea.
 * 
 * @param type $labelT 
 * @param type $idT
 * @param type $nomT
 * @param type $largeurT
 * @param type $hauteurT
 * @param type $longueurMaxT
 * @param type $readOnly
 * @param type $tabIndex
 * @param type $valueT
 * @return string
 */
function formTextArea($labelT, $idT, $nomT, $largeurT, $hauteurT, $longueurMaxT, $readOnly, $tabIndex, $valueT){
    $codeHTML = '<label class="titre">' . $labelT . ' :</label><textarea resize="none" id="' . $idT . '" name="' . $nomT . '" cols="' . $largeurT . '" rows="' . $hauteurT . '" maxlength="' . $longueurMaxT. '"';
    if ($readOnly){
        $codeHTML .= ' readonly= "readonly"';
    }
    $codeHTML .= 'tabindex= "' . $tabIndex. '">' . $valueT . '</textarea>';
            
    return $codeHTML;
}

/**
 * 
 * @param type $labelP
 * @param type $idP
 * @param type $nomP
 * @param type $valueP
 * @param type $tailleP
 * @param type $longueurP
 * @param type $tabIndexP
 * @param type $required
 * @return string
 */
function formInputPassword($labelP, $idP, $nomP, $valueP, $tailleP, $longueurP, $tabIndexP, $required){
    $codeHTML = '<label for="pass">' . $labelP . '</label>'
            . '<input type="password" id="' . $idP . '" name="' . $nomP . '" value="' . $valueP . '" size="' . $tailleP . '" maxlength="' . $longueurP . '" tabindex="' . $tabIndexP . '"'
            . ($required == TRUE ? ' required="required"' : '') . '/>';
    
    return $codeHTML;
}
?>