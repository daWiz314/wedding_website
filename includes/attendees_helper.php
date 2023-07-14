<?php
    // Keeping it in separate file to easily edit and to look nice instead of everything in one file. The actual display file will be just primarily the barebones of the page
    function print_form() {
        // If the user (me or da wife) is not logged in, display the log in form
        echo 
        '
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
        ';
    }

    function login(string $username, string $password) {
        // Some sort of log in here with password hashing
        // After the log in, get ALL the RSVP data and display it in a for loop
        // Data will be displayed in flex format, just because it is dynamic
        // It will show everyone including RSVP attending = false
        // Ideally Attendees with plus ones will all be grouped together at the bottom
        echo '';
        return false; // Unable to log in since we haven't set anything up
    }

    // Check to see if we have already run the page, if so get rid of the log in, and display the data
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (array_key_exists('user_name', $_POST)) {
            if (login($_POST['user_name'], $_POST['password'])) {
                echo '<div><h1 class="up">Logged in, displaying data!</h1></div>';
            } else {
                echo '<div><h1 class="up">Unable to log in, please try again!</h1></div>';
                print_form();
            }
            
        } else {
            print_form();
        }
    } else {
        print_form();
    }
?>