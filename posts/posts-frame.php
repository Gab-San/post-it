<!DOCTYPE html>
<html lang="it">
    <head>
        <meta charset="utf-8">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!--Importing google font-->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400..700&display=swap" rel="stylesheet">
        <!--type="text/css" is implied-->
        <!--using relative path to root-->
        <link rel="stylesheet" href="/css/style.css">
        <link rel="stylesheet" href="/css/post-view.css">
    </head>
    <body>
        <div class="posts-table">
            <?php
                require_once __DIR__ . "/../config.php";
                include SITE_ROOT . "/php/display_posts.php"
            ?>
        </div>
    </body>
</html>