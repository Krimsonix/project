<?php


switch ( $_GET["a"] ) {

    case "login": //Load the navbar, head, footer and loginview
        include(APP_VIEW . "/header.php");
        include(APP_VIEW . "/nav.php");
        include(APP_VIEW . "/auth/loginView.php" );
        include(APP_VIEW . "/footer.php");
        break;

    case "logout":

        # Delete Session Data
        $_SESSION = 0;
        session_destroy();
        session_start();

        include(APP_VIEW . "/header.php");
        include(APP_VIEW . "/nav.php");
        include(APP_VIEW . "/auth/loginView.php" );
        include(APP_VIEW . "/footer.php");
        break;

    case "process":

        $auth = processAuth($_POST["username"], $_POST["password"]);

        if (true == $auth["return"]) {

            # Setup Session
            $_SESSION["username"] = $_POST["username"];

            # Redict to App Home Page
            header("Location: http://localhost" . APP_DOC_ROOT);
        }
        else {
            include(APP_VIEW . "/header.php");
            include(APP_VIEW . "/nav.php");
            include(APP_VIEW . "/auth/loginView.php" );
            include(APP_VIEW . "/footer.php");
        }
        break;

}