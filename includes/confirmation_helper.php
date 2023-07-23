<?php
    include_once "Attendees.php";
    include_once "connection.php";
    $user = new Attendee($_POST);

    $pdo = set_up();
    save_data($user, $pdo);
    $pdo = close_connection($pdo);

?>