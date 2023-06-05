<?php
    $urls = array();

    if ($path == "./") {
        $urls += ["home" => "../index.php"];
    } else {
        $urls += ["home" => "index.php"];
    }
    $urls += [
        "invitation" => $path . "invitation.php",
        "rsvp" => $path . "rsvp.php",
        "registry" => $path . "registry.php",
        "our story" => $path . "our_story.php",
        "wedding party" => $path . "wedding_party.php",
    ];

    function echoLiElement($name, $url) {
        echo '<li><a class="animation-underline up active" href="'.$url.'">>'.$name.'<</a></li>';
    }

    foreach($urls as $name => $url) {
        switch($name) {
            case $currentPage == $name:
                echoLiElement($name, $url);
                break;
            default:
                echo '<li><a class="animation-underline up" href="'.$url.'">'.$name.'</a></li>';
                break;
        }
    }
?>