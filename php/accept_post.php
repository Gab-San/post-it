<?php declare(strict_types=1);

    require "./php/dbHandler.php";

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $input = array(
            "name" => format_string($_POST['fname']),
            "bgcolor" => $_POST['fbgcolor'],
            "brdcolor" => $_POST['fbrdcolor'],
            "fntcolor" => $_POST['ffntcolor']
        );

        $ctnt = format_ctnt($_POST['fcontent']);

        foreach($input as $x) {
            echo "$x <br>";
        }

        foreach($ctnt as $line) {
            echo "$line <br>";
        }
        try {
            $dbhanlder = new DbHandler("localhost", "root", "", "postitdb");
        } catch(PDOException $e){ 
            echo $e->getMessage();
        }
    }

    function format_string(string $str) : string {
        $str = trim($str);
        $str = stripslashes($str);
        $str = htmlspecialchars($str);
        return $str;
    }

    function format_ctnt(string $ctnt) : array {
        $lines = preg_split("/\r?\n/", $ctnt);
        foreach($lines as $idx => $line) {
            $lines["$idx"] = format_string($line);
        }
        return $lines;
    }
?>