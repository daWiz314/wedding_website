<nav id="nav">
    <input type="checkbox" name="logo_checkbox" id="logo_checkbox">
    <label for="logo_checkbox">
        <img src="/imgs/logo.webp" alt="Logo containing letters H and R" class="logo" id="logo_img">
    </label>
    <ul id="nav_list">
    <script>
        let nav_clicked = false;
        
        function toggle_size() { // We have to do this if the user is on mobile, this way it doesn't take up the whole screen with it's width and height. When it does take up the whole screen, it blocks the user from interacting.
            if (nav_clicked) {
                document.getElementById("nav_list").style.width = 'min-content';
                document.getElementById("nav_list").style.height = 'min-content';
            } else {
                document.getElementById("nav_list").style.width = 0;
                document.getElementById("nav_list").style.height = 0;
            }
        }

        function checkIfSmall() {
            if (document.body.clientWidth <= 1000) {
                document.getElementById("nav_list").style.scale = 0;
                document.getElementById("nav_list").style.visibility = "hidden";
                document.getElementById("nav_list").style.width = 0;
                document.getElementById("nav_list").style.height = 0;
                document.getElementById("logo_img").addEventListener("click", function() {
                    if (nav_clicked) {
                        nav_clicked = false;
                        toggle_size();
                    } else {
                        nav_clicked = true;
                        toggle_size();
                    }
                })

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