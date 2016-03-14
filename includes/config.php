<?php

    /**
     * config.php
     *
     * Configures pages.
     */

    // display errors, warnings, and notices

    error_reporting(E_ALL | E_STRICT | E_NOTICE);
    ini_set("display_errors", true);

    // requirements
    require("constants.php");
    require("functions.php");

    // enable sessions
    session_start();

    // require authentication for all pages except /login.php, /logout.php, and /register.php
   /*
   if (!in_array($_SERVER["PHP_SELF"], ["/login.php", "/logout.php", "/register.php"]))
    {
        if (empty($_SESSION["id"]))
        {
            redirect("login.php");
        }
    }
    */
?>
