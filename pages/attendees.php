<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    $currentPage = "attendees";
    $path = "./";
    include_once "../includes/header-deep.php";
    ?>
    <link rel="stylesheet" href="../styles/attendees.css">
</head>

<body>
    <?php include_once "../includes/nav.php"; ?>
    <main>
        <div>
            <h1 class="up">Please log in to view attendees!</h1>
            <span></span>
        </div>
        <div class="form">
            <form action="./attendees.php" method="post">
                <label for="user_name">User:</label>
                <input type="text" name="user_name" id="user_name">
                <label for="password">Pass:</label>
                <input type="text" name="password" id="password">
                <input type="submit" value="SUBMIT!">
            </form>
        </div>
    </main>
</body>

</html>