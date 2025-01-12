<?php
    session_start();
    session_unset();
    session_destroy();
    header("Location: prihlasenie.html");
    exit;
?>