<?php declare(strict_types=1);

    require_once SITE_ROOT . '/php/dbHandler.php';

    try{
        $dbHandler = new DBHandler('localhost', 'root', '', 'postitdb');
        $rows = $dbHandler->extractAll();

        /*
            TODO: Iterate onto the array and get array values (array used as table)
            and properly configure the svg file;
        */

    } catch(PDOException $e) {
        debug($e->getMessage());
    }

?>