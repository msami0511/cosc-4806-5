<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

function is_admin() {
    return (isset($_SESSION['username']) && strtolower($_SESSION['username']) === 'admin');
}
