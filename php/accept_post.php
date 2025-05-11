<?php declare(strict_types=1);
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

        connect_to_db();
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

    function connect_to_db() {
        $servername = "localhost";
        $username = "root";
        $password = "";

        try {
            $conn = new PDO("mysql:host=$servername;dbname=test", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "Connected successfully to test";
        } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }
?>