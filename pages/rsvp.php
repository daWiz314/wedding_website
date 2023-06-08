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
                    <fieldset required>
                        <label for="attend_yes" class="up">Attending</label>
                        <label for="attend_yes">Y</label>
                        <input type="checkbox" name="attend_yes" id="a_yes">
                        <label for="attend_no">N</label>
                        <input type="checkbox" name="attend_no" id="a_no">
                    </fieldset>
                    <fieldset required>
                        <label for="plusone_yes" class="up">Plus one</label>
                        <input type="checkbox" name="plusone_yes" id="po_yes">
                        <input type="checkbox" name="plusone_no" id="po_no">
                    </fieldset>
                    <label for="first_name" class="up">First Name <input type="text" name="first_name" id="first_name"></label>
                    
                    <label for="last_name" class="up">Last Name</label>
                    <input type="text" name="last_name" id="last_name">
                    <label for="plusone_first_name" class="up">Plus One First Name</label>
                    <input type="text" name="plusone_first_name" id="po_first_name">
                    <label for="plusone_last_name" class="up">Plus One Last Name</label>
                    <input type="text" name="plusone_last_name" id="po_last_name">
                    <label for="email" class="up">Email</label>
                    <input type="email" name="email" id="email">
                    <label for="code" class="up">code that was included in invite</label>
                    <input type="text" name="code" id="code">                   
                    
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