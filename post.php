<!DOCTYPE html>
<html lang="it">
    <head>
        <meta charset="utf-8">
        <link rel="icon" type="image/x-icon" href="/images/favicon_io/favicon.ico">
        <title>Post It/Post</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!--Importing google font-->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400..700&display=swap" rel="stylesheet">
        
        <!--The following section encloses css files needed to style the page-->
        <link rel="stylesheet" href="/css/style.css">
        <link rel="stylesheet" href="/css/form-style.css">

        <!--Javascript Scripts-->
        <script src="/js/form-processing.js"></script>
        <script src="/js/post-preview.js"></script>
    </head>
    <body>
        <div class="container">
            <div class="webpage-header">
                <a href="/" class="header-link dancing-script-user" target="_self" rel="noopener noreferrer" draggable="false">
                    <div class="web-logo">Post It</div>
                </a>
                <nav>
                    <ul>
                        <li>
                            <a href="/post.php" target="_self" class="header-link dancing-script-user">
                                <div>Post</div>
                            </a>
                        </li>
                        <li>
                            <a href="/posts/" target="_self" class="header-link dancing-script-user">
                                <div>View Posts</div>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>

            <div id="form-main">
                <form
                method="post"
                action="<?php 
                    echo htmlspecialchars($_SERVER["PHP_SELF"])
                ?>"
                onsubmit="return validateForm()"
                onreset="resetPreview()">
                    <div class="form-container">
                        <div class="fname">
                            <table>
                                <td>
                                    <label for="fnameinput">
                                        Name:
                                    </label>
                                </td>
                                <td>
                                    <!--PHP post request send an array and indexing is done on
                                    the name attribute-->
                                    <input type="text" name="fname" id="fnameinput" required>
                                </td>
                            </table>
                        </div>

                        <div class="fbgcolor">
                            <table>
                                <tr>
                                    <td>
                                        <label for="fbgcolorsel">
                                            Background Color: 
                                        </label>
                                    </td>
                                    <td>
                                        <input type="color" name="fbgcolor" id="fbgcolorsel" value="#ffe278">        
                                    </td>
                                </tr>
                            </table>                            
                        </div>

                        <div class="fbrdcolor">
                            <table>
                                <tr>
                                    <td>
                                        <label for="fbrdcolorsel">
                                            Border Color:
                                        </label>
                                    </td>
                                    <td>
                                        <input type="color" name="fbrdcolor" id="fbrdcolorsel" value="#ffae46">
                                    </td>
                                </tr>
                            </table>
                        </div>

                        <div class="ffntcolor">
                            <table>
                                <tr>
                                    <td>
                                        <label for="ffntcolorsel">
                                            Font Color:
                                        </label>
                                    </td>
                                    <td>
                                        <input type="color" name="ffntcolor" id="ffntcolorsel">
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <textarea name="fcontent" required></textarea>
                        <input type="submit">
                        <input type="reset">
                    </div>
                </form>
            </div>

            <div id="preview" class="preview">
                <svg
                    viewBox="0 0 512 320"
                    version="1.1"
                    id="svg1"
                    xmlns="http://www.w3.org/2000/svg"
                    xmlns:svg="http://www.w3.org/2000/svg">
                <defs
                    id="defs1" />
                <g
                    id="layer1">
                    <path
                        d="M 0.08203125,0.35426493 V 319.71999 H 430.9559 c 33.92309,-17.21337 60.53156,-42.28625 80.91222,-79.6313 V 0.35426493 Z"
                        style="fill:#ffe278;fill-opacity:1;stroke-width:1.59864"
                        id="svgbackground" />
                    <path
                        d="M 502.03211,1.0080008 V 207.55753 c -0.14617,22.4979 -1.54851,31.75423 -16.28897,35.30175 h -52.09329 v 75.45985 c 32.90157,-17.30161 58.78714,-42.27393 78.68814,-79.10208 V 1.0080008 Z"
                        style="fill:#ffad45;stroke-width:1.59885"
                        id="svgborder" />
                </g>
                <text id="svg_inner_text" y="5" font-size="30" fill="#000000ff" class="dancing-script-user">
                </text>

                <text id="svg_author_text" x="15" y="290" font-size="28" fill="#000000ff" class="dancing-script-user">
                    By
                </text>
                </svg>
            </div>

            <div class="webpage-footer">
                <?php
                    require_once __DIR__ . '/config.php';
                    include SITE_ROOT . '/php/accept_post.php';
                ?>
            </div>
        </div>
    </body>
</html>