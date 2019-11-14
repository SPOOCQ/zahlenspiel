<?php
include ('include/game_functions.php');
//Abbruch
if (isset($_POST['cancel'])) {
    session_destroy();
    header('Location: ?');
}


//Highscore Eintrag
if (isset($_SESSION['submit'])){
    if(!isset($_POST['name'])){
        outputSuccess($_SESSION['time'], $_SESSION['versuche']);
    } else {
    $time = $_SESSION['end_time'] - $_SESSION['start_time'];
    $data = array(
        'name' => $_POST['name'],
        'versuche' => $_SESSION['versuche'],
        'zeit' => format_time($time),
        'mode' => $_SESSION['mode']
    );
    insertHighscore($pdo, $data);
}}

//Wenn das Spiel startet:
if (empty($_SESSION['random_number'])) {
    $_SESSION['mode'] = $_POST['mode'];
    $_SESSION['versuche'] = 0;
    $_SESSION['random_number'] = rand('1', getMax($pdo, $_POST['mode']));
    $_SESSION['start_time'] = time();
}

//Wenn ein Tipp abgegeben wurde:
if (!empty($_POST['raten'])) {
    $_SESSION['versuche']++;
    echo checkResult($_POST['raten'], $_SESSION['random_number']);
}

//Wenn richtig geraten wurde:
if (!empty($_SESSION['end_time'])){
$time = $_SESSION['end_time'] - $_SESSION['start_time'];
$_SESSION['time'] = $time;
outputSuccess($time, $_SESSION['versuche']);
outputCancel();
} else {

//Formular zum Raten:
?>

    <form method="post">
        <label for="raten">Gib deinen Tipp ab: (1- <?php echo getMax($pdo, $_SESSION['mode']) . ")" ?></label>
        <input type="text" class="nes-input" autofocus name="raten" id="raten">
        <br />
        <button type="submit" class="nes-btn">Richtig?!</button>
    </form>
    <br />
<?php
outputCancel();
}