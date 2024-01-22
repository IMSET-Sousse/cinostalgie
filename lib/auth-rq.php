<?php
session_start();
$loggedin = FALSE;
if (isset($_SESSION['id'])) {
    $loggedin = TRUE;
} else {
    $loggedin = FALSE;
}