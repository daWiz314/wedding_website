<!DOCTYPE html>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    $currentPage = "rsvp";
    $path = "./";
    include_once "../includes/header-deep.php";
    ?>
    <link rel="stylesheet" href="../styles/rsvp.css">
</head>

<body class="no-scroll">
    <?php include_once "../includes/nav.php"; ?>
    <main>
        <div>
            <h1 class="up">RSVP</h1>
            <span></span>
            <h3>Please RSVP by September 30th, 2023</h3>
        </div>
        <div id="container">
            <article>
                <form action="./confimation.php">
                    <label class="up">Attending</label>
                    <fieldset required>
                        <label class="first">Y</label>
                        <label>N</label>
                        <label class="check_box first" for="at_yes"></label>
                        <label class="check_box" for="at_no"></label>
                        <input type="checkbox" name="at_yes">
                        <input type="checkbox" name="at_no">
                    </fieldset>
                    <label class="up">Plus One </label>
                    <fieldset required>
                        <label for="po_yes" class="first">Y</label>
                        <label for="po_no">N</label>
                        <label class="check_box first" for="po_yes"></label>
                        <label class="check_box" for="po_no"></label>
                        <input type="checkbox" name="po_yes">
                        <input type="checkbox" name="po_no">
                    </fieldset>
                    <label for="f_name" class="up">First Name</label>
                    <input type="text" name="f_name">
                    <label for="l_name" class="up">Last Name</label>
                    <input type="text" name="l_name">
                    <label for="email" class="up">Email</label>
                    <input type="email" name="email">
                    <label for="code" class="up">Code</label>
                    <input type="text" name="code">
                    <input type="submit" value="SUBMIT">
                </form>
            </article>
            <aside>
                <p>Saturday, October 28th, 2023</p>
                <p>Address will be included in confimation email</p>
                <p>Ceremony: 4PM-4:30PM
                    <br>
                    Reception: 4:30PM-11PM
                </p>
                <p>Semi-Formal Attire</p>
            </aside>
        </div>
    </main>
</body>

</html>