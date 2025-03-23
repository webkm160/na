<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: https://nanavatyadvocates.com/admin/index.php');
    exit();
}
?>