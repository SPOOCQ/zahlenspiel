<!DOCTYPE HTML>
<html lang="de">
<head>
    <meta charset="UTF-8" />
    <title>Zahlenratespiel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="lib/css/cleaned_style.css" rel="stylesheet" />
    <link href="lib/css/custom.css" rel="stylesheet"/>
</head>
<body>
<div id="nescss">
<div class="container">



    <header><div style="text-align: center;">
            <?php
            if (checkMobile() == true){
                echo '<img src="lib/assets/logo-mobile.png"></div>';
            } else {
                echo '<img src="lib/assets/logo.png"></div>';
            }

            ?>

    </header>
    <main class="main-content">
