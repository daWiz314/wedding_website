<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    $currentPage = "rsvp";
    $path = "./";
    include_once "../includes/header-deep.php";
    ?>
    <link rel="stylesheet" href="../styles/rsvp.css">
    <script src="../scripts/rsvp.js"></script>
</head>

<body class="no-scroll" onload="test_check_boxes()">
    <?php include_once "../includes/nav.php"; ?>
    <main>
        <div>
            <h1 class="up">RSVP</h1>
            <span></span>
            <h3>Please RSVP by September 30th, 2023</h3>
        </div>
        <div id="container">
            <article>
                <form action="./confirmation.php" method="post">
                    <label class="up">Attending</label>
                    <fieldset required>
                        <label class="first">Y</label>
                        <label for="at_yes" class="first">
                            <input type="checkbox" name="at_yes" id="at_yes_cb">
                            <div class="check_box" id="at_yes"></div>
                        </label>
                        <label>N</label>
                        <label for="at_no">
                            <input type="checkbox" name="at_no" id="at_no_cb" checked>
                            <div class="check_box" id="at_no"></div>
                        </label>
                        
                    </fieldset>
                    <label class="up">Plus One</label>
                    <fieldset required>
                        <label class="first">Y</label>
                        <label for="po_yes" class="first">
                            <input type="checkbox" name="po_yes" id="po_yes_cb">
                            <div class="check_box" id="po_yes"></div>
                        </label>
                        <label>N</label>
                        <label for="po_no">
                            <input type="checkbox" name="po_no" id="po_no_cb" checked>
                            <div class="check_box" id="po_no"></div>
                        </label>
                    </fieldset>
                    <label for="f_name" class="up">First Name</label>
                    <input type="text" name="f_name" required>
                    <label for="l_name" class="up">Last Name</label>
                    <input type="text" name="l_name">
                    <label for="po_f_name" class="up po">Plus One <br>First Name</label>
                    <input type="text" name="po_f_name" class="po">
                    <label for="po_l_name" class="up po">Plus One <br>Last Name</label>
                    <input type="text" name="po_l_name" class="po">
                    <label for="email" class="up">Email</label>
                    <input type="email" name="email" required>
                    <label for="code" class="up">Code</label>
                    <input type="text" name="code" required>
                    <input type="submit" value="SUBMIT">
                </form>
            </article>
            <aside>
                <p>For families RSVPing, just put how many in the plus one section!</p>
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
    <script src="../scripts/rsvp.js"></script>
</body>

</html>