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
            <h3 class="up">Information submitted for: <?php echo $user->get_full_name() ?> </h3>
            <p>Attending? <?php echo $user->is_attending() ?></p>
            <p>Name: <?php echo $user->get_full_name() ?></p>
            <p>Email: <?php echo $user->get_email() ?></p>
            <p>Plus One? <?php echo $user->has_po() ?></p>
            <p>Plus One Name: <?php echo $user->get_po_name() ?></p>
        </div>
        <span></span>
        <div>
            <h3 id="email_sent">An email has been sent to <em><?php echo $user->get_email(); ?></em></h3>
        </div>
    </main>
</body>
</html>