<?php
session_start();

include ('include/config.php');
include ('include/db_connect.php');
include('include/db_functions.php');
include ('include/out_functions.php');
include ('include/misc_functions.php');
include ('template/header.php');

if (!empty($_POST['mode']) || !empty($_SESSION['random_number'])) {
    include ('include/game_logic.php');
} else {
    session_destroy();


$data = getModes($pdo);
    echo "<section class='topic'>";
    echo '<div class="nes-container with-title is-centered">';
    echo '<h2 class="title">Schwierigkeit wählen:</h2>';
    echo startButtons($data['buttons']);
    echo '</div></section>';

    echo displayHighscores($pdo, 1);
    echo displayHighscores($pdo, 2);
    echo displayHighscores($pdo, 3);
    echo displayHighscores($pdo, 4);
    echo displayHighscores($pdo, 5);
}

include ('template/footer.php');