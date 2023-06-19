<nav>
    <input type="checkbox" name="logo_checkbox" id="logo_checkbox">
    <label for="logo_checkbox">
        <img src="/imgs/logo.png" alt="Logo containing letters H and R" class="logo">
    </label>
    <ul id="nav_list">
    <script>
        document.getElementById("nav_list").style.scale = 0;
        document.getElementById("nav_list").style.visibility = "hidden";
        console.log("It's fucking gone!");
        console.log("Apparently it's not fucking gone");
    </script>
        <?php include_once 'nav_helper.php' ?>

    </ul>
</nav>