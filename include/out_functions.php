<?php
function startButtons($input){
    $return = '';
    foreach ($input as $value){
        $return = $return . "<form style='display: inline;' method='POST'><button class='nes-btn is-primary' type='submit' value=".$value['id']." name='mode'>" . $value['name'] . "<br /> (1-" . $value['max']. ")</button></form>&nbsp;";
    }
    return $return;
}


function outputSuccess($time, $tries)
{
    echo "Deine benötigte Zeit: " . format_time($time, ':') . "<br />";
    echo "Deine benötigten Versuche: " . $tries . "<br />";
    ?>
    <h2>Highscore Eintragen:</h2>
    <form method="post">
        <label for="name">Dein Name:</label>
        <input type="text" class="nes-input" name="name" id="name">
        <button class="nes-btn" type="submit">Eintragen</button>
    </form>
    <?php
    $_SESSION['submit'] = true;
}

function outputCancel(){
    ?>
    <form method="post">
        <input type="hidden" name="cancel" value="true">
        <button type="submit" class="nes-btn is-error">Aufgeben</button>
    </form>
    <?php
}

function displayHighscores($pdo, $mode) {
    $highscores = getHighscores($pdo,$mode);

    $return = "<section class='topic'>";
    $return = $return . '<div class="nes-container with-title is-centered">';
    $return = $return .  "<h2 class='title'>Modus $mode:</h2>";
    $return = $return . "<div class='nes-table-responsive'><table style='width: 90%; margin-left: auto; margin-right: auto;' class='nes-table is-bordered'><thead><tr><th>Name</th><th>Zeit</th><th>Versuche</th></tr></thead><tbody>";

    foreach ($highscores as $value){
        $name = $value['name'];
        $zeit = $value['zeit'];
        $versuche = $value['versuche'];
        $return = $return . "<tr><td>$name</td><td>$zeit</td><td>$versuche</td></tr>";
    }
    $return = $return . "</tbody></table></div></div></section>";
    return $return;
}