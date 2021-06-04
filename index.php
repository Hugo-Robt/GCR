<?php
require_once './Include/SourceDonnees.inc.php';
require_once './Include/Securite.inc.php';

if (!isset($_REQUEST['action'])) {
    $_REQUEST['action'] = 1000;
}

switch ($_REQUEST['action']) {

    default:
        require_once './Identif.php';
        break;

    case 20:
        require_once './Include/entete.inc.php';
        break;

    case 30:
        require_once './formPRATICIEN.php';
        break;

    case 40:
        require_once './formMEDICAMENT.php';
        break;

    case 41:
        require_once './formMEDICAMENT.php';
        break;

    case 42:
        require_once './formMEDICAMENT.php';
        break;
}
     