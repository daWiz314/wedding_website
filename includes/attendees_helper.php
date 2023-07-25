<?php
    // Keeping it in separate file to easily edit and to look nice instead of everything in one file. The actual display file will be just primarily the barebones of the page
    include_once "connection.php";
    include_once "Attendees.php";

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
                <input type="text" name="user_name" id="user_name" required>
                <label for="password">Pass:</label>
                <input type="text" name="password" id="password" required>
                <input type="submit" value="SUBMIT!">
            </form>
        </div>
        ';
    }

    function login(string $username, string $password) : bool {
        // Some sort of log in here with password hashing
        // ----------DONE----------------------------------
        // After the log in, get ALL the RSVP data and display it in a for loop
        // ----------Done----------------------------------
        // Data will be displayed in table format
        // ----------Done----------------------------------
        // It will show everyone including RSVP attending = false
        // ----------Done----------------------------------
        // Ideally Attendees with plus ones will all be grouped together at the bottom
        // ----------Done----------------------------------
        $pdo = set_up_user(); // Set up connection to database

        $statement = $pdo->query("SELECT un from users"); // Grab the log in info
        $results = $statement->fetchAll();

        if ($username == $results[0]->un) {
            if (password_verify($password, $results[1]->un)) {
                $logged_in = true;
            } else {
                $logged_in = false;
            }
        } else  {
            $logged_in = false;
        }

        $pdo = close_connection($pdo); // Close connection to database via PDO
        return $logged_in;
        unset($_POST);
    }

    function organize_data(array $users) {
        $display_first = []; // All the people attending
        $display_second = []; // All the people attending with plus ones
        $display_third = []; // Everyone not attending
        $display_last = []; // Everyone with a bogus code

        foreach ($users as $user_) {
            $user = new Attendee($user_);
            if ($user->get_code() == "MW23") {
                if ($user->is_attending()) {
                    if (!$user->has_po()) {
                        array_push($display_first, $user);
                    } else {
                        array_push($display_second, $user);
                    }
                } else {
                    array_push($display_third, $user);
                }
            } else {
                array_push($display_last, $user);
            }
        }
        return [$display_first, $display_second, $display_third, $display_last];

    }

    function print_data() {
        $pdo = set_up_attendees();
        $statement = $pdo->query("SELECT * from attendees");
        $statement->setFetchMode(PDO::FETCH_ASSOC);
        echo "<table>"; // HTML
        echo "<tr>"; // HTML
        echo "<th>Attending</th><th>Name</th><th>email</th><th>Plus One</th><th>Plus One Name</th><th>Code</th>"; // HTML
        echo "</tr>"; // HTML
        $results = $statement->fetchAll(); // Get the table data
        $display_order = organize_data($results); // Organize table data
        foreach ($display_order as $display_array) {
            foreach ($display_array as $user) {
                echo "<tr>";
                echo "<td>" . $user->is_attending_string() . "</td>";
                echo "<td>" . $user->get_full_name() . "</td>";
                echo "<td>" . $user->get_email() . "</td>";
                echo "<td>" . $user->has_po_string() . "</td>";
                echo "<td>" . $user->get_po_name() . "</td>";
                echo "<td>" . $user->get_code() . "</td>";
                echo "</tr>";
            }
        }

        echo "</table>";

        $pdo = close_connection($pdo);

    }

    // Check to see if we have already run the page, if so get rid of the log in, and display the data
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (array_key_exists('user_name', $_POST)) {
            if (login($_POST['user_name'], $_POST['password'])) {
                echo '<div id="fade_away"><h1 class="up">Logged in, displaying data!</h1></div>';
                print_data();
            } else {
                echo '<div><h1 class="up">Unable to log in, please try again!</h1></div>';
                print_form(); // Log in info was wrong, display form
            }
            
        } else {
            print_form(); // For some reason, username doesn't exist, so print form
        }
    } else {
        print_form(); // Just got to the page, display form
    }
    unset($_POST);
?>