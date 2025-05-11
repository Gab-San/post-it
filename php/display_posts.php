<?php declare(strict_types=1);

    require_once SITE_ROOT . '/php/dbHandler.php';

    try{
        $dbHandler = new DBHandler('localhost', 'root', '', 'postitdb');
        $rows = $dbHandler->extractAll();

        foreach($rows as $v) {
            echo '<div>';
            __create_svg($v);
            echo '</div>';
        }

    } catch(PDOException $e) {
        debug($e->getMessage());
    }

    function __create_svg(array $entry) {
        $author = $entry['author'];
        $bgcolor = $entry['bgcolor'];
        $brdcolor = $entry['brdcolor'];
        $fntcolor = $entry['fntcolor'];
        $content = $entry['content'];

        __svg_init();
        __svg_open_layer();
        __svg_background($bgcolor);
        __svg_border($brdcolor);
        __svg_ctnt($content, $fntcolor);
        __svg_author($author, $fntcolor);
        __svg_close_layer();
        __svg_close();
    }

    function __svg_init() {
        echo '<svg
                viewBox="0 0 512 320"
                version="1.1"
                id="svg1"
                xmlns="http://www.w3.org/2000/svg"
                xmlns:svg="http://www.w3.org/2000/svg">
                <defs id="defs1"/>';
    }

    function __svg_open_layer() {
        echo '<g id="layer1">';
    }

    function __svg_background(string $bgcolor) {
        $strBg = sprintf('<path d="M 0.08203125,0.35426493 V 319.71999 H 430.9559 c 33.92309,-17.21337 60.53156,-42.28625 80.91222,-79.6313 V 0.35426493 Z" style="fill:%s;fill-opacity:1;stroke-width:1.59864" id="svgbackground" />',
                            $bgcolor);
        echo "$strBg";
    }

    function __svg_border(string $brdcolor) {
        $strBrd = sprintf('<path
                            d="M 502.03211,1.0080008 V 207.55753 c -0.14617,22.4979 -1.54851,31.75423 -16.28897,35.30175 h -52.09329 v 75.45985 c 32.90157,-17.30161 58.78714,-42.27393 78.68814,-79.10208 V 1.0080008 Z"
                            style="fill:%s;stroke-width:1.59885"
                            id="svgborder" />',
                            $brdcolor);
        echo "$strBrd";
    }

    function __svg_ctnt(string $ctnt, string $fntcolor) {
        $lines = preg_split("/\r?\n/", $ctnt);
        $tostr = sprintf('<text id="svg_inner_text" y="5" font-size="30" fill="%s" class="dancing-script-user">',
        $fntcolor);
        
        
        echo $tostr;
        
        foreach($lines as $line) {
            $tostr = sprintf('<tspan x="15" dy="40"> %s </tspan>', $line);
            echo $tostr;
        }
        echo '</text>';
    }

    function __svg_author(string $author, string $fntcolor) {
        $tostr = sprintf('<text id="svg_author_text" class="dancing-script-user" x="15" y="290" font-size="28" fill="%s">',
        $fntcolor);

        echo $tostr . "By $author" . '</text>';
    }

    function __svg_close_layer() {
        echo '</g>';
    }

    function __svg_close() {
        echo '</svg>';
    }

?>