<nav>
    <input type="checkbox" name="logo_checkbox" id="logo_checkbox">
    <label for="logo_checkbox">
        <img src="/imgs/logo.png" alt="Logo containing letters H and R" class="logo">
    </label>
    <ul id="nav_list">
    <script>
        document.getElementById("nav_list").style.transform = "scale(0)";
        console.log("It's fucking gone!");
    </script>
        <?php include_once 'nav_helper.php' ?>

    </ul>
</nav>