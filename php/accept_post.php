<?php declare(strict_types=1);

    require_once SITE_ROOT . '/php/dbHandler.php';

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $input = array(
            'name' => format_string($_POST['fname']),
            'bgcolor' => format_string($_POST['fbgcolor']),
            'brdcolor' => format_string($_POST['fbrdcolor']),
            'fntcolor' => format_string($_POST['ffntcolor']),
            'ctnt' => format_string($_POST['fcontent'])
        );

        try {
            $dbHandler = new DBHandler("localhost", "root", "", "postitdb");
            $dbHandler->insert($input['name'], $input['bgcolor'], $input['brdcolor'], $input['fntcolor'], $input['ctnt']);
        } catch(PDOException $e){ 
            debug($e->getMessage());
        }
    }

    function format_string(string $str) : string {
        $str = trim($str);
        $str = stripslashes($str);
        $str = htmlspecialchars($str);
        return $str;
    }
?>