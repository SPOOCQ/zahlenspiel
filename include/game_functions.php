<?php
// Überprüfen, ob der Nutzer richtig geraten hat:
function checkResult($input, $target){
$versuch = $_SESSION['versuche'];
    if ($input > $target){
    $result = "Versuch #". $versuch. ": ". "Leider zu hoch<br />";

} elseif ($input < $target) {
    $result = "Versuch #". $versuch. ": ". "Leider zu niedrig<br />";
} elseif ($input == $target){
    $result = "Hoooooooray! Richtig!<br />";
    $_SESSION['end_time'] = time();
}
    return $result;
}

// Zeit formatieren:
function format_time($t,$f=':') // t = seconds, f = separator
{
    return sprintf("%02d%s%02d%s%02d", floor($t/3600), $f, ($t/60)%60, $f, $t%60);
}
