<?php
// Start the session
session_start();

// Unset all session variables
$_SESSION = array();

// Optionally, destroy the session if you want to remove the session ID as well
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"], $params["secure"], $params["httponly"]
    );
}

// Finally, destroy the session
session_destroy();

header("Location: clinic_login.php");
?>
