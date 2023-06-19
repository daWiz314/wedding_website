<nav>
    <input type="checkbox" name="logo_checkbox" id="logo_checkbox">
    <label for="logo_checkbox">
        <img src="/imgs/logo.png" alt="Logo containing letters H and R" class="logo" id="logo_img">
    </label>
    <ul id="nav_list">
    <script>
        let nav_clicked = false;
        
        function checkIfSmall() {
            if (document.body.clientWidth <= 1000) {
                document.getElementById("nav_list").style.scale = 0;
                document.getElementById("nav_list").style.visibility = "hidden";
            }
            if (document.body.clientWidth > 1000) {
                document.getElementById("nav_list").style.scale = 1;
                document.getElementById("nav_list").style.visibility = "visible";
            }
        }
        document.getElementById("logo_img").addEventListener("click", function() {
            document.getElementById("nav_list").classList.add("add-animation-unfill");
        }, once = true)
        window.addEventListener("resize", function() {checkIfSmall()});
        checkIfSmall();
    </script>
        <?php include_once 'nav_helper.php' ?>

    </ul>
</nav>