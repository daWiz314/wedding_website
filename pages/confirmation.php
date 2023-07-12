<!DOCTYPE html>
<html lang="en">
<head>
    <?php include_once "../includes/confirmation_helper.php" ?>
    <?php 
    $currentPage = "confirm";
    $path = "./";
    include_once "../includes/header-deep.php";
    ?>
    <link rel="stylesheet" href="../styles/confirmation.css">
</head>
<body class="no-scroll">
    <?php include_once "../includes/nav.php"; ?>
    <main>
        <div>
            <h2 class="up">Thank you for submitting!</h2>
        </div>
        <span></span>
        <div id="user_info_container">
            <h3 class="up">Information submitted for: </h3>
            <p id="attending">Attending?</p>
            <p id="name">Name:</p>
            <p id="email">Email:</p>
            <p id="plus_one">Plus One?</p>
            <p id="plus_one_name">Plus One Name:</p>
        </div>
        <span></span>
        <div>
            <h3 id="email_sent">An email has been sent to </h3>
        </div>
    </main>
</body>
</html>